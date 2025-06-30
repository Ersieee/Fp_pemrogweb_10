<?php

namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\Auth;
use App\Models\Rental;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showUser()
    {
        $user = Auth::user();
        $riwayatPenyewaan = Rental::where('login_id', $user->id)->get();
        return view('dashboard', compact('riwayatPenyewaan'));
    }
}
