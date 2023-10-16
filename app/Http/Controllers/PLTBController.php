<?php

namespace App\Http\Controllers;

use App\Http\Requests\PLTBRequest;
use App\Models\Pembangkit;
use App\Models\PLTB;
use Illuminate\Http\Request;

class PLTBController extends Controller
{
    public function insertPLTB(PLTBRequest $request)
    {

        $data = $request->validated();

        $newPembangkit = new Pembangkit($data);
        $statusPembangkit = $newPembangkit->save();
        $statusPLTB = $newPembangkit->pltb()->save(new PLTB($data));

        return [
            "status" => ($statusPembangkit && $statusPLTB),
            "id" => $newPembangkit->id
        ];
    }

    public function getPLTBbyID(string $id)
    {
        $pembangkit = Pembangkit::where('id', '=', $id)
            ->pltb()
            ->first();

        return ["status" => $pembangkit];
    }

    public function getPLTBbyPage()
    {
        $perPage = 10;
        $pembangkit = Pembangkit::with('pltb')
            ->paginate($perPage);

        return $pembangkit;
    }

    public function getPLTBNearby(Request $request)
    {
        $longitude = $request->query('longitude');
        $latitude =  $request->query('latitude');
        $distance =  $request->query('distance'); //Meter

        $pembangkit = Pembangkit::with('pltb')
            ->whereRaw("ST_Distance(
                ST_MakePoint($longitude, $latitude)::geography,
                ST_MakePoint(longitude, latitude)::geography
            ) <= $distance")
            ->limit(10) // max data yang akan muncul
            ->get();

        return ["data" => $pembangkit];
    }

    public function getPLTBbyQuery(string $query)
    {
        $perPage = 10;
        $pembangkit = Pembangkit::with('pltb')
            ->where('nama', 'ILIKE', "%$query%")
            ->orWhere('lokasi', 'ILIKE', "%$query%")
            ->paginate($perPage);

        return ["data" =>$pembangkit];
    }

    public function updatePLTB(PLTBRequest $request, string $id)
    {
        $data = $request->validated();

        $pembangkit = Pembangkit::where('id', '=', $id)->first();
        $statusPembangkit = $pembangkit->update($data);
        $statusPLTB = $pembangkit->pltb->update($data);

        return ["status" => ($statusPembangkit && $statusPLTB)];
    }

    public function deletePLTB(string $id)
    {
        $pembangkit = Pembangkit::where('id', '=', $id)->first();
        $statusPLTB = $pembangkit->pltb->delete();
        $statusPembangkit = $pembangkit->delete();

        return ["status" => ($statusPembangkit && $statusPLTB)];
    }

}
