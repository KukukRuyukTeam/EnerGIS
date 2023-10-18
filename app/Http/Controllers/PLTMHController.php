<?php

namespace App\Http\Controllers;

use App\Http\Requests\PLTMHRequest;
use App\Models\Pembangkit;
use App\Models\PLTMH;
use Illuminate\Http\Request;

class PLTMHController extends Controller
{
    public function insertPLTMH(PLTMHRequest $request)
    {
        $data = $request->validated();

        $newPembangkit = new Pembangkit($data);
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

    public function getPLTMHbyPage()
    {
        $perPage = 10;
        $pembangkit = Pembangkit::with('pltmh')
            ->paginate($perPage);

        return $pembangkit;
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
        $statusPembangkit = $pembangkit->pltmh->update($data);

        return ["status" => $statusPembangkit];
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
