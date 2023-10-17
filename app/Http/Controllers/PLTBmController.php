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
        $statusPLTBm = $newPembangkit->pltbm()->save(new PLTBm($data));

        return [
            "status" => ($statusPembangkit && $statusPLTBm),
            "id" => $newPembangkit->id
        ];
    }

    public function getPLTBmbyID(string $id)
    {
        $pembangkit = Pembangkit::where('id', '=', $id)
            ->pltbm()
            ->first();

        return ["data" => $pembangkit];
    }

    public function getPLTBmbyPage()
    {
        $perPage = 10;
        $pltbm = Pembangkit::with('pltbm')
            ->paginate($perPage);

        return $pltbm;
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
        $statusPLTBm = $pembangkit->update($data);
        $statusPembangkit = $pembangkit->pltbm->update($data);

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
