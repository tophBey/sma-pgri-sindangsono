<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    

    public function index(){

        return view('frontend.auth.login');
    }


    public function login(LoginStoreRequest $request){

        $validated = $request->validated();

        if (Auth::attempt($validated)) {

            $request->session()->regenerate();

            return redirect()->route('dashboard.index');
        } 

        return back()->with('LoginError','Email Atau Password Salah');

    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect()->route('login');
    }
}
