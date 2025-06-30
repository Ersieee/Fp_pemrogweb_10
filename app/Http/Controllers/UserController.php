<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rental;

class UserController extends Controller
{
    public function showUser()
    {
        $riwayatPenyewaan = Rental::where('user_id', Auth::id())->get();
        return view('user', compact('riwayatPenyewaan')); // ke file: resources/views/user.blade.php
    }
}
