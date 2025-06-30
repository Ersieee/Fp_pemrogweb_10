<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rental;

class RentalController extends Controller
{
    public function cekRental(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Data tidak ditemukan.');
        }

        // Cari data rental user
        $rentals = Rental::where('user_id', $user->id)->get();

        return view('hasil', compact('user', 'rentals'));
    }
}
