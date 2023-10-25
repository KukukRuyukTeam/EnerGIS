<?php

namespace App\Http\Controllers;

use App\Http\Requests\PLTBmRequest;
use App\Http\Resources\PLTBmResource;
use App\Models\Pembangkit;
use App\Models\PLTBm;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PLTBmController extends Controller
{
    public function insertPLTBm(PLTBmRequest $request)
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
        $statusPLTBm = $newPembangkit->pltbm()->save(new PLTBm($data));

        return [
            "status" => ($statusPembangkit && $statusPLTBm),
            "id" => $newPembangkit->id
        ];
    }

    public function getPLTBmbyID(string $id)
    {
        $pembangkit = Pembangkit::where('id', '=', $id)
            ->with('pltbm')
            ->first();

        return ["data" => $pembangkit];
    }

    public function getPLTBms()
    {
        $perPage = 10;
        $pembangkit = Pembangkit::join('pltbm', 'pltbm.id_pl', '=', 'pembangkit.id')
            ->get()
            ->map(function ($pembangkit) {
                return $pembangkit->formatPLTBm();
            });

        return [
            "data" => [
                "type" => "FeatureCollection",
                "features" => [$pembangkit]
            ],
        ];
    }

    public function  getPLTBmNearby(Request $request)
    {
        $longitude = $request->query('longitude');
        $latitude =  $request->query('latitude');
        $distance =  $request->query('distance'); //Meter

        $pembangkit = Pembangkit::with('pltbm')
            ->whereRaw("ST_Distance(
                ST_MakePoint($longitude, $latitude)::geography,
                ST_MakePoint(longitude, latitude)::geography
            ) <= $distance")
            ->limit(10) // max data yang akan muncul
            ->get();

        return ["data" => $pembangkit];
    }

    public function getPLTBmbyQuery(string $query)
    {
        $perPage = 10;
        $pembangkit = Pembangkit::with('pltbm')
            ->where('nama', 'ILIKE', "%$query%")
            ->orWhere('lokasi', 'ILIKE', "%$query%")
            ->paginate($perPage);

        return ["data" => $pembangkit];
    }

    public function updatePLTBm(PLTBmRequest $request, string $id)
    {
        $data = $request->validated();

        $pembangkit = Pembangkit::where('id', '=', $id)->first();
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
        $statusPLTBm = $pembangkit->pltbm->update($data);

        return ["status" => ($statusPembangkit && $statusPLTBm)];
    }

    public function deletePLTBm(string $id)
    {
        $pltbm = Pembangkit::where('id', '=', $id)->first();
        $statusPembangkit = $pltbm->pltbm->delete();
        $statusPLTBm = $pltbm->delete();

        return ["status" => ($statusPembangkit && $statusPLTBm)];
    }

}
