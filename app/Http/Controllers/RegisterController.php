<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{


    public function create(){
        return view('Auth.register');
    }


    //
    /**
     * this method allow you to register a new user 
     */
     public function register(Request $request){
        Validator::make($request->all(),[
            'name'=>['required'|'string'|'max:255'],
            'email'=>['required'|'email'],
            'password'=>['required'|'string'|'min:8','confirmed']
        ]);

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'password_confirmation'=>Hash::make($request->confirmation_password)
        ]);
        $user->save();
        return redirect('/login');
     }
}
