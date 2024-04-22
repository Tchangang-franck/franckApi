<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
class LoginController extends Controller
{

    public function create(){
        return view('Auth.login');
    }

    /**
     * this method authenticates a user by their password and email
     */
    public function authenticate(Request $request):RedirectResponse{
        $data=$request->only('email','password');
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email'=>"the provided credential do not match ou record.",
        ])->onlyInput('email');
      ;
    /**
     * retrieve all user in database to display them
     */
        $users=User::all();
    }

    /**
     * this method allows you to disconnect the user from the page
     */
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }

}
