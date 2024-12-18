@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Link Verifikasi Kadaluarsa</h1>
    <p>Link verifikasi email Anda sudah kadaluarsa. Klik tombol di bawah untuk mengirim ulang link verifikasi ke email Anda.</p>
    
    <form action="{{ route('verification.resend') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $id }}">
        <button type="submit" class="btn btn-primary">Kirim Ulang Link Verifikasi</button>
    </form>
</div>
@endsection
