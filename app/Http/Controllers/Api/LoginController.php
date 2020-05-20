<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class LoginController extends Controller
{
    public function login(){
        $validated = $this->validateLoginDetails();
        if (!auth()->attempt($validated)) {
            return response(['message'=>'invalid credentials', 'status'=> false]);
        }
        $access_token = auth()->user()->createToken('authToken')->accessToken;

        return response([
                'user_id'    => auth()->user()->id,
                'token'      => $access_token,
                'name' => auth()->user()->name,
                'email'  => auth()->user()->email
            ]
        );
    }

    private function validateLoginDetails(){
        return request()->validate([
            'email'    => 'email|required',
            'password' => 'required',
        ]);
    }
}
