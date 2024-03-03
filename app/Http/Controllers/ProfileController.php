<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\Foto;
use App\Models\User;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function changeprofile(Request $request)
    {
        // Inisialisasi array dataToUpdate
        $dataToUpdate = [];

        // Logika penyimpanan foto sesuai kebutuhan Anda
        $filename = pathinfo($request->profile, PATHINFO_FILENAME);

        $extension = $request->profile->getClientOriginalExtension();
        $namafoto = 'profile' . time() . '.' . $extension;
        $request->profile->move('profile', $namafoto);


        // Update data lainnya
        $dataToUpdate += [
            'nama_lengkap' => $request->nama_lengkap,
            'no_telepon' => $request->no_telepon,
            'bio' => $request->bio,
            'alamat' => $request->alamat,
            'foto_profile' => $namafoto
        ];

        //proses update
        User::where('id', auth()->user()->id)->update($dataToUpdate);

        echo "<script>alert('berhasil update profile'); window.location.href='/profil';</script>";
    }

    //update password
    // public function up_password(Request $request)
    // {
    //     $user = User::find(auth()->user()->id);

    //     $request->validate([
    //         'current_password' => 'required|password',
    //         'new_password' => 'required|min:6|confirmed',
    //     ]);

    //     $dataToUpdate = [
    //         'password' => bcrypt($request->input('new_password')),
    //     ];



    //     if($user->update($dataToUpdate)){
    //         echo "<script>alert('berhasil update password'); window.location.href='/profil';</script>";
    //     } else {
    //         echo "<script>alert('gagal update password'); window.location.href='/profil';</script>";
    //     }

    // }
    public function up_password(Request $request)
{
    $user = User::find(auth()->user()->id);

    $request->validate([
        'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
            if (!Hash::check($value, $user->password)) {
                return $fail(__('The current password is incorrect.'));
            }
        }],
        'new_password' => 'required|min:6|confirmed',
    ]);

    $dataToUpdate = [
        'password' => bcrypt($request->input('new_password')),
    ];

    if ($user->update($dataToUpdate)) {
        echo "<script>alert('berhasil update password'); window.location.href='/profil';</script>";
    } else {
        echo "<script>alert('gagal update password'); window.location.href='/profil';</script>";
    }
}


    public function show($id)
    {
        $album = Album::with('foto')->findOrFail($id);
        return view('album', compact('album'));
    }

    // Metode untuk menampilkan profil publik pengguna
    public function profil(Request $request, $id)
    {
        $profile = Foto::where('user_id', $id)->first();
        return view('user.comment', compact('profile'));
    }
    //mengambil jumlah upload user login
    public function getdataprofilepublic(Request $request)
    {
        // $dataUser               = User::where('id', $id)->firstOrFail();

        $index                  = Foto::with(['user'])->where('users_id', $request->userId)->paginate();
        return response()->json([
            // 'datauser'                 => $dataUser,

            'data'                     => $index,
            'statuscode'               => 200,
            'userId'                   => auth()->user()->id
        ]);
    }
    public function profil_publik($id){
        $profile = Foto::where('users_id', $id)->first();
        return view('profile_publik', compact('profile'));
    }
    public function getDataProfil(Request $request, $id)
    {
        $dataUser                 = User::where('id', $id)->first();
        // $dataJumlahFollower       = DB::select('SELECT COUNT(user_id) as jmlfollower FROM follow where follow_id = ' . $id);
        // $dataJumlahFollowing      = DB::select('SELECT COUNT(follow_id) as jmlfollowing FROM follow where user_id = ' . $id);
        // $dataFollow               = follow::where('follow_id', $id)->where('user_id', auth()->user()->id)->first();

        // //datafollow
        // $dataFollowers    = DB::select('SELECT COUNT(follow_id) as jmlfollowers FROM follow where follow_id=' . $id);
        // $dataFollowing    = DB::select('SELECT COUNT(follow_id) as jmlfollowers FROM follow where user_id=' . $id);
        return response()->json([
            'dataUser'              => $dataUser,

            // 'jumlahFollower'        => $dataJumlahFollower,
            // 'jumlahFollowing'       => $dataJumlahFollowing,

            // 'datafollowers'   => $dataFollowers,
            // 'datafollowing'   => $dataFollowing,

            'dataUserActive'        => auth()->user()->id,
            // 'dataFollow'            => $dataFollow
        ], 200);
    }
}
