<?php

namespace App\Http\Controllers;

use App\Http\Requests\PLTMRequest;
use App\Models\Pembangkit;
use App\Models\PLTM;
use Illuminate\Http\Request;

class PLTMController extends Controller
{
    public function insertPLTM(PLTMRequest $request)
    {
        $data = $request->validated();

        $newPembangkit = new Pembangkit($data);
        $statusPembangkit = $newPembangkit->save();

        $newPLTM = new PLTM();
        $newPLTM->id_pl = $newPembangkit->id;
        $statusPLTM = $newPLTM->save();

        return ["status" => ($statusPembangkit && $statusPLTM), "id" => $newPLTM->id];
    }

    public function getPLTMbyID(string $id)
    {
        $pltm = PLTM::where('pltm.id', '=', $id)->with('pembangkit')->first();

        return ["data" => $pltm];
    }

    public function getPLTMbyPage()
    {
        $perPage = 10;
        $pltm = PLTM::join('pembangkit', 'pltm.id_pl', '=', 'pembangkit.id')
            ->paginate($perPage);

        return $pltm;
    }

    public function getPLTMNearby(Request $request)
    {
        $longitude = $request->query('longitude');
        $latitude =  $request->query('latitude');
        $distance =  $request->query('distance'); //Meter

        $pltm = PLTM::join('pembangkit', 'pltm.id_pl', '=', 'pembangkit.id')
            ->whereRaw("ST_Distance(
                ST_MakePoint($longitude, $latitude)::geography,
                ST_MakePoint(longitude, latitude)::geography
            ) <= $distance")
            ->limit(10) // max data yang akan muncul
            ->get();

        return ["data" => $pltm];
    }

    public function getPLTMbyQuery(string $query)
    {
        $perPage = 10;
        $pltm = PLTM::join('pembangkit', 'pltm.id_pl', '=',  'pembangkit.id')
            ->where('nama', 'ILIKE', "%$query%")
            ->orWhere('lokasi', 'ILIKE', "%$query%")
            ->paginate($perPage);

        return ["data" => $pltm];
    }

    public function updatePLTM(PLTMRequest $request, string $id)
    {
        $data = $request->validated();

        $perPage = 10;
        $pltm = PLTM::where('id', $id)->first();
        $statusPembangkit = $pltm->pembangkit->update($data);

        return ["status" => $statusPembangkit];
    }

    public function deletePLTM(string $id)
    {
        $pltm = PLTM::where('id', $id)->first();
        $statusPembangkit = $pltm->pembangkit->delete();
        $statusPLTM = $pltm->delete();

        return ["status" => ($statusPLTM && $statusPembangkit)];
    }
}
