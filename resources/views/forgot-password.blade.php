@extends('layouts.app') <!-- jika ada, atau pakai HTML biasa -->
@section('content')
    <h2>Reset Password</h2>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form method="POST" action="/forgot-password">
        @csrf
        <label>Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Kirim Link Reset</button>
    </form>
@endsection
