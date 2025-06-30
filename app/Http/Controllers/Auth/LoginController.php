<?php 
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{ 
    public function showLoginForm()
    {
        return view('login'); // ✅ menampilkan form login saja
    }
 
    public function login(Request $request)
    {
         $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
 
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/dashboard'); // ✔️ login sukses
        }
 
        return back()->with('error', 'Gagal login. Email atau password salah.');
    }
 
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
         return redirect('/login')->with('status', 'Berhasil logout.');
   }
}
