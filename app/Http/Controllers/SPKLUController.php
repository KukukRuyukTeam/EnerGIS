<?php

namespace App\Http\Controllers;

use App\Http\Requests\SPKLURequest;
use App\Http\Resources\SPKLUResource;
use App\Models\SPKLU;
use Illuminate\Http\Request;


class SPKLUController extends Controller
{
    public function insertSPKLU(SPKLURequest $request)
    {
        $data = $request->validated();

        $newSPKLU = new SPKLU($data);
        $newSPKLU->save();
        $newPorts = $newSPKLU->spklu_port()->createMany($data['ports']);

        $response = new SPKLUResource($newSPKLU);
        $response->ports = $newPorts;

        return ["spklu" => $response];
    }

    public function getSPKLUbyID(string $id)
    {
        $spklu = SPKLU::where('id', $id)->with('spklu_port')->first();

        $response = ['spklu' => $spklu];
        return $response;
    }

    public function getSPKLUbyPage(Request $request)
    {
        $perPage = 10;
        $spklu = SPKLU::paginate($perPage);

        $response = ['spklu' => $spklu];
        return $response;
    }

    public function getSPKLUNearby(Request $request)
    {
        $longitude = $request->query('longitude');
        $latitude = $request->query('latitude');
        $distance = $request->query('distance');

        $spklu = SPKLU::whereRaw("ST_Distance(
                ST_MakePoint($longitude, $latitude)::geography,
                ST_MakePoint(longitude, latitude)::geography
            ) <= $distance")
            ->limit(10)
            ->get();

        $response = ["spklu" => $spklu];
        return $response;
    }

    public function getSPKLUbyQuery(string $query)
    {
        $perPage = 10;
        $spklu = SPKLU::where('nama', 'ILIKE', "%$query%")
            ->orWhere('lokasi', 'ILIKE', "%$query%")
            ->paginate($perPage);

        return $spklu;
    }

    public function updateSPKLU(SPKLURequest $request, string $id)
    {
        $data = $request->validated();

        $spklu = SPKLU::where('id', $id)->first();
        $spklu->update($data);

        for ($i=0;$i<count($data['ports']);$i++)
        {
            $spklu->spklu_port
                ->firstWhere('id', '=', $data['ports'][$i]['id'])
                ->update($data['ports'][$i]);
        }

        $response = ['spklu' => $spklu];
        return $response;
    }

    public function deleteSPKLU(string $id)
    {
        $spklu = SPKLU::where('id', $id)->first();
        $spklu->with('spklu_port')->delete();
        $spklu->delete();

        $response = ["spklu" => $spklu];
        return $response;

    }
}
