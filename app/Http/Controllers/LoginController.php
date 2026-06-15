<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use App\Models\admin;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('pages.login');
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi!',
            'password.required' => 'Password wajib diisi!',
        ]);

        $admin = Admin::where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        $pembeli = Pembeli::where('username', $request->username)
            ->where('password', $request->password)
            ->first();
        
        $user = $admin ?? $pembeli;

        if ($user->role === 'admin') {
            session([
                'id_admin'   => $user->id_admin,
                'username'  => $user->username,
                'email'     => $user->email,    
                'role'      => $user->role
            ]);

            return redirect()->route('homeAdmin')->with('success', 'Login berhasil!');
        } else {
            session([
                'id_pembeli' => $user->id_pembeli,
                'username'   => $user->username,
                'email'      => $user->email,    
                'role'      => $user->role
            ]);
            return redirect()->route('home')->with('success', 'Login berhasil!');
            
        }
        return back()->with('error', 'Username atau Password salah!');
    }

    public function logout()
    {
        session()->flush();

        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}
