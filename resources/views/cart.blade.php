@vite ('resources/css/app.css')

<section class="flex overflow-hidden flex-col bg-white">
  <header class="flex overflow-hidden flex-wrap gap-10 px-20 py-2.5 w-full text-sm font-bold text-white bg-violet-900 max-md:px-5 max-md:max-w-full">
    <p>
      <span>Sign up and get 20% off to your first order.</span>
      <a href="#" class="underline">Sign Up Now</a>
    </p>
    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/9aab5cb942bad6cfcfda0e2790b30ed35bbe5baad7c1570ff823db476adbf9cb?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 w-5 aspect-square" />
  </header>

  @include ('header')
  
  <main class="flex flex-col items-start self-end mt-24 mr-10 w-full max-w-[1301px] max-md:mt-10 max-md:mr-2.5 max-md:max-w-full">
    <hr class="shrink-0 max-w-full h-px border border-solid border-black border-opacity-10 w-[1240px]" />
    <nav class="flex gap-3 items-center mt-6 text-base whitespace-nowrap">
      <div class="flex gap-1 items-center self-stretch my-auto text-black text-opacity-60">
        <a href="#" class="self-stretch my-auto">Home</a>
        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/eebeda4cdd38c9af59edf93f5e7e4259c00d96aec7f85e5c632f7146841f829a?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 self-stretch my-auto w-4 aspect-square" />
      </div>
      <span class="self-stretch my-auto text-black">Cart</span>
    </nav>
    <div class="self-stretch mt-5 max-md:max-w-full">
      <div class="flex gap-5 max-md:flex-col">
        <section class="flex flex-col w-3/5 max-md:ml-0 max-md:w-full">
          <div class="flex flex-col grow font-bold text-black max-md:mt-10 max-md:max-w-full">
            <h1 class="self-start text-4xl">Your cart</h1>
            <div class="flex overflow-hidden flex-col px-6 py-5 mt-5 w-full rounded-3xl border border-solid border-black border-opacity-10 max-md:px-5 max-md:max-w-full">
              <article class="flex flex-wrap gap-4 items-center w-full max-md:max-w-full">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/89e5c9ab496596f70d82f047929331d9b8f610a341e5512e5b59f6d3f49319c6?apiKey=8d90719630234040b8c6e31cc1469133&" alt="Gradient Graphic T-shirt" class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-square w-[124px]" />
                <div class="flex flex-wrap flex-1 shrink gap-10 justify-between items-center self-stretch my-auto basis-0 min-w-[240px] max-md:max-w-full">
                  <div class="flex flex-col justify-between self-stretch my-auto min-h-[118px] min-w-[240px]">
                    <h2 class="text-xl">Gradient Graphic T-shirt</h2>
                    <p class="mt-14 text-2xl max-md:mt-10">$145</p>
                  </div>
                  <div class="flex flex-col justify-between items-end self-stretch my-auto text-sm whitespace-nowrap min-h-[124px] w-[225px]">
                    <button aria-label="Remove item" class="w-6 h-6">
                      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/240d83a678a51d7ab08c63d5ef3db69c794418755b11f1132ce4e7974054d36a?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain w-6 aspect-square" />
                    </button>
                    <div class="flex overflow-hidden gap-5 justify-center items-center px-5 py-3 mt-14 bg-zinc-100 rounded-[62px] max-md:mt-10">
                      <button aria-label="Decrease quantity" class="w-5 h-5">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/d42fc0826fc7fa5b08c5e7de6c44834a0aaeb917ebd63678188497ddf51709f0?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                      </button>
                      <span>1</span>
                      <button aria-label="Increase quantity" class="w-5 h-5">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/422baa05380082d9ae4983605703240cf0158a5a7c68500ed8106c80fae887e8?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                      </button>
                    </div>
                  </div>
                </div>
              </article>
              <hr class="mt-6 w-full min-h-0 border border-solid border-black border-opacity-10 max-md:max-w-full" />
              <article class="flex flex-wrap gap-4 items-center mt-6 w-full max-md:max-w-full">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/b7efff7e0d5effc18f3dfa6d244d4ca4b3d57b0e7338ec57db8158e577dc527a?apiKey=8d90719630234040b8c6e31cc1469133&" alt="Checkered Shirt" class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-square w-[124px]" />
                <div class="flex flex-wrap flex-1 shrink gap-10 justify-between items-center self-stretch my-auto basis-0 min-w-[240px] max-md:max-w-full">
                  <div class="flex flex-col justify-between self-stretch my-auto min-h-[118px]">
                    <h2 class="text-xl">Checkered Shirt</h2>
                    <p class="mt-14 text-2xl max-md:mt-10">$180</p>
                  </div>
                  <div class="flex flex-col justify-between items-end self-stretch my-auto text-sm whitespace-nowrap min-h-[124px] w-[225px]">
                    <button aria-label="Remove item" class="w-6 h-6">
                      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/b9018c68d484e9c375ec42fd0e63e77f15cb03e6a64572e207b4fca8f7e06f5f?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain w-6 aspect-square" />
                    </button>
                    <div class="flex overflow-hidden gap-5 justify-center items-center px-5 py-3 mt-14 bg-zinc-100 rounded-[62px] max-md:mt-10">
                      <button aria-label="Decrease quantity" class="w-5 h-5">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/5d5d1421596b2408e6e54fe0dca6e85987ec2c498b45f96ef7d5e81e0620fc32?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                      </button>
                      <span>1</span>
                      <button aria-label="Increase quantity" class="w-5 h-5">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/8d6ec801cc364db57a74b193b3becd41426ffaa376cad7525c86838caad12009?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                      </button>
                    </div>
                  </div>
                </div>
              </article>
              <hr class="mt-6 w-full min-h-0 border border-solid border-black border-opacity-10 max-md:max-w-full" />
              <article class="flex flex-wrap gap-4 items-center mt-6 w-full max-md:max-w-full">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/a827c0bc5e5dd12f04fbde78fee05c2c83f3847bb2d9fd6356b46ad7202d1380?apiKey=8d90719630234040b8c6e31cc1469133&" alt="Skinny Fit Jeans" class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-square w-[124px]" />
                <div class="flex flex-wrap flex-1 shrink gap-10 justify-between items-center self-stretch my-auto basis-0 min-w-[240px] max-md:max-w-full">
                  <div class="flex flex-col justify-between self-stretch my-auto min-h-[118px]">
                    <h2 class="text-xl">Skinny Fit Jeans</h2>
                    <p class="mt-14 text-2xl max-md:mt-10">$240</p>
                  </div>
                  <div class="flex flex-col justify-between items-end self-stretch my-auto text-sm whitespace-nowrap min-h-[124px] w-[225px]">
                    <button aria-label="Remove item" class="w-6 h-6">
                      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/326e43d2c9e61c08eb769bc8e4b43d9fd2cec57f78dd90a4e60d712c43d4adc5?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain w-6 aspect-square" />
                    </button>
                    <div class="flex overflow-hidden gap-5 justify-center items-center px-5 py-3 mt-14 bg-zinc-100 rounded-[62px] max-md:mt-10">
                      <button aria-label="Decrease quantity" class="w-5 h-5">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/006b21fda2ba63fc32db9fded5b4c389db8d4c580e767e73fe4dd1fd4aaad5b5?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                      </button>
                      <span>1</span>
                      <button aria-label="Increase quantity" class="w-5 h-5">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/4575ceb50dea473a7d2ac4a27b115bf66ff3cb9a70b67830d4da62339df9f87e?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                      </button>
                    </div>
                  </div>
                </div>
              </article>
            </div>
          </div>
        </section>
      <aside class="flex flex-col ml-5 w-2/5 max-md:ml-0 max-md:w-full">
        <div class="flex flex-col self-stretch my-auto w-full text-black max-md:mt-10 max-md:max-w-full">
          <div class="flex flex-col items-start pr-20 pl-3.5 w-full text-base max-md:pr-5 max-md:max-w-full">
            <h2 class="text-2xl font-bold">Rincian Pemesanan</h2>
            
            <!-- Dropdown Lokasi COD -->
            <div class="flex overflow-hidden gap-10 items-start px-4 py-3 mt-7 bg-zinc-100 rounded-[62px]">
              <label for="lokasi-cod" class="flex-grow">Pilih lokasi COD</label>
              <select id="lokasi-cod" class="bg-transparent border-none">
                <option value="">-- Pilih lokasi --</option>
                <option value="sman-8-surakarta">SMAN 8 Surakarta</option>
                <option value="taman-jaya-wijaya">Taman Jaya Wijaya</option>
                <option value="uns-kentingan">UNS Kentingan</option>
                <option value="b uket-ku-id">Ambil di alamat Buket_ku.id</option>
              </select>
            </div>

            <!-- Dropdown Metode Pembayaran -->
            <div class="flex overflow-hidden gap-10 items-start py-3 pr-4 pl-4 mt-6 bg-zinc-100 rounded-[62px]">
              <label for="metode-pembayaran" class="flex-grow">Pilih metode pembayaran</label>
              <select id="metode-pembayaran" class="bg-transparent border-none">
                <option value="">-- Pilih metode --</option>
                <option value="bayar-di-tempat">Bayar di tempat</option>
                <option value="shopeepay">Shopeepay</option>
              </select>
            </div>

            <!-- Pemilih Tanggal -->
            <div class="flex overflow-hidden gap-10 items-start py-3 pr-3 pl-4 mt-5 bg-zinc-100 rounded-[62px]">
              <label for="tanggal-cod" class="flex-grow">Pilih Tanggal COD</label>
              <input type="date" id="tanggal-cod" class="bg-transparent border-none" />
            </div>
          </div>
          <div class="flex flex-col mt-11 max-w-full h-1.5 whitespace-nowrap w-[457px] max-md:mt-10">
            <hr class="w-full min-h-0 border border-solid border-black border-opacity-10 max-md:max-w-full" />
            <div class="flex gap-10 justify-between items-center mt-5 w-full max-md:max-w-full">
              <p class="self-stretch my-auto text-xl">Total</p>
              <p class="self-stretch my-auto text-2xl font-bold text-right">Rp467</p>
            </div>
          </div>
          <button id="checkout-button" class="flex overflow-hidden gap-3 justify-center items-center self-end px-14 py-5 mt-28 text-base font-bold text-white bg-gray-300 min-h-[60px] rounded-[62px] cursor-not-allowed max-md:px-5 max-md:mt-10" disabled>
            <span class="self-stretch my-auto">Go to Checkout</span>
            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/098c260b1e0fecfc0c2096054a13bc7b9c042bb6c8270475abd926f71cc8c62b?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
          </button>
        </div>
      </aside>
    </div>
  </div>
</main>
@include ('footer')
</section>

<script>
const lokasiCod = document.getElementById('lokasi-cod');
const metodePembayaran = document.getElementById('metode-pembayaran');
const tanggalCod = document.getElementById('tanggal-cod');
const checkoutButton = document.getElementById('checkout-button');

function checkSelections() {
if (lokasiCod.value && metodePembayaran.value && tanggalCod.value) {
  checkoutButton.classList.remove('bg-gray-300', 'cursor-not-allowed');
  checkoutButton.classList.add('bg-violet-900');
  checkoutButton.disabled = false;
} else {
  checkoutButton.classList.add('bg-gray-300', 'cursor-not-allowed');
  checkoutButton.classList.remove('bg-violet-900');
  checkoutButton.disabled = true;
}
}

lokasiCod.addEventListener('change', checkSelections);
metodePembayaran.addEventListener('change', checkSelections);
tanggalCod.addEventListener('change', checkSelections);
</script>