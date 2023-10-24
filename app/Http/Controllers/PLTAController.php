<?php

namespace App\Http\Controllers;

use App\Http\Requests\PLTARequest;
use App\Models\Pembangkit;
use App\Models\PLTA;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PLTAController extends Controller
{
    public function insertPLTA(PLTARequest $request)
    {
        $data = $request->validated();

        $newPembangkit      = new Pembangkit($data);
        if ($request->file('gambar'))
        {
            $imageName = Str::uuid() . '.' . $data['gambar']->extension();
            $data['gambar']->move(public_path('images'), $imageName);
            $newPembangkit->gambar = $imageName;
        }

        $statusPembangkit   = $newPembangkit->save();
        $statusPLTA         = $newPembangkit->plta()->save(new PLTA($data));

        return [
            "status" => ($statusPLTA && $statusPembangkit),
            "id" => $newPembangkit->id
        ];
    }

    public function getPLTAbyID(Request $request, string $id) {

        $pembangkit = Pembangkit::where('id', '=', $id)
            ->with('plta')
            ->first();

        return ["data" => $pembangkit];
    }

    public function getPLTAbyPage(Request $request) {

        $perPage = 10;
        $pembangkit = Pembangkit::with('plta')
            ->paginate($perPage);

        return $pembangkit;
    }

    public function getPLTANearby(Request $request)
    {
        $longitude = $request->query('longitude');
        $latitude =  $request->query('latitude');
        $distance =  $request->query('distance'); //Meter

        $pembangkit = Pembangkit::with('plta')
            ->whereRaw("ST_Distance(
                ST_MakePoint($longitude, $latitude)::geography,
                ST_MakePoint(longitude, latitude)::geography
            ) <= $distance")
            ->limit(10) // max data yang akan muncul
            ->get();

        return ["data" => $pembangkit];
    }

    public function getPLTAbyQuery(string $query) {

        $perPage    = 10;
        $pembangkit = Pembangkit::with('plta')
            ->where('nama', 'ILIKE', "%$query%")
            ->orWhere('lokasi', 'ILIKE', "%$query%")
        ->paginate($perPage);

        return ['data' => $pembangkit];
    }

    public function updatePLTA(PLTARequest $request, string $id)
    {
        $data = $request->validated();

        $pembangkit         = Pembangkit::where('id','=', $id)->first();
        if ($request->file('gambar') &&
            $request->file('gambar')->getClientOriginalName() != $pembangkit->gambar)
        {
            $imageName = Str::uuid() . '.' . $data['gambar']->extension();
            $data['gambar']->move(public_path('images'), $imageName);
            $data['gambar'] = $imageName;
        } else {
            unset($data['gambar']);
        }

        $statusPembangkit   = $pembangkit->update($data);
        $statusPLTA         = $pembangkit->plta->update($data);

        return ["status" => ($statusPembangkit && $statusPLTA)];
    }

    public function deletePLTA(string $id)
    {
        $pembangkit         = Pembangkit::where('id', '=', $id)->first();
        $statusPembangkit   = $pembangkit->plta->delete();
        $statusPLTA         = $pembangkit->delete();

        return ["status" => ($statusPLTA && $statusPembangkit)];
    }
}
