<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GramorcaController;
use App\Http\Controllers\EditpaswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware('guest')->group(function(){
    Route::get('/', function () {
        return view('login');
    });
    Route::get('/register', function () {
        return view('register');
    });
    Route::get('/login', function () {
        return view('login');
    });

    Route::post('/cek_akun', [GramorcaController::class, 'cek_akun']);
    Route::post('/buat_akun', [GramorcaController::class, 'buat_akun']);


});



Route::middleware(['user'])->group(function() {
    //menampilkan hal beranda
    Route::get('/beranda', [GramorcaController::class, 'beranda']);

    //menampilkan detail atau komen
    Route::get('/detailexplore/{id}', [GramorcaController::class, 'detailexplore']);
    Route::get('/detailexplore/{id}/getdatadetail', [GramorcaController::class, 'getdatadetail'])->name('getdatadetail');

    Route::get('/profil', [GramorcaController::class, 'profile']);
    Route::get('/upload', [GramorcaController::class, 'upload']);
    //aksi upload
    Route::post('save', [UploadController::class, 'save'])->name('save');


    //aksi update profile
    Route::post('changeprofile', [ProfileController::class, 'changeprofile'])->name('changeprofile');

     //aksi update password
     Route::get('changepassword', [ProfileController::class, 'changepassword'])->name('changepassword');

   //password
   Route::post('up_password', [EditpaswordController::class, 'up_password'])->name('up_password');
    Route::post('up_password', [ProfileController::class, 'up_password'])->name('up_password');
      //logout
      Route::post('logout', LogoutController::class)->name('logout');


      //getdata scroll explore
      Route::get('/getDataIndex', [ExploreController::class, 'getdata'])->name('getdata');

      //fungsi like
      Route::post('/like', [ExploreController::class, 'like'])->name('like');

      //fungsi ambil komentar
      Route::get('/detailexplore/getComment/{id}', [GramorcaController::class, 'ambildatakomentar'])->name('ambildatakomentar');

      //fungsi kirim komentar
      Route::post('/detailexplore/kirimkomentar', [GramorcaController::class, 'kirimkomentar'])->name('kirimkomentar');

      //proses tambah album
      Route::post('/album', [UploadController::class, 'album'])->name('album');

      //menampilkan isi album
       //album
    Route::get('/album/{id}', [ProfileController::class, 'show'])->name('album.show');


    //menampilkan profil public
    Route::get('/profil_publik/{id}' ,[ProfileController::class, 'profil_publik'])->name('profil_publik');
    Route::get('/profil_publik/getDataProfil/{id}', [ProfileController::class, 'getDataProfil'])->name('getDataProfil');

    Route::get('/getdataprofilepublic/', [ProfileController::class, 'getdataprofilepublic']);

});
//contoh
//js
