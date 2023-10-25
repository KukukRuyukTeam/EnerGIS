<?php

namespace App\Http\Controllers;

use App\Http\Requests\PLTSRequest;
use App\Http\Resources\PLTSResource;
use App\Models\Pembangkit;
use App\Models\PLTS;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PLTSController extends Controller
{
    public function insertPLTS(PLTSRequest $request)
    {
        $data = $request->validated();

        $newPembangkit      = new Pembangkit($data);
        if ($request->file('gambar'))
        {
            $imageName = Str::uuid() . '.' . $data['gambar']->extension();
            $data['gambar']->move(public_path('images'), $imageName);
            $newPembangkit->gambar = $imageName;
        }
        $statusPembangkit   = $newPembangkit->save();
        $statusPLTS         = $newPembangkit->plts()->save(new PLTS($data));

        return [
            "status" => ($statusPembangkit && $statusPLTS),
            "id" => $newPembangkit->id
        ];
    }

    public function getPLTSbyID(string $id)
    {
        $pembangkit = Pembangkit::where('id', $id)
            ->with('plts')
            ->first();

        return ["data" => $pembangkit];
    }

    public function getPLTSs()
    {
        $perPage = 10;
        $pembangkit = Pembangkit::join('plts', 'plts.id_pl', '=', 'pembangkit.id')
            ->get()
            ->map(function ($pembangkit) {
                return $pembangkit->formatPLTS();
            });

        return [
            "data" => [
                "type" => "FeatureCollection",
                "features" => [$pembangkit]
            ],
        ];
    }

    public function  getPLTSNearby(Request $request)
    {
        $longitude = $request->query('longitude');
        $latitude =  $request->query('latitude');
        $distance =  $request->query('distance'); //Meter

        $pembangkit = Pembangkit::with('plts')
            ->whereRaw("ST_Distance(
                ST_MakePoint($longitude, $latitude)::geography,
                ST_MakePoint(longitude, latitude)::geography
            ) <= $distance")
            ->limit(10) // max data yang akan muncul
            ->get();

        return ["data" => $pembangkit];
    }

    public function getPLTSbyQuery(string $query)
    {
        $perPage = 10;
        $pembangkit = Pembangkit::with('plts')
            ->where('nama', 'ILIKE', "%$query%")
            ->orWhere('lokasi', 'ILIKE', "%$query%")
            ->paginate($perPage);

        return ['data' => $pembangkit];
    }

    public function updatePLTS(PLTSRequest $request, string $id)
    {
        $data = $request->validated();

        $pembangkit         = Pembangkit::where('id', $id)->first();
        if ($request->file('gambar') &&
            $request->file('gambar')->getClientOriginalName() != $pembangkit->gambar)
        {
            $imageName = Str::uuid() . '.' . $data['gambar']->extension();
            $data['gambar']->move(public_path('images'), $imageName);
            $data['gambar'] = $imageName;
        } else {
            unset($data['gambar']);
        }

        $statusPembangkit   = $pembangkit->update($data);
        $statusPLTS         = $pembangkit->plts->update($data);

        return ["status" => ($statusPembangkit && $statusPLTS)];
    }

    public function deletePLTS(string $id)
    {
        $plts               = Pembangkit::where('id', $id)->first();
        $statusPLTS         = $plts->plts->delete();
        $statusPembangkit   = $plts->delete();

        return ["status" => ($statusPembangkit && $statusPLTS)];
    }
}
