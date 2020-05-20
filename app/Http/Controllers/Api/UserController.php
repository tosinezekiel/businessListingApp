<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function logout(Request $request)
    {
        if (auth()->check()) {
            auth()->user()->token()->revoke();

            return response(['success'=>true]);
        }

        return response(['error'=>'something went wrong']);
    }

    public function userdetails(){
        return response()->json(['user' => auth()->user()], 200);
    }
}
