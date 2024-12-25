<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Sign Up</title>
    @vite('resources/css/app.css')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        function toggleConfPassword() {
            const passwordField = document.getElementById('password_confirmation');
            const eyeIcon = document.getElementById('eye-icon-2');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-w-full min-h-screen py-4">
    <div class="flex items-center justify-center w-full max-w-4xl">
        <div class="w-1/2 flex justify-center">
            <img alt="Logo 'Buket_ku.id'" class="h-48" height="300" src="{{ asset('assets/images/logo.png') }}"
                width="300" />
        </div>
        <div class="w-1/2 bg-white p-8 rounded-lg shadow-lg">
            <header class="flex flex-col justify-center w-full mb-4">
                <h1 class="text-4xl font-semibold tracking-tight text-blue-950 max-md:text-3xl">Sign up</h1>
                <p class="mt-5 text-md font-medium tracking-normal text-zinc-500 max-md:max-w-full">We need you to help
                    us with some basic information to create your account</p>
            </header>

            <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4 font-medium min-w-full">
                @csrf

                <div>
                    <label class="block text-gray-700 mb-2" for="name">Nama</label>
                    <input class="w-full px-3 py-2 border rounded-lg @error('name') border-red-500 @enderror"
                        id="name" name="name" type="text" value="{{ old('name') }}" required />
                    @error('name')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 mb-2" for="email">Email</label>
                    <input class="w-full px-3 py-2 border rounded-lg @error('email') border-red-500 @enderror"
                        id="email" name="email" type="email" value="{{ old('email') }}" required />
                    @error('email')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 mb-2" for="no_telepon">No Telepon</label>
                    <input class="w-full px-3 py-2 border rounded-lg @error('no_telepon') border-red-500 @enderror"
                        id="no_telepon" name="no_telepon" type="text" value="{{ old('no_telepon') }}" required />
                    @error('no_telepon')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="relative">
                    <label class="block text-gray-700 mb-2" for="password">Password</label>
                    <input class="w-full px-3 py-2 border rounded-lg @error('password') border-red-500 @enderror"
                        id="password" name="password" type="password" value="{{ old('password') }}" required />
                    <i id="eye-icon" class="fas fa-eye absolute right-3 top-11 text-gray-500 cursor-pointer"
                        onclick="togglePassword()"></i>
                    @error('password')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="relative">
                    <label for="password_confirmation" class="block text-gray-700 mb-2">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="w-full px-3 py-2 border rounded-lg" value="{{ old('password_confirmation') }}" />
                    <i id="eye-icon-2" class="fas fa-eye absolute right-3 top-11 text-gray-500 cursor-pointer"
                        onclick="toggleConfPassword()"></i>
                    @error('password_confirmation')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="invalid-feedback text-red-500">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <button class="w-full bg-purple-700 text-white py-2 rounded-lg font-semibold hover:bg-purple-800"
                    type="submit">Sign up</button>
            </form>

            <p class="text-center text-gray-600 mt-4 font-medium">Already have an account? <a
                    class="text-blue-600 hover:underline" href="{{ route('login') }}">Sign in</a></p>
        </div>
    </div>
</body>

</html>
