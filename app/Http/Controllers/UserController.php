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
<<<<<<< HEAD
{
    $riwayatPenyewaan = Rental::where('email', Auth::user()->email)->get();
    return view('user', compact('riwayatPenyewaan'));
}

=======
    {
        $user = Auth::user();
        $riwayatPenyewaan = Rental::where('login_id', $user->id)->get();
        return view('dashboard', compact('riwayatPenyewaan'));
    }
>>>>>>> db8830872e6894ed08ddb68e7e9de89c7123282d
}
