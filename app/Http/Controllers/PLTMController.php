<?php

namespace App\Http\Controllers;

use App\Http\Requests\PLTMRequest;
use App\Models\Pembangkit;
use App\Models\PLTM;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PLTMController extends Controller
{
    public function insertPLTM(PLTMRequest $request)
    {
        $data = $request->validated();

        $newPembangkit      = new Pembangkit($data);
        if ($request->file('gambar'))
        {
            $imageName = Str::uuid() . '.' . $data['gambar']->extension();
            $data['gambar']->move(public_path('images'), $imageName);
            $newPembangkit->gambar = $imageName;
        }
        $statusPembangkit = $newPembangkit->save();
        $statusPLTM = $newPembangkit->pltm()->save(new PLTM($data));

        return [
            "status" => ($statusPembangkit && $statusPLTM),
            "id" => $newPembangkit->id
        ];
    }

    public function getPLTMbyID(string $id)
    {
        $pembangkit = Pembangkit::where('id', '=', $id)
            ->with('pltm')
            ->first();

        return ["data" => $pembangkit];
    }

    public function getPLTMbyPage()
    {
        $perPage = 10;
        $pembangkit = Pembangkit::with('pltm')
            ->paginate($perPage);

        return $pembangkit;
    }

    public function getPLTMNearby(Request $request)
    {
        $longitude = $request->query('longitude');
        $latitude =  $request->query('latitude');
        $distance =  $request->query('distance'); //Meter

        $pembangkit = Pembangkit::with('pltm')
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
        $pembangkit = Pembangkit::with('pltm')
            ->where('nama', 'ILIKE', "%$query%")
            ->orWhere('lokasi', 'ILIKE', "%$query%")
            ->paginate($perPage);

        return ["data" => $pembangkit];
    }

    public function updatePLTM(PLTMRequest $request, string $id)
    {
        $data = $request->validated();

        $pembangkit = Pembangkit::where('id', '=', $id)->first();
        if ($request->file('gambar') &&
            $request->file('gambar')->getClientOriginalName() != $pembangkit->gambar)
        {
            $imageName = Str::uuid() . '.' . $data['gambar']->extension();
            $data['gambar']->move(public_path('images'), $imageName);
            $data['gambar'] = $imageName;
        } else {
            unset($data['gambar']);
        }

        $statusPembangkit = $pembangkit->update($data);
        $statusPLTM = $pembangkit->pltm->update($data);

        return ["status" => $statusPembangkit && $statusPLTM];
    }

    public function deletePLTM(string $id)
    {
        $pltm = Pembangkit::where('id', '=', $id)->first();
        $statusPembangkit = $pltm->pltm->delete();
        $statusPLTM = $pltm->delete();

        return ["status" => ($statusPLTM && $statusPembangkit)];
    }
}
