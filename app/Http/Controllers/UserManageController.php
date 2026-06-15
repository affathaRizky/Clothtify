<?php

namespace App\Http\Controllers;

use App\Models\pembeli;
use App\Models\register;
use Illuminate\Http\Request;

class UserManageController extends Controller
{
    public function showData()
    {
        $users = Pembeli::paginate(10);

        return view('pages.admin.user_management', compact('users'));
    }

    public function addUser(Request $request)
    {
        $user = new Pembeli();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role = 'pembeli';
        $user->save();

        return redirect()->route('userManagement')->with('success', 'User berhasil ditambahkan!');
    }

    public function deleteUser($id)
    {
        $user = Pembeli::findOrFail($id);
        $user->delete();

        return redirect()->route('userManagement')->with('success', 'User berhasil dihapus!');
    }

    public function updateUser(Request $request, $id)
    {
        $user = Pembeli::findOrFail($id);
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = $request->input('password');
        }
        $user->save();

        return redirect()->route('userManagement')->with('success', 'User berhasil diperbarui!');
    }
}
