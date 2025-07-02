<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules; // Penting: Tambahkan ini untuk Rules\Password

class RegisterController extends Controller
{
    /**
     * Menampilkan formulir pendaftaran.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Menangani proses pendaftaran pengguna baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validasi data yang masuk dari formulir.
        // Laravel akan secara otomatis mengembalikan user ke halaman sebelumnya dengan error jika validasi gagal.
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20'], // Validasi untuk nomor telepon
            'password' => ['required', 'confirmed', Rules\Password::defaults()], // Menggunakan aturan password default Laravel
            // Validasi untuk data KYC dari hidden fields di frontend
            'nik' => ['required', 'string', 'digits:16', 'unique:users'], // NIK wajib, 16 digit, dan unik di tabel users
            'full_name_ktp' => ['required', 'string', 'max:255'],
            'dob_ktp' => ['required', 'date_format:Y-m-d'], // Pastikan format tanggal masuk YYYY-MM-DD
            'address_ktp' => ['required', 'string'],
            'ktp_image_url' => ['required', 'url'], // Harus berupa URL yang valid (dari API KYC eksternal)
            'selfie_image_url' => ['required', 'url'], // Harus berupa URL yang valid (dari API KYC eksternal)
            'face_verification_status' => ['required', 'in:PENDING,VERIFIED,FAILED,MANUAL_REVIEW'], // Pastikan status sesuai enum
            'verification_transaction_id' => ['nullable', 'string', 'max:255'], // Opsional, bisa kosong
        ]);

        // Membuat instance pengguna baru dan menyimpannya ke database.
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'nik' => $request->nik,
            'full_name_ktp' => $request->full_name_ktp,
            'dob_ktp' => $request->dob_ktp,
            'address_ktp' => $request->address_ktp,
            'ktp_image_path' => $request->ktp_image_url, // Menyimpan URL KTP dari frontend/API KYC
            'selfie_image_path' => $request->selfie_image_url, // Menyimpan URL selfie dari frontend/API KYC
            'face_verification_status' => $request->face_verification_status,
            // Menetapkan last_verification_at hanya jika statusnya VERIFIED, jika tidak null
            'last_verification_at' => ($request->face_verification_status === 'VERIFIED') ? now() : null,
            'verification_transaction_id' => $request->verification_transaction_id ?? null, // Simpan jika ada, jika tidak null
        ]);

        // Mengarahkan pengguna setelah pendaftaran berhasil.
        // Anda bisa memilih untuk langsung login atau redirect ke halaman tertentu.
        return redirect('/')->with('success', 'Registrasi berhasil! Silakan login untuk melanjutkan.');
        // Atau jika ingin langsung login:
        // auth()->login($user); // Jika Anda ingin langsung login user setelah daftar
        // return redirect('/home');
    }
}