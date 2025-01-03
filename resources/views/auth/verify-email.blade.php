<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    @vite('resources/css/app.css')
  	<style>
        /* Menyembunyikan modal dengan animasi */
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

        /* Style untuk input verifikasi */
        .verification-code {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .verification-code input {
            width: 40px;
            height: 40px;
            text-align: center;
            font-size: 1.2rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            margin: 0 2px;
            transition: all 0.2s ease;
        }

        .verification-code input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
            outline: none;
        }
    </style>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
  @if (Cache::has('success'))
        <!-- Modal untuk pesan sukses -->
        <div id="success-modal" class="absolute top-10 left-0 right-0 z-50 flex justify-center items-center">
            <div class="bg-white rounded-lg p-6 w-1/3 shadow-lg modal">
                <h3 class="text-lg font-semibold text-green-600">Success</h3>
                <p class="text-gray-700 mt-2">{{ Cache::get('success') }}</p>
                {{-- <div class="mt-4 flex justify-end">
                    <button onclick="closeModal('success-modal')"
                        class="bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600">
                        Close
                    </button>
                </div> --}}
            </div>
        </div>

        <script>
            setTimeout(function() {
                closeModal('success-modal');
            }, 1500);

            function closeModal(modalId) {
                const modal = document.getElementById(modalId);

                modal.querySelector('.modal').classList.add('modal-close');

                setTimeout(() => {
                    modal.style.display = 'none';
                    modal.querySelector('.modal').classList.remove('modal-close');
                }, 300);
            }
        </script>
    @elseif (Cache::has('error'))
		<!-- Modal untuk pesan error -->
        <div id="error-modal" class="absolute top-10 left-0 right-0 z-50 flex justify-center items-center">
            <div class="bg-white rounded-lg p-6 w-1/3 shadow-lg modal">
                <h3 class="text-lg font-semibold text-red-600">Error</h3>
                <p class="text-gray-700 mt-2">{{ Cache::get('error') }}</p>
                {{-- <div class="mt-4 flex justify-end">
                    <button onclick="closeModal('error-modal')"
                        class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600">
                        Close
                    </button>
                </div> --}}
            </div>
        </div>

        <script>
            setTimeout(function() {
                closeModal('error-modal');
            }, 1500);

            function closeModal(modalId) {
                const modal = document.getElementById(modalId);

                modal.querySelector('.modal').classList.add('modal-close');

                setTimeout(() => {
                    modal.style.display = 'none';
                    modal.querySelector('.modal').classList.remove('modal-close');
                }, 300);
            }
        </script>
    @elseif (Cache::has('info'))
        <!-- Modal untuk pesan error -->
        <div id="info-modal" class="absolute top-10 left-0 right-0 z-50 flex justify-center items-center">
            <div class="bg-white rounded-lg p-6 w-1/3 shadow-lg modal">
                <h3 class="text-lg font-semibold text-blue-600">Info</h3>
                <p class="text-gray-700 mt-2">{{ Cache::get('info') }}</p>
                {{-- <div class="mt-4 flex justify-end">
                    <button onclick="closeModal('error-modal')"
                        class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600">
                        Close
                    </button>
                </div> --}}
            </div>
        </div>

        <script>
            setTimeout(function() {
                closeModal('info-modal');
            }, 1500);

            function closeModal(modalId) {
                const modal = document.getElementById(modalId);

                modal.querySelector('.modal').classList.add('modal-close');

                setTimeout(() => {
                    modal.style.display = 'none';
                    modal.querySelector('.modal').classList.remove('modal-close');
                }, 300);
            }
        </script>
    @endif
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-4 text-center">Verifikasi Email</h2>
        
        <p class="text-center text-gray-600 mb-6">
            Masukkan 6 digit kode verifikasi yang telah kami kirimkan ke email Anda
        </p>

        @if (session('error'))
            <div class="bg-red-200 text-red-600 p-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('verification.verify-code') }}" id="verificationForm">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="hidden" name="verification_code" id="verification_code">
            
            <div class="verification-code mb-6">
                <input type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" class="code-input">
                <input type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" class="code-input">
                <input type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" class="code-input">
                <input type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" class="code-input">
                <input type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" class="code-input">
                <input type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" class="code-input">
            </div>

            @error('verification_code')
                <div class="text-red-500 text-sm text-center mb-4">{{ $message }}</div>
            @enderror

            <div class="text-center">
                <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition-colors">
                    Verifikasi Email
                </button>
            </div>
        </form>

        <form action="{{ route('verification.resend') }}" method="POST" class="mt-6">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <button type="submit" class="w-full text-blue-500 hover:underline text-sm">
                Tidak menerima kode? Kirim ulang
            </button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.code-input');
            const form = document.getElementById('verificationForm');
            const verificationCode = document.getElementById('verification_code');

            // Auto focus first input
            inputs[0].focus();

            inputs.forEach((input, index) => {
                // Handle input
                input.addEventListener('input', function(e) {
                    if (e.target.value.length === 1) {
                        if (index < inputs.length - 1) {
                            inputs[index + 1].focus();
                        }
                    }
                });

                // Handle backspace
                input.addEventListener('keydown', function(e) {
                    if (e.key === 'Backspace' && !e.target.value && index > 0) {
                        inputs[index - 1].focus();
                    }
                });
            });

            // Handle form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const code = Array.from(inputs).map(input => input.value).join('');
                verificationCode.value = code;
                this.submit();
            });
        });
    </script>
</body>
</html>
