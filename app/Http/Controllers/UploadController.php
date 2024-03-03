<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Album;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function save(Request $request)
    {
        // Logika penyimpanan foto sesuai kebutuhan Anda
        $filename = pathinfo($request->fileFoto, PATHINFO_FILENAME);

        $extension = $request->fileFoto->getClientOriginalExtension();
        $namafoto = 'foto' . time() . '.' . $extension;
        $request->fileFoto->move('foto', $namafoto);

        $datasimpan = [
            'users_id' => auth()->user()->id,
            'judul_foto' => $request->judul_foto,
            'album_id' => $request->nama_album,
            'deskripsi' => $request->deskripsi,
            'lokasi_foto' => $namafoto
        ];
        Foto::create($datasimpan);
        // Alert::success('Upload berhasil', 'anda telah berhasil Upload foto');
        echo "<script>alert('berhasil upload.'); window.location.href='/beranda';</script>";
    }
    public function album(Request $request)
    {
        if ($request->album_id == 0) {
            // Jika album_id adalah 0, itu berarti memilih opsi "Tambah Album Baru"
            $dataalbum = [
                'users_id' => auth()->user()->id,
                'nama_album' => $request->nama_album,
            ];
            Album::create($dataalbum);
        }
        echo "<script>alert('berhasil tambah album.'); window.location.href='/upload    ';</script>";
    }
}
