@vite('resources/css/app.css') <!-- Memuat CSS -->

<!-- Tambahkan CDN Font Awesome di bagian <head> atau sebelum penutup </body> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

<section class="flex overflow-hidden items-center px-16 py-48 bg-zinc-50 max-md:px-5 max-md:py-24">
    <!-- Logo di Kiri -->
    <div class="flex-shrink-0">
        <img loading="lazy" src="assets/images/logotrans.png" alt="Logo" class="object-contain max-w-full aspect-[1.14] w-[711px]" />
    </div>

    <!-- Form di Kanan -->
    <main class="flex flex-col px-8 pt-8 pb-28 mt-0 max-w-full bg-white rounded-3xl border border-solid border-stone-300 min-h-[632px] w-[583px] max-md:px-5 max-md:pb-24 max-md:mt-0">
        <div class="flex flex-col justify-center items-center w-full">
            <header class="flex flex-col justify-center w-full">
                <h1 class="text-5xl font-semibold tracking-tight text-blue-950 max-md:text-4xl">Sign In</h1>
                <p class="mt-5 text-lg font-medium tracking-normal text-zinc-500 max-md:max-w-full">Please enter your email and password to access your account.</p>
            </header>
            
            <form class="flex flex-col mt-8 max-w-full font-medium w-[488px]" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="flex flex-col gap-6">
                    
                    <!-- Input Email -->
                    <div class="flex flex-col">
                        <label for="email" class="text-xl tracking-normal text-zinc-800">Email</label>
                        <input type="email" id="email" name="email" class="px-4 py-2.5 text-base tracking-normal text-left rounded-xl border border-solid border-stone-300" placeholder="Enter your email" aria-label="Enter your email" required />
                    </div>

                    <!-- Input Password -->
                    <div class="flex flex-col">
                        <label for="password" class="text-xl tracking-normal text-zinc-800">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" class="px-4 py-2.5 text-base tracking-normal text-left rounded-xl border border-solid border-stone-300 w-full" placeholder="••••••••••••" aria-label="Enter your password" required />
                            <button type="button" id="toggle-password" class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <i class="fas fa-eye-slash" id="eye-icon"></i> <!-- Awalnya ikon mata tertutup -->
                            </button>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="mt-8 w-full text-xl font-medium tracking-normal text-white bg-violet-900 rounded-2xl py-3">Sign In</button>
                
                <div class="mt-4 text-center">
                    <a href="" class="text-sm text-blue-600">Forgot Your Password?</a>
                </div>
                <div class="mt-2 text-center">
                    <a href="{{ route('register') }}" class="text-sm text-blue-600">Don't have an account? Sign up</a>
                </div>
            </form>
        </div>
    </main>
</section>

<script>
    const togglePassword = document.getElementById('toggle-password');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-icon');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        eyeIcon.classList.toggle('fa-eye');
        eyeIcon.classList.toggle('fa-eye-slash');
    });
</script>