<?php

namespace App\Http\Controllers;

use App\Http\Requests\PembangkitRequest;
use App\Http\Resources\PembangkitResource;
use App\Models\Pembangkit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PembangkitController extends Controller
{
    public function insertPembangkit(PembangkitRequest $request): JsonResponse
    {
        $data = $request->validated();
        $pembangkit = new Pembangkit($data);
        $pembangkit->save();

        return (new PembangkitResource($pembangkit))->response()->setStatusCode(201);
    }

}
