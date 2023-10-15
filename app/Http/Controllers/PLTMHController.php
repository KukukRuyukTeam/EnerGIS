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

        $newPLTMH = new PLTMH();
        $newPLTMH->id_pl = $newPembangkit->id;
        $statusPLTMH = $newPLTMH->save();

        return [
            "status" => ($statusPembangkit && $statusPLTMH),
            "id" => $newPLTMH->id
        ];
    }

    public function getPLTMHbyID(string $id)
    {
        $pltmh = PLTMH::where('pltmh..id', '=', $id)
            ->with('pembangkit')
            ->first();

        return ["data" => $pltmh];
    }

    public function getPLTMHbyPage()
    {
        $perPage = 10;
        $pltmh = PLTMH::join('pembangkit', 'pltmh.id_pl', '=', 'pembangkit.id')
            ->paginate($perPage);

        return $pltmh;
    }

    public function getPLTMHNearby(Request $request)
    {
        $longitude = $request->query('longitude');
        $latitude =  $request->query('latitude');
        $distance =  $request->query('distance'); //Meter

        $pltmh = PLTMH::join('pembangkit', 'pltmh.id_pl', '=', 'pembangkit.id')
            ->whereRaw("ST_Distance(
                ST_MakePoint($longitude, $latitude)::geography,
                ST_MakePoint(longitude, latitude)::geography
            ) <= $distance")
            ->limit(10) // max data yang akan muncul
            ->get();

        return ["data" => $pltmh];
    }

    public function getPLTMbyQuery(string $query)
    {
        $perPage = 10;
        $pltmh = PLTMH::join('pembangkit', 'pltmh.id_pl', '=',  'pembangkit.id')
            ->where('nama', 'ILIKE', "%$query%")
            ->orWhere('lokasi', 'ILIKE', "%$query%")
            ->paginate($perPage);

        return ["data" => $pltmh];
    }

    public function updatePLTMH(PLTMHRequest $request, string $id)
    {
        $data = $request->validated();
        $pltmh = PLTMH::where('id', '=', $id)
            ->first();
        $statusPembangkit = $pltmh->pembangkit->update($data);

        return ["status" => $statusPembangkit];
    }

    public function deletePLTMH(string $id)
    {
        $pltmh = PLTMH::where('id', '=', $id)
            ->first();
        $statusPembangkit = $pltmh->pembangkit->delete();
        $statusPLTMH = $pltmh->delete();

        return ["status" => ($statusPembangkit && $statusPLTMH)];
    }
}
