<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rental;

class UserController extends Controller
{
    public function showDashboard()
    {
        $riwayatPenyewaan = Rental::where('user_id', Auth::id())->get();
        return view('user.dashboard', compact('riwayatPenyewaan'));
    }
}
