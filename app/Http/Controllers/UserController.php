<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
                'status code' => 201,
                'message' => 'user created successfully',
                'data' => $user
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function login(LogUserRequest $request, Auth $auth)
    {
        if (auth()->attempt($request->only(['email', 'password']))) {
            $user = auth()->user();
            $token = $user->createToken('MA_CLE_SECRET_VISIBLE_UNIQUEMENT_AU_BACKEND')->plainTextToken;
            return response()->json([
                'status code' => 200,
                'message' => 'utilisateur connecte',
                'user' => $user,
                'token' => $token
            ]);
        } else {
            //si les informations sont incorrecte 
            return response()->json([
                'status code' => 403,
                'mesage' => 'information non valide'
            ]);
        }
    }
}
