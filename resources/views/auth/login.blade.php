<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
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
    </script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="flex justify-evenly gap-8 items-center">
        <!-- Logo Section -->
        <div class="w-1/2 flex justify-center">
            <img alt="Logo 'Buket_ku.id'" class="h-48" src="{{ asset('assets/images/logo.png') }}" width="300"
                height="300" />
        </div>

        <!-- Login Form Section -->
        <div class="bg-white p-8 rounded-lg shadow-md w-auto">
            <h2 class="text-2xl font-bold mb-2 text-blue-900">Sign in</h2>
            <p class="text-gray-600 mb-6">We need you to help us with some basic information to create your account</p>

            <!-- Display Success Message -->
            @if (Cache::has('success'))
                <div id="success-modal" class="fixed inset-0 z-50 flex justify-center items-center bg-gray-900 bg-opacity-50">
                    <div class="bg-white rounded-lg p-6 w-1/3">
                        <h3 class="text-lg font-semibold text-green-600">Success</h3>
                        <p class="text-gray-700 mt-2">{{ Cache::get('success') }}</p>
                        <div class="mt-4 flex justify-end">
                            <button onclick="closeModal('success-modal')" class="bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
                <script>
                    setTimeout(function() {
                        closeModal('success-modal');
                    }, 3000); // Modal will close after 3 seconds

                    function closeModal(modalId) {
                        document.getElementById(modalId).style.display = 'none';
                    }
                </script>
            @endif

            <!-- Display Error Messages -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-4">
                @csrf

                <!-- Email Input -->
                <div>
                    <label class="block text-gray-700 mb-2" for="email">Email</label>
                    <input class="w-full px-3 py-2 border rounded-lg" id="email" name="email" type="text" value="{{ old('email') }}" required />
                </div>

                <!-- Password Input with Toggle -->
                <div class="relative">
                    <label class="block text-gray-700 mb-2" for="password">Password</label>
                    <input class="w-full px-3 py-2 border rounded-lg pr-10 @error('password') border-red-500 @enderror" id="password" name="password" type="password" value="{{ old('password') }}" required />
                    <i class="fas fa-eye absolute right-3 top-11 text-gray-500 cursor-pointer" id="eye-icon" onclick="togglePassword()"></i>
                </div>

                <div class="flex justify-end items-center">
                    <a class="text-blue-600 hover:underline" href="/forgot-password">Forgot password?</a>
                </div>

                <!-- Submit Button -->
                <button class="w-full bg-purple-700 text-white py-2 rounded-lg hover:bg-purple-800">Sign In</button>
            </form>

            <!-- Links for Registration and Password Recovery -->
            <div class="flex justify-between items-center mt-4">
                <a class="text-gray-600" href="{{ route('register') }}">
                    Don't have an account? <span class="text-blue-600 hover:underline">Sign up</span>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
