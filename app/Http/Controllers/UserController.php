<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rental;

class UserController extends Controller
{
    public function showUser()
{
    $riwayatPenyewaan = Rental::where('email', Auth::user()->email)->get();
    return view('user', compact('riwayatPenyewaan'));
}

}
