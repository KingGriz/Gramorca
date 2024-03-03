<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class EditpaswordController extends Controller
{
    public function up_password(Request $request)
    {
        // Mengambil data user yang sedang login
        $user = User::find(auth()->user()->id);

        // Validasi inputan
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        // Memeriksa apakah password saat ini benar
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Password saat ini salah');
        }

        // Memperbarui password user
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);
        echo "<script>alert('Password berhasil diubah.'); window.location.href='/profile';</script>";
        return redirect('profil')->with('success', 'Password Berhasil Diubah!');
    }
}
