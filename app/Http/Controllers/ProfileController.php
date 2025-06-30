<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $riwayat = collect([]); // bisa diisi data dummy kalau mau tes

        return view('profile', compact('user', 'riwayat'));
    }
}
