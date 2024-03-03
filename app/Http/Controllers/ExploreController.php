<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Like;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
     public function getdata(Request $request)
    {

        // $index = foto::with(['like', 'user'])->withCount(['like', 'comment'])->paginate();
        // return response()->json([
        //     'data'          => $index,
        //     'statuscode'    => 200,
        //     'userId'        => auth()->user()->id
        // ]);
        $index = Foto::with(['like', 'user'])->orderBy('id', 'DESC')->withCount(['like', 'komentar'])->paginate();

        // $index = collect($index)->map(function ($item) {
        //     // Use Storage facade to check if the profile image exists
        //     $profileImage = $item->user->profile ? Storage::exists('profile/' . $item->user->profile) ? $item->user->profile : 'assets/users.png' : 'assets/users.png';
        //     $item->user->profile = asset('profile/' . $profileImage); // Use asset() to generate the correct URL

        //     return $item;
        // });

        return response()->json([
            'data'       => $index,
            'statuscode' => 200,
            'userId'     => auth()->user()->id
        ]);
    }
    //like
    public function like(Request $request)
    {
        try {
            $request->validate([
                'fotoid' => 'required'
            ]);
            $existingLike = Like::where('foto_id', $request->fotoid)->where('users_id', auth()->user()->id)->first();
            if (!$existingLike) {
                $dataSimpan = [
                    'foto_id' => $request->fotoid,
                    'users_id' => auth()->user()->id
                ];
                like::create($dataSimpan);
            } else {
                like::where('foto_id', $request->fotoid)->where('users_id', auth()->user()->id)->delete();
            }
            return response()->json('Data berhasil di simpan', 200);
        } catch (\Throwable $th) {
            return response()->json('ada kesalahan', 500);
        }
    }
}
