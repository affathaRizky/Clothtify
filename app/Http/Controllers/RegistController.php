<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\register;

class RegistController extends Controller
{
    public function register(Request $request)
    {
       $register = new register();
       $register->username =  $request->input('username');
       $register->email = $request->input('email');
       $register->password = $request->input('password');
       $register->role = 'pembeli';
       $register->save();

       return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
