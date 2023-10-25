<?php

namespace App\Http\Controllers;

use App\Http\Requests\PLTPRequest;
use App\Models\Pembangkit;
use App\Models\PLTP;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PLTPController extends Controller
{
    public function insertPLTP(PLTPRequest $request)
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
        $statusPLTP = $newPembangkit->pltp()->save(new PLTP($data));

        return [
            "status" => ($statusPembangkit && $statusPLTP),
            "id" => $newPembangkit->id
        ];
    }

    public function getPLTPbyID(string $id)
    {
        $pembangkit = Pembangkit::where('id', '=', $id)
            ->with('pltp')->first();

        return $pembangkit;
    }

    public function getPLTPs()
    {
        $perPage = 10;
        $pembangkit = Pembangkit::join('pltp', 'pltp.id_pl', '=', 'pembangkit.id')
            ->get()
            ->map(function ($pembangkit) {
                return $pembangkit->formatPLTP();
            });

        return [
            "data" => [
                "type" => "FeatureCollection",
                "features" => $pembangkit
            ],
        ];
    }

    public function getPLTPbyQuery(string $query)
    {
        $perPage = 10;
        $pembangkit = Pembangkit::with('pltp')
            ->where('nama', 'ILIKE', "%$query%")
            ->orWhere('lokasi', 'ILIKE', "%$query%")
            ->paginate($perPage);

        return ["data" => $pembangkit];
    }

    public function getPLTPNearby(Request $request)
    {
        $longitude = $request->query('longitude');
        $latitude =  $request->query('latitude');
        $distance =  $request->query('distance'); //Meter

        $pltp = Pembangkit::join('pltp', 'pltp.id_pl', '=', 'pembangkit.id')
            ->whereRaw("ST_Distance(
                ST_MakePoint($longitude, $latitude)::geography,
                ST_MakePoint(longitude, latitude)::geography
            ) <= $distance")
            ->limit(10) // max data yang akan muncul
            ->get();

        return $pltp;
    }

    public function updatePLTP(PLTPRequest $request, string $id)
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
        $statusPLTP = $pembangkit->pltp->update($data);

        return ["status" => ($statusPembangkit && $statusPLTP)];
    }

    public function deletePLTP(string $id)
    {
        $pembangkit = Pembangkit::where('id', '=', $id)->first();
        $statusPembangkit = $pembangkit->pltp->delete();
        $statusPLTP = $pembangkit->delete();

        return ["status" => ($statusPembangkit && $statusPLTP)];
    }
}
