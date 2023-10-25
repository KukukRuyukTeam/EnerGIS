<?php

namespace App\Http\Controllers;

use App\Http\Requests\PLTBRequest;
use App\Models\Pembangkit;
use App\Models\PLTB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PLTBController extends Controller
{
    public function insertPLTB(PLTBRequest $request)
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
        $statusPLTB = $newPembangkit->pltb()->save(new PLTB($data));

        return [
            "status" => ($statusPembangkit && $statusPLTB),
            "id" => $newPembangkit->id
        ];
    }

    public function getPLTBbyID(string $id)
    {
        $pembangkit = Pembangkit::where('id', '=', $id)
            ->with('pltb')
            ->first();

        return ["status" => $pembangkit];
    }

    public function getPLTBs()
    {
        $perPage = 10;
        $pembangkit = Pembangkit::join('pltb', 'pltb.id_pl', '=', 'pembangkit.id')
            ->get()
            ->map(function ($pembangkit) {
                return $pembangkit->formatPLTB();
            });

        return [
            "data" => [
                "type" => "FeatureCollection",
                "features" => [$pembangkit]
            ],
        ];
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
