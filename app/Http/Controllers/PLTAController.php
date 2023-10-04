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
}
