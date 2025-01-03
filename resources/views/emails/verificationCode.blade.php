<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi Email</title>
</head>
<body>
    <h1>Verifikasi Email Anda</h1>
    <p>Halo {{ $user->name }},</p>
    <p>Terima kasih telah mendaftar. Gunakan kode verifikasi berikut untuk memverifikasi email Anda:</p>
    <h2 style="background: #eee; padding: 10px; text-align: center; letter-spacing: 5px;">
        {{ $verificationCode }}
    </h2>
    <p>Kode ini akan kadaluarsa dalam 60 menit.</p>
    <p>Jika Anda tidak mendaftar di aplikasi kami, abaikan email ini.</p>
    <p>Salam,<br>Tim Kami</p>
</body>
</html>
