<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Like;
use App\Models\User;
use App\Models\Album;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GramorcaController extends Controller
{

    public function beranda(){
        return view('/beranda');
    }





    public function cek_akun(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            echo "<script>alert('Berhasil login.'); window.location.href='/beranda';</script>";
        } else {
            echo "<script>alert('Gagal login.'); window.location.href='/login';</script>";
        }
    }

    // public function buat_akun(Request $request)
    // {
    //     $datasimpan = [
    //         'nama_lengkap' => $request->nama_lengkap,
    //         'username' => $request->username,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //         'alamat' => $request->alamat,
    //     ];
    //     User::create($datasimpan);

    //     echo "<script>alert('Berhasil Register.'); window.location.href='/login';</script>";
    //     // return view('login');
    // }
    public function buat_akun(Request $request)
{
    // Data yang akan disimpan dalam database
    $datasimpan = [
        'nama_lengkap' => $request->nama_lengkap,
        'username' => $request->username,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'alamat' => $request->alamat,
    ];

    // Set path default gambar profil
    $defaultProfilePath = 'users.png';

    // Set path gambar profil berdasarkan input pengguna
    $profilePath = $request->hasFile('photo') ?
        $request->file('photo')->store('public/foto') :
        $defaultProfilePath;

    // Gabungkan path gambar profil dengan data yang akan disimpan
    $datasimpan['foto_profile'] = $profilePath;

    // Buat akun baru dengan data yang telah disiapkan
    User::create($datasimpan);

    // Tampilkan pesan berhasil dan arahkan ke halaman login
    echo "<script>alert('Berhasil Register.'); window.location.href='/login';</script>";
}
    //menampilkan komen atau detail explore
    public function detailexplore(){
        $jmlKomen = Komentar::all()->count();
        $jmlLike  = Like::all()->count();
        return view('komen', compact('jmlKomen', 'jmlLike'));
    }

    //menampilkan profile
    public function profile(){

        $tampilUpload = Foto::with('album')->where('users_id', auth()->user()->id)->get();
        $tampilAlbum = Album::with('foto')->where('users_id', auth()->user()->id)->get();
        $profile = User::where('id', auth()->user()->id)->first();
        // Check if the profile image is not set, then use the new default image
        $defaultProfileImagePath = 'assets/users.png';

        if (is_null($profile->profile)) {
            $profile->profile = $defaultProfileImagePath;
        }
        // $dataJumlahFollow = DB::table('follow')->selectRaw('count(follow_id) as jmlfollow')->where('follow_id', $profile->user->id)->first();
        return view('profile', compact('profile', 'tampilUpload', 'tampilAlbum',));
    }

    //menampilkan hal, upload
    public function upload(){

        $album = Album::all();
        return view('upload', compact('album'));
    }
    //js detail explore
    public function getdatadetail(Request $request, $id)
    {
        $dataDetailFoto = Foto::with('user','like','komentar')->where('id', $id)->firstOrFail();


        return response()->json([
            'dataDetailFoto'    => $dataDetailFoto,
            'dataUser' => auth()->user()->id,
        ], 200);
    }
    //ambil komentar
    public function ambildatakomentar(Request $request, $id)
    {
        $ambilkomentar = Komentar::with('user')->where('foto_id', $id)->get();
        return response()->json([
            'data'  => $ambilkomentar
        ], 200);
    }
    public function kirimkomentar(Request $request)
    {
        try {
            $request->validate([
                'idfoto'            => 'required',
                'isi_komentar'      => 'required',
            ]);

            $dataStoreKomentar = [
                'users_id'   => auth()->user()->id,
                'foto_id'   => $request->idfoto,
                'isi_komentar' => $request->isi_komentar
            ];
            Komentar::create($dataStoreKomentar);
            return response()->json([
                'data'      => 'Data berhasil disimpan'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json('data komentar gagal disimpan', 500);
        }
    }

}
