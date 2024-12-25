<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        @keyframes closeModalAnimation {
            0% {
                transform: translateZ(0);
                opacity: 1;
            }

            100% {
                transform: translateZ(-1000px);
                opacity: 0;
            }
        }

        .modal {
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        .modal-close {
            animation: closeModalAnimation 0.3s forwards;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <!-- Modal for success/error messages (kept as is) -->

    <div class="flex flex-col items-center bg-white p-8 rounded-lg shadow-md w-auto">
        <header class="flex flex-col justify-center w-full mb-4">
            <h1 class="text-4xl font-semibold tracking-tight text-blue-950 max-md:text-3xl">Forgot Password</h1>
            <p class="mt-5 text-md font-medium tracking-normal text-zinc-500 max-md:max-w-full">
                Please enter your email to receive a reset password token.
            </p>
        </header>

        <div id="alert" class="hidden w-full mb-4 p-4 rounded-lg">
            <p id="alert-message" class="text-sm font-medium"></p>
        </div>

        <form id="email-form" method="POST" action="/forgot-password"
            class="flex flex-col gap-4 font-medium min-w-full">
            @csrf
            <div>
                <label class="block text-gray-700 mb-2" for="email">Email</label>
                <input class="w-full px-3 py-2 border rounded-lg" id="email" name="email" type="email"
                    required />
            </div>
            <button id="send-button"
                class="w-full bg-purple-700 text-white py-2 rounded-lg hover:bg-purple-800 disabled:bg-purple-300 disabled:cursor-not-allowed">
                <span id="button-text">Send Token</span>
                <span id="button-loader" class="hidden">
                    <i class="fas fa-spinner fa-spin"></i> Sending...
                </span>
            </button>
        </form>

        <form id="reset-form" method="POST" action="{{ route('reset.password') }}"
            class="hidden flex flex-col gap-4 font-medium min-w-full">
            @csrf
            <input type="hidden" id="reset-email" name="email">
            <div>
                <label class="block text-gray-700 mb-2" for="token">Token</label>
                <input class="w-full px-3 py-2 border rounded-lg" id="token" name="token" type="text"
                    required />
            </div>
            <div>
                <label class="block text-gray-700 mb-2" for="password">New Password</label>
                <input class="w-full px-3 py-2 border rounded-lg" id="password" name="password" type="password"
                    required />
            </div>
            <div>
                <label class="block text-gray-700 mb-2" for="password_confirmation">Confirm Password</label>
                <input class="w-full px-3 py-2 border rounded-lg" id="password_confirmation"
                    name="password_confirmation" type="password" required />
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">Reset
                Password</button>
        </form>

        <span id="resend-button"
            class="hidden w-full text-center text-blue-600 py-2 rounded-lg mt-4 hover:underline disabled:text-blue-300 disabled:cursor-not-allowed">
            Resend Token
        </span>
    </div>

    <script>
        let resendTimer = null;

        function showAlert(message, type) {
            const alert = document.getElementById('alert');
            const alertMessage = document.getElementById('alert-message');
            alert.className = `w-full mb-4 p-4 rounded-lg ${
                type === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'
            }`;
            alertMessage.textContent = message;
            alert.classList.remove('hidden');
        }

        function setLoading(loading) {
            const button = document.getElementById('send-button');
            const buttonText = document.getElementById('button-text');
            const buttonLoader = document.getElementById('button-loader');

            button.disabled = loading;
            if (loading) {
                buttonText.classList.add('hidden');
                buttonLoader.classList.remove('hidden');
            } else {
                buttonText.classList.remove('hidden');
                buttonLoader.classList.add('hidden');
            }
        }

        function startResendTimer(duration) {
            const button = document.getElementById('resend-button');
            button.disabled = true;

            let remainingTime = duration;
            clearInterval(resendTimer);

            resendTimer = setInterval(() => {
                if (remainingTime <= 0) {
                    clearInterval(resendTimer);
                    button.textContent = 'Resend Token';
                    button.disabled = false;
                } else {
                    button.textContent = `Resend in ${remainingTime--}s`;
                }
            }, 1000);
        }

        function showResetForm(email) {
            document.getElementById('email-form').classList.add('hidden');
            document.getElementById('reset-form').classList.remove('hidden');
            document.getElementById('resend-button').classList.remove('hidden');
            document.getElementById('reset-email').value = email;
            startResendTimer(15);
        }

        async function handleSubmit(email) {
            try {
                setLoading(true);

                const response = await fetch('/forgot-password', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        email
                    })
                });

                const data = await response.json();
                if (response.ok) {
                    showAlert(data.message, 'success');
                    showResetForm(email);
                } else {
                    showAlert(data.message || 'Validation failed, check your email.', 'error');
                }
            } catch (error) {
                console.error('Error details:', error);
                showAlert('An error occurred. Please try again.', 'error');
            } finally {
                setLoading(false);
            }
        }

        document.getElementById('email-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            const email = document.getElementById('email').value;
            await handleSubmit(email);
        });

        document.getElementById('resend-button').addEventListener('click', async () => {
            const email = document.getElementById('reset-email').value;
            await handleSubmit(email);
        });
    </script>
</body>

</html>
