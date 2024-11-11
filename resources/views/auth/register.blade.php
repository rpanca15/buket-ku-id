<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Sign Up</title>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
        function toggleConfPassword() {
            const passwordField = document.getElementById('password_confirmation');
            const eyeIcon = document.getElementById('eye-icon-2');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen py-4">
    <div class="flex items-center justify-center w-full max-w-4xl">
        <div class="w-1/2 flex justify-center">
            <img alt="Logo 'Buket_ku.id'" class="h-48" height="300" src="{{ asset('assets/images/logo.png') }}"
                width="300" />
        </div>
        <div class="w-1/2 bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-blue-900 mb-4">Sign up</h2>
            <p class="text-gray-600 mb-6">
                We need you to help us with some basic information to create your account
            </p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="name">Nama</label>
                    <input class="w-full px-3 py-2 border rounded-lg" id="name" name="name" type="text"
                        required />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="email">Email</label>
                    <input class="w-full px-3 py-2 border rounded-lg" id="email" name="email" type="email"
                        required />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="phone">No Telepon</label>
                    <input class="w-full px-3 py-2 border rounded-lg" id="phone" name="phone" type="text"
                        required />
                </div>
                <div class="mb-6 relative">
                    <label class="block text-gray-700 mb-2" for="password">Password</label>
                    <input class="w-full px-3 py-2 border rounded-lg" id="password" name="password" type="password"
                        required />
                    <i id="eye-icon" class="fas fa-eye absolute right-3 top-11 text-gray-500 cursor-pointer"
                        onclick="togglePassword()"></i>
                </div>
                <div class="mb-6 relative">
                    <label for="password_confirmation" class="block text-gray-700 mb-2">Konfirmasi
                        Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="w-full px-3 py-2 border rounded-lg">
                    <i id="eye-icon-2" class="fas fa-eye absolute right-3 top-11 text-gray-500 cursor-pointer"
                        onclick="toggleConfPassword()"></i>
                </div>
                <button class="w-full bg-purple-700 text-white py-2 rounded-lg font-semibold hover:bg-purple-800"
                    type="submit">
                    Sign up
                </button>
            </form>
            <p class="text-center text-gray-600 mt-4">
                Already have an account?
                <a class="text-blue-600" href="{{ route('login') }}">Sign in</a>
            </p>
        </div>
    </div>
</body>

</html>
