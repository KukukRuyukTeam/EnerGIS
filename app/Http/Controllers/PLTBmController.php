<?php

namespace App\Http\Controllers;

use App\Http\Requests\PLTBmRequest;
use App\Http\Resources\PLTBmResource;
use App\Models\Pembangkit;
use App\Models\PLTBm;
use Illuminate\Http\Request;

class PLTBmController extends Controller
{
    public function insertPLTBm(PLTBmRequest $request)
    {
        $data = $request->validated();

        $newPembangkit = new Pembangkit($data);
        $statusPembangkit = $newPembangkit->save();

        $newPLTBm = new PLTBm($data);
        $newPLTBm->id_pl = $newPembangkit->id;
        $statusPLTBm = $newPLTBm->save();

        $response = new PLTBmResource($newPLTBm);
        $response->pembangkit = $newPembangkit;
        return [
            "status" => ($statusPembangkit && $statusPLTBm),
            "id" => $newPLTBm->id
        ];
    }

    public function getPLTBmbyID(string $id)
    {
        $pltbm = PLTBm::where('id', $id)->with('pembangkit')->first();

        $response = ["data" => $pltbm];
        return ["data" => $response];
    }

    public function getPLTBmbyPage()
    {
        $perPage = 10;
        $pltbm = PLTBm::join('pembangkit', 'pltbm.id_pl', '=', 'pembangkit.id')
            ->paginate($perPage);

        return $pltbm;
    }

    public function  getPLTBmNearby(Request $request)
    {
        $longitude = $request->query('longitude');
        $latitude =  $request->query('latitude');
        $distance =  $request->query('distance'); //Meter

        $pltbm = PLTBm::join('pembangkit', 'pltbm.id_pl', '=', 'pembangkit.id')
            ->whereRaw("ST_Distance(
                ST_MakePoint($longitude, $latitude)::geography,
                ST_MakePoint(longitude, latitude)::geography
            ) <= $distance")
            ->limit(10) // max data yang akan muncul
            ->get();

        return ["data" => $pltbm];
    }

    public function getPLTBmbyQuery(string $query)
    {
        $perPage = 10;
        $pltbm = PLTBm::join('pembangkit', 'pltbm.id_pl', '=',  'pembangkit.id')
            ->where('nama', 'ILIKE', "%$query%")
            ->orWhere('lokasi', 'ILIKE', "%$query%")
            ->paginate($perPage);

        return ["data" => $pltbm];
    }

    public function updatePLTBm(PLTBmRequest $request, string $id)
    {
        $data = $request->validated();

        $pltbm = PLTBm::where('id', $id)->first();
        $statusPLTBm = $pltbm->update($data);
        $statusPembangkit = $pltbm->pembangkit->update($data);

        return ["status" => ($statusPembangkit && $statusPLTBm)];
    }

    public function deletePLTBm(string $id)
    {
        $pltbm = PLTBm::where('id', $id)->first();
        $statusPembangkit = $pltbm->pembangkit->delete();
        $statusPLTBm = $pltbm->delete();

        return ["status" => ($statusPembangkit && $statusPLTBm)];
    }

}
