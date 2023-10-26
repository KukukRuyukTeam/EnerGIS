<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function registerAdmin(AdminRequest $request)
    {
        $data = $request->validated();

        if (Admin::where('email', '=', $data['email'])->count() == 1) {
            throw new HttpResponseException(response([
                "errors" => [
                    "message" => [
                        "email sudah terpakai, coba menggunakan email lain"
                    ]
                ]
            ], 400));
        }

        $newAdmin = new Admin($data);
        $newAdmin->password = Hash::make($data['password']);
        $newAdmin->save();

        return new AdminResource($newAdmin);
    }


    public function loginAdmin(AdminRequest $request)
    {
        // $data = $request->validated();
        return redirect()->intended('/admin_pembangkit');
        $admin = Admin::where('email', '=', $data['email'])->first();
        if (!$admin || !Hash::check($data['password'], $admin->password)) {
            throw new HttpResponseException(response([
                "errors" => [
                    "message" => [
                        "email atau password tidak sesuai"
                    ]
                ]
            ]));

        }

        $admin->token = Str::uuid()->toString();
        $admin->save();

        return view('admin.admin_pembangkit_listrik', new AdminResource($admin));
    }

    public function logoutAdmin()
    {
        $admin = Auth::user();
        $admin->token = null;
        $admin->save();

        return ["status" => true];
    }

    public function get()
    {
        $admin = Auth::user();
        return new AdminResource($admin);
    }
}
