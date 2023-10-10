<?php

namespace App\Http\Controllers;

use App\Http\Requests\PLTARequest;
use App\Http\Resources\PLTAResource;
use App\Models\Pembangkit;
use App\Models\PLTA;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PLTAController extends Controller
{
    public function insertPLTA(PLTARequest $request): JsonResponse
    {
        $data = $request->validated();

        $newPLTA = new PLTA($data);
        $newPembangkit = new Pembangkit($data);
        $newPembangkit->save();

        $newPLTA->id_pl = $newPembangkit->id;
        $newPLTA->save();

        $responsePLTA = new PLTAResource($newPLTA);
        $responsePLTA->pembangkit = $newPembangkit->getAttributes();

        return ($responsePLTA)->response()->setStatusCode(201);
    }

    public function getPLTAbyID(Request $request, string $id) {

        $plta = PLTA::where('id', $id)->with('pembangkit')->first();

        return ["plta" => $plta];

//        return view('plta', ['data' => $plta]);
    }

    public function getPLTAbyPage(Request $request) {

        $perPage = 10;
        $plta = PLTA::paginate($perPage);

        $response = [
            "plta" => $plta,
        ];

        return $response;
        //        return view('plta', ['data' => $plta]);

    }

    public function getPLTANearby(Request $request)
    {
        $longitude = $request->query('longitude');
        $latitude =  $request->query('latitude');
        $distance =  $request->query('distance'); //Meter

        $plta = PLTA::join('pembangkit', 'plta.id_pl', '=', 'pembangkit.id')
            ->whereRaw("ST_Distance(
                ST_MakePoint($longitude, $latitude)::geography,
                ST_MakePoint(longitude, latitude)::geography
            ) <= $distance")
            ->orderByRaw('RANDOM()')
            ->limit(10) // max data yang akan muncul
            ->get();

        return ["pltas" => $plta];
    }

    public function updatePLTA(PLTARequest $request, string $id) : JsonResponse
    {
        $data = $request->validated();

        $plta = PLTA::where('id', $id)->first();
        $plta->update($data);
        $plta->pembangkit->update($data);

        return (new JsonResponse($plta, 200));
    }

    public function deletePLTA(string $id) : JsonResponse
    {
        $plta = PLTA::where('id', $id)->first();
        $plta->pembangkit->delete();
        $plta->delete();

        return (new JsonResponse($plta, 201));
    }
}