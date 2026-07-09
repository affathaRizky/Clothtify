<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function processLogin(Request $request)
    {
        // Admin Auth
        $admin = Admin::where('username', $request->username)->first();
        if ($admin && Hash::check($request->password, $admin->password)) {
            session([
                'admin_id'       => $admin->id_admin,
                'admin_username' => $admin->username,
                'admin_role'     => $admin->role,
            ]);

            return redirect()->route('admin.home')
                ->with('success', 'Selamat datang, ' . $admin->username . '!');
        }

        // Pembeli Auth
        $pembeli = Pembeli::where('username', $request->username)->first();
        if ($pembeli && Hash::check($request->password, $pembeli->password)) {
            Auth::login($pembeli);
            return redirect()->route('home')->with('success', 'Login Success!');
        }

        return back()->with('error', 'Username Or Password Is Incorrect!');
    }

    public function logout()
    {
        Auth::logout();
        Auth::guard('admin')->logout();
        session()->flush();

        return redirect()->route('login')->with('success', 'Logout Success!');
    }
}
