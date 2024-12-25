<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
</head>

<body>
    <h1>Permintaan Reset Password</h1>
    <p>Halo,</p>
    <p>Kami menerima permintaan untuk mereset password Anda.</p>
    <p>Gunakan token berikut untuk mereset password Anda secara manual:</p>
    <p>
        <strong>Token: {{ $token }}</strong>
    </p>
    <p>Atau klik tautan berikut untuk langsung mereset password:</p>
    <p>
        <a href="{{ url('/reset-password/' . $email . '/' . $token) }}">
            Reset Password
        </a>
    </p>
    <p>Tautan ini hanya berlaku untuk beberapa waktu.</p>
    <p>Jika Anda tidak meminta reset password, abaikan email ini.</p>
    <p>Salam,<br>Tim Kami</p>
</body>

</html>
