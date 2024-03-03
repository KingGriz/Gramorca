<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        // Alert::success('success', 'Logout berhasil!');
        Auth::logout();
        return redirect('/login');
    }
}
