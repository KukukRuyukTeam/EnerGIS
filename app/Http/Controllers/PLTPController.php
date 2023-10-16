<?php

namespace App\Http\Controllers;

use App\Http\Requests\PLTPRequest;
use App\Models\Pembangkit;
use App\Models\PLTP;
use Illuminate\Http\Request;

class PLTPController extends Controller
{
    public function insertPLTP(PLTPRequest $request)
    {
        $data = $request->validated();

        $newPembangkit = new Pembangkit($data);
        $newPembangkit->save();
        $pltp = $newPembangkit->pltp()->create($data);

        return ["id" => $newPembangkit->id, $pltp];
    }

    public function getPLTPbyID(string $id)
    {
        $pembangkit = Pembangkit::where('id', '=', $id)
            ->with('pltp')->first();

        return $pembangkit;
    }

    public function getPLTPbyPage()
    {
        $perPage = 10;
        $pembangkit = Pembangkit::with('pltp')
            ->paginate($perPage);

        return $pembangkit;
    }

    public function getPLTPNearby(Request $request)
    {
        $longitude = $request->query('longitude');
        $latitude =  $request->query('latitude');
        $distance =  $request->query('distance'); //Meter

        $pltp = Pembangkit::join('pltp', 'pltp.id_pl', '=', 'pembangkit.id')
            ->whereRaw("ST_Distance(
                ST_MakePoint($longitude, $latitude)::geography,
                ST_MakePoint(longitude, latitude)::geography
            ) <= $distance")
            ->limit(10) // max data yang akan muncul
            ->get();

        return $pltp;
    }

    public function updatePLTP(PLTPRequest $request, string $id)
    {
        $data = $request->validated();

        $pembangkit = Pembangkit::where('id', '=', $id)->first();
        $statusPembangkit = $pembangkit->update($data);
        $statusPLTP = $pembangkit->pltp->update($data);

        return ["status" => ($statusPembangkit && $statusPLTP)];
    }

    public function deletePLTP(string $id)
    {
        $pembangkit = Pembangkit::where('id', '=', $id)->first();
        $statusPembangkit = $pembangkit->pltp->delete();
        $statusPLTP = $pembangkit->delete();

        return ["status" => ($statusPembangkit && $statusPLTP)];
    }
}
