<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembeli;

class RegistController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([
            'username' => 'required|string|max:255|unique:pembeli,username',
            'email'    => [
                'required',
                'email',
                'max:255',
                'unique:pembeli,email',
                'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
            ],
            'password' => 'required|string|min:8',
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.unique'   => 'Username sudah digunakan.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'email.unique'      => 'Email sudah terdaftar.',
            'email.regex'       => 'Email harus menggunakan domain @gmail.com.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 8 karakter.',
        ]);

        Pembeli::create([
            'username' => $request->input('username'),
            'email'    => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role'     => 'pembeli',
        ]);

        return redirect()->route('login')->with('success', 'Registrasi Successful! Please login to continue.');
    }
}
