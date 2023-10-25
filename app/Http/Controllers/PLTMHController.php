<?php

namespace App\Http\Controllers;

use App\Http\Requests\PLTMHRequest;
use App\Models\Pembangkit;
use App\Models\PLTMH;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PLTMHController extends Controller
{
    public function insertPLTMH(PLTMHRequest $request)
    {
        $data = $request->validated();

        $newPembangkit      = new Pembangkit($data);
        if ($request->file('gambar'))
        {
            $imageName = Str::uuid() . '.' . $data['gambar']->extension();
            $data['gambar']->move(public_path('images'), $imageName);
            $newPembangkit->gambar = $imageName;
        }
        $statusPembangkit = $newPembangkit->save();
        $statusPLTMH = $newPembangkit->pltmh()->save(new PLTMH($data));

        return [
            "status" => ($statusPembangkit && $statusPLTMH),
            "id" => $newPembangkit->id
        ];
    }

    public function getPLTMHbyID(string $id)
    {
        $pembangkit = Pembangkit::where('pltmh.id', '=', $id)
            ->with('pltmh')
            ->first();

        return ["data" => $pembangkit];
    }

    public function getPLTMHs()
    {
        $perPage = 10;
        $pembangkit = Pembangkit::join('pltmh', 'pltmh.id_pl', '=', 'pembangkit.id')
            ->get()
            ->map(function ($pembangkit) {
                return $pembangkit->formatPLTMH();
            });

        return [
            "data" => [
                "type" => "FeatureCollection",
                "features" => $pembangkit
            ],
        ];
    }

    public function getPLTMHNearby(Request $request)
    {
        $longitude = $request->query('longitude');
        $latitude =  $request->query('latitude');
        $distance =  $request->query('distance'); //Meter

        $pembangkit = Pembangkit::with('pltmh')
            ->whereRaw("ST_Distance(
                ST_MakePoint($longitude, $latitude)::geography,
                ST_MakePoint(longitude, latitude)::geography
            ) <= $distance")
            ->limit(10) // max data yang akan muncul
            ->get();

        return ["data" => $pembangkit];
    }

    public function getPLTMbyQuery(string $query)
    {
        $perPage = 10;
        $pltmh = Pembangkit::with('pltmh')
            ->where('nama', 'ILIKE', "%$query%")
            ->orWhere('lokasi', 'ILIKE', "%$query%")
            ->paginate($perPage);

        return ["data" => $pltmh];
    }

    public function updatePLTMH(PLTMHRequest $request, string $id)
    {
        $data = $request->validated();
        $pembangkit = Pembangkit::where('id', '=', $id)
            ->first();
        if ($request->file('gambar') &&
            $request->file('gambar')->getClientOriginalName() != $pembangkit->gambar)
        {
            $imageName = Str::uuid() . '.' . $data['gambar']->extension();
            $data['gambar']->move(public_path('images'), $imageName);
            $data['gambar'] = $imageName;
        } else {
            unset($data['gambar']);
        }

        $statusPembangkit = $pembangkit->update($data);
        $statusPLTMH = $pembangkit->pltmh->update($data);

        return ["status" => $statusPembangkit && $statusPLTMH];
    }

    public function deletePLTMH(string $id)
    {
        $pembangkit = Pembangkit::where('id', '=', $id)
            ->first();
        $statusPembangkit = $pembangkit->pltmh->delete();
        $statusPLTMH = $pembangkit->delete();

        return ["status" => ($statusPembangkit && $statusPLTMH)];
    }
}
