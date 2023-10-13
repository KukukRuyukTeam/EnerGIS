<?php

namespace App\Http\Controllers;

use App\Http\Requests\PLTSRequest;
use App\Http\Resources\PLTSResource;
use App\Models\Pembangkit;
use App\Models\PLTS;
use Illuminate\Http\Request;

class PLTSController extends Controller
{
    public function insertPLTS(PLTSRequest $request)
    {
        $data = $request->validated();

        $newPLTS = new PLTS($data);
        $newPembangkit = new Pembangkit($data);
        $newPembangkit->save();

        $newPLTS->id_pl = $newPembangkit->id;
        $newPLTS->save();

        $response = new PLTSResource($newPLTS);
        $response->pembangkit = $newPembangkit->getAttributes();
        return $response;
    }

    public function getPLTSbyID(string $id)
    {
        $plts = PLTS::where('id', $id)->with('pembangkit')->first();
        $response = ["plts" => $plts];

        return $response;
    }

    public function getPLTSbyPage()
    {
        $perPage = 10;
        $plts = PLTS::join('pembangkit', 'plts.id_pl', '=', 'pembangkit.id')->paginate($perPage);

        $response = [
            "plts" => $plts
        ];
        return $response;
    }

    public function  getPLTSNearby(Request $request)
    {
        $longitude = $request->query('longitude');
        $latitude =  $request->query('latitude');
        $distance =  $request->query('distance'); //Meter

        $plta = PLTS::join('pembangkit', 'plts.id_pl', '=', 'pembangkit.id')
            ->whereRaw("ST_Distance(
                ST_MakePoint($longitude, $latitude)::geography,
                ST_MakePoint(longitude, latitude)::geography
            ) <= $distance")
            ->limit(10) // max data yang akan muncul
            ->get();

        $response = ["plts" => $plta];
        return $response;
    }

    public function getPLTSbyQuery(string $query)
    {
        $perPage = 10;
        $plts = PLTS::join('pembangkit', 'plts.id_pl', '=',  'pembangkit.id')
            ->where('nama', 'ILIKE', "%$query%")
            ->orWhere('lokasi', 'ILIKE', "%$query%")
            ->paginate($perPage);

        return ['data' => $plts];
    }

    public function updatePLTS(PLTSRequest $request, string $id)
    {
        $data = $request->validated();

        $plts = PLTS::where('id', $id)->first();
        $plts->update($data);
        $plts->pembangkit->update($data);

        $response = ["plts" => $plts];
        return $response;
    }

    public function deletePLTS(string $id)
    {
        $plts = PLTS::where('id', $id)->first();
        $plts->pembangkit->delete();
        $plts->delete();

        $response = ["data" => $plts];
        return $response;
    }
}
