@vite('resources/css/app.css') <!-- Memuat CSS -->

<!-- Tambahkan CDN Font Awesome di bagian <head> atau sebelum penutup </body> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

@include('header') <!-- Menyertakan header -->

<section class="profile-user overflow-hidden bg-white rounded-xl shadow-[0px_3px_5px_rgba(255,203,0,0.25)] flex items-center justify-center min-h-screen">
    
    <main class="flex flex-col max-w-full w-[903px]">
      <section class="profile-header flex overflow-hidden flex-col pt-6 pr-20 pb-36 pl-5 font-medium text-white bg-violet-900 rounded-lg border border-white border-solid max-md:pr-5 max-md:pb-24 max-md:max-w-full">
        <h1 class="self-start text-base">MY PROFILE</h1>
        <p class="self-center mt-14 -mb-7 text-2xl text-center max-md:mt-10 max-md:mb-2.5">Welcome, Dhewi</p>
      </section>
      <section class="profile-details flex overflow-hidden z-10 flex-col px-11 pt-36 pb-12 mt-0 w-full rounded border-solid shadow-sm border-[0.722px] border-black border-opacity-10 max-md:px-5 max-md:pt-24 max-md:mr-0.5 max-md:max-w-full">
        <form>
          <div class="mb-4">
            <label for="name" class="block text-base text-black mb-2">Nama</label>
            <div class="flex flex-wrap gap-5 justify-between px-3 py-2.5 bg-purple-100 rounded-lg max-md:mr-1.5 max-md:max-w-full">
              <input type="text" id="name" value="Dhewi Rawles" class="text-base text-black bg-transparent border-none w-full" readonly />
            </div>
          </div>
          <div class="mb-4">
            <label for="username" class="block text-base text-black mb-2">Username</label>
            <input type="text" id="username" value="dhewiraw" class="px-3.5 py-3.5 text-base text-black whitespace-nowrap bg-purple-100 rounded-lg w-full max-md:pr-5 max-md:mr-1.5 max-md:max-w-full" readonly />
          </div>
          <div class="mb-4">
            <label for="email" class="block text-base text-black mb-2">Email</label>
            <input type="email" id="email" value="dhewirawles@gmail.com" class="px-3.5 py-3 text-base text-black whitespace-nowrap bg-purple-100 rounded-lg w-full max-md:pr-5 max-md:max-w-full" readonly />
          </div>
          <div class="mb-4">
            <label for="phone" class="block text-base text-black mb-2">No Telepon</label>
            <div class="flex flex-wrap gap-5 justify-between px-3.5 py-2.5 whitespace-nowrap bg-purple-100 rounded-lg max-md:max-w-full">
              <input type="tel" id="phone" value="08000011111" class="text-base text-black bg-transparent border-none w-full" readonly />
            </div>
          </div>
<div class="mb-4">
    <label for="password" class="block text-base text-black mb-2">Password</label>
    <div class="relative">
        <input type="password" id="password" value="Your First Name" class="px-3.5 py-3.5 text-base text-black bg-purple-100 rounded-lg w-full max-md:pr-5 max-md:max-w-full" readonly />
        <button type="button" id="toggle-password" class="absolute right-3 top-1/2 transform -translate-y-1/2">
            <i id="eye-icon" class="fas fa-eye-slash text-gray-600"></i> <!-- Awalnya mata tertutup -->
        </button>
    </div>
</div>
        </form>
      </section>
      <button class="overflow-hidden gap-3 self-end px-4 py-1.5 mt-5 text-sm font-bold text-white whitespace-nowrap bg-violet-900 min-h-[30px] rounded-[62px] max-md:mr-0.5">Back</button>
    </main>
  </section>
@include('footer') <!-- Menyertakan footer -->

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