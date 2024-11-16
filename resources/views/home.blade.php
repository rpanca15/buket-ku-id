@vite('resources/css/app.css')
@include ('header')

<section class="flex overflow-hidden flex-col items-center bg-white">
  <main
    class="flex relative flex-col self-stretch px-0.5 pt-32 min-h-[663px] max-md:pt-24 max-md:max-w-full bg-gradient-to-t from-violet-300 to-white-100">
    <img loading="lazy" src="assets/Rectangle 2.png" alt="Background image"
      class="object-cover absolute inset-0 ml-auto h-full w-auto" />
    <div class="flex relative flex-col ml-24 max-w-full w-[602px]">
      <h1 class="text-6xl font-bold text-violet-900 leading-[64px] max-md:max-w-full max-md:text-4xl max-md:leading-10">
        Crafting Moments, One Stem at a Time
      </h1>
      <p class="mt-9 text-xl tracking-wider leading-6 text-black text-opacity-60 max-md:mr-1 max-md:max-w-full">
        Temukan buket bunga impian yang siap memperindah momen spesial kalian. Seluruh produk kami dapat dikustomisasi
        sesuai dengan keinganan kalian.
      </p>
    </div>
    <div class="flex relative shrink-0 mt-20 h-[251px] max-md:mt-10 max-md:max-w-full"></div>
  </main>

  <!-- Feature Section -->
<section class="mt-32 mx-auto px-4 max-w-[980px] max-md:mt-10">
  <div class="flex justify-center gap-44 max-md:flex-col max-md:items-center">
    <!-- Feature 1 - Cash On Delivery -->
    <a href="#" class="w-1/3 max-md:w-full group">
      <div class="flex flex-col items-center">
        <div
          class="flex items-center justify-center w-[199px] h-[199px] rounded-xl bg-zinc-100 hover:bg-violet-200 hover:scale-[1.2] transition-all duration-300">
          <img loading="lazy" src="assets/COD.png" alt="Cash On Delivery icon"
            class="object-contain w-[198px] h-[198px]" />
        </div>
        <h2 class="mt-4 text-2xl font-extrabold text-black/60 text-center transform group-hover:translate-y-6 transition-transform duration-300">
          Cash On Delivery
        </h2>
      </div>
    </a>

    <!-- Feature 2 - Pesanan Kilat -->
    <a href="#" class="w-1/3 max-md:w-full group">
      <div class="flex flex-col items-center">
        <div
          class="flex items-center justify-center w-[199px] h-[199px] rounded-xl bg-zinc-100 hover:bg-violet-200 hover:scale-[1.2] transition-all duration-300">
          <img loading="lazy" src="assets/kilat.png" alt="Pesanan Kilat icon"
            class="object-contain w-[198px] h-[198px]" />
        </div>
        <h2 class="mt-4 text-2xl font-extrabold text-black/60 text-center transform group-hover:translate-y-6 transition-transform duration-300">
          Pesanan Kilat
        </h2>
      </div>
    </a>

    <!-- Feature 3 - Gratis Ongkir -->
    <a href="#" class="w-1/3 max-md:w-full group">
      <div class="flex flex-col items-center">
        <div
          class="flex items-center justify-center w-[199px] h-[199px] rounded-xl bg-zinc-100 hover:bg-violet-200 hover:scale-[1.2] transition-all duration-300">
          <img loading="lazy" src="assets/gratis ongkir.png" alt="Gratis Ongkir icon"
            class="object-contain w-[198px] h-[198px]" />
        </div>
        <h2 class="mt-4 text-2xl font-extrabold text-black/60 text-center transform group-hover:translate-y-6 transition-transform duration-300">
          Gratis Ongkir
        </h2>
      </div>
    </a>
  </div>
</section>

  <!-- New Arrivals -->
  <section class="mt-60 w-full max-w-[1305px] max-md:mt-10 max-md:max-w-full">
      <h2 class="self-center text-5xl font-bold text-center text-violet-900 max-md:text-4xl -mb-10">NEW ARRIVALS</h2>
      <div class="flex gap-12 max-md:flex-col">
        
        <!-- Product Card 1 -->
        <a href="product-page-url-1" class="flex flex-col w-[24%] max-md:w-full">
          <div class="flex flex-col mt-32 w-full max-md:mt-10">
            <div class="flex flex-col pl-1.5">
              <div class="flex overflow-hidden flex-col items-center rounded-3xl aspect-square bg-zinc-100">
                <img loading="lazy" src="/assets/product_artficial/artificial_2.png" alt="Buket Kupu LED" class="object-contain w-full aspect-[0.99]" />
              </div>
              <h3 class="self-start mt-10 text-xl font-bold text-black">Buket Kupu LED</h3>
            </div>
            <p class="gap-2.5 self-start mt-10 text-2xl font-bold text-violet-900">Rp 45.000</p>
          </div>
        </a>
  
        <!-- Product Card 2 -->
        <a href="product-page-url-2" class="flex flex-col w-[24%] max-md:w-full">
          <div class="flex flex-col mt-32 w-full max-md:mt-10">
            <div class="flex flex-col pl-1.5">
              <div class="flex overflow-hidden flex-col items-center rounded-3xl aspect-square bg-zinc-100">
                <img loading="lazy" src="/assets/product_artficial/artificial_1.png" alt="Buket Bunga Artificial" class="object-contain w-full aspect-[0.99]" />
              </div>
              <h3 class="self-start mt-10 text-xl font-bold text-black">Buket Artificial Kawat</h3>
            </div>
            <p class="gap-2.5 self-start mt-10 text-2xl font-bold text-violet-900">Rp 50.000</p>
          </div>
        </a>
  
        <!-- Product Card 3 -->
        <a href="product-page-url-3" class="flex flex-col w-[24%] max-md:w-full">
          <div class="flex flex-col mt-32 w-full max-md:mt-10">
            <div class="flex flex-col pl-1.5">
              <div class="flex overflow-hidden flex-col items-center rounded-3xl aspect-square bg-zinc-100">
                <img loading="lazy" src="/assets/product_graduation/graduation_1.png" alt="Buket Boneka Wisuda" class="object-contain w-full aspect-[0.99]" />
              </div>
              <h3 class="self-start mt-10 text-xl font-bold text-black">Topper Boneka Wisuda + Artificial Flower</h3>
            </div>
            <p class="gap-2.5 self-start mt-10 text-2xl font-bold text-violet-900">Rp60.000</p>
          </div>
        </a>
  
        <!-- Product Card 4 -->
        <a href="product-page-url-4" class="flex flex-col w-[24%] max-md:w-full">
          <div class="flex flex-col mt-32 w-full max-md:mt-10">
            <div class="flex flex-col pl-1.5">
              <div class="flex overflow-hidden flex-col items-center rounded-3xl aspect-square bg-zinc-100">
                <img loading="lazy" src="/assets/product_graduation/graduation_3.jpg" alt="Buket Snack Topper Wisuda" class="object-contain w-full aspect-[0.99]" />
              </div>
              <h3 class="self-start mt-10 text-xl font-bold text-black">Topper Wisuda 2D + Artificial Flower</h3>
            </div>
            <p class="gap-2.5 self-start mt-10 text-2xl font-bold text-violet-900">Rp35.000</p>
          </div>
        </a>
      </div>
  
      <!-- Hidden New Product Cards -->
      <div id="additional-products" class="hidden mt-10">
        <div class="flex gap-12 max-md:flex-col">
          <!-- Product Card 5 -->
          <a href="product-page-url-5" class="flex flex-col w-[24%] max-md:w-full">
            <div class="flex flex-col mt-32 w-full max-md:mt-10">
              <div class="flex flex-col pl-1.5">
                <div class="flex overflow-hidden flex-col items-center rounded-3xl aspect-square bg-zinc-100">
                  <img loading="lazy" src="/assets/image 11.png" alt="Buket Bunga Baru" class="object-contain w-full aspect-[0.99]" />
                </div>
                <h3 class="self-start mt-10 text-xl font-bold text-black">Green Snack</h3>
              </div>
              <p class="gap-2.5 self-start mt-10 text-2xl font-bold text-violet-900">Rp 59.000</p>
            </div>
          </a>
  
          <!-- Product Card 6 -->
          <a href="product-page-url-6" class="flex flex-col w-[24%] max-md:w-full">
            <div class="flex flex-col mt-32 w-full max-md:mt-10">
              <div class="flex flex-col pl-1.5">
                <div class="flex overflow-hidden flex-col items-center rounded-3xl aspect-square bg-zinc-100">
                  <img loading="lazy" src="/assets/image 12.png" alt="Buket Kecil" class="object-contain w-full aspect-[0.99]" />
                </div>
                <h3 class="self-start mt-10 text-xl font-bold text-black">Bunga Kupu-kupu led</h3>
              </div>
              <p class="gap-2.5 self-start mt-10 text-2xl font-bold text-violet-900">Rp 45.000</p>
            </div>
          </a>
  
          <!-- Product Card 7 -->
          <a href="product-page-url-7" class="flex flex-col w-[24%] max-md:w-full">
            <div class="flex flex-col mt-32 w-full max-md:mt-10">
              <div class="flex flex-col pl-1.5">
                <div class="flex overflow-hidden flex-col items-center rounded-3xl aspect-square bg-zinc-100">
                  <img loading="lazy" src="/assets/image 13.png" alt="Buket Spesial" class="object-contain w-full aspect-[0.99]" />
                </div>
                <h3 class="self-start mt-10 text-xl font-bold text-black">Topper Boneka Wisuda + Snack</h3>
              </div>
              <p class="gap-2.5 self-start mt-10 text-2xl font-bold text-violet-900">Rp 83.000</p>
            </div>
          </a>
  
          <!-- Product Card 8 -->
          <a href="product-page-url-8" class="flex flex-col w-[24%] max-md:w-full">
            <div class="flex flex-col mt-32 w-full max-md:mt-10">
              <div class="flex flex-col pl-1.5">
                <div class="flex overflow-hidden flex-col items-center rounded-3xl aspect-square bg-zinc-100">
                  <img loading="lazy" src="/assets/image 14.png" alt="Buket Unik" class="object-contain w-full aspect-[0.99]" />
                </div>
                <h3 class="self-start mt-10 text-xl font-bold text-black">Pink Snack</h3>
              </div>
              <p class="gap-2.5 self-start mt-10 text-2xl font-bold text-violet-900">Rp 59.000</p>
            </div>
          </a>
        </div>
      </div>
  
      <div class="flex justify-center">
        <button id="view-all" class="gap-3 px-14 py-4 mt-16 text-lg font-extrabold text-violet-900 border-2 border-violet-900 border-solid rounded-[62px] w-[218px] max-md:px-5 max-md:mt-10 bg-white hover:bg-violet-900 hover:text-white transition-colors duration-300">
            View All
        </button>
    </div>
    </section>
  <hr
    class="shrink-0 mt-12 max-w-full h-px border border-solid border-black border-opacity-10 w-[1240px] max-md:mt-10" />
  <h2 class="mt-28 text-5xl font-bold text-center text-violet-900 max-md:mt-10 max-md:max-w-full max-md:text-4xl">
    BROWSE BY DREAM BOUQUET
  </h2>
  <section class="mt-12 w-full max-w-[989px] max-md:mt-10 max-md:max-w-full">
    <div class="flex gap-5 max-md:flex-col">
        <div class="flex flex-col max-md:ml-0 max-md:w-full">
            <div class="grow max-md:mt-10 max-md:max-w-full mx-auto">
                <div class="flex gap-24 max-md:flex-col mx-auto">
                    <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                        <div class="flex flex-col max-md:mt-6">
                            <a href="link-to-snack-product" class="flex flex-col items-center rounded-3xl aspect-square bg-white-100 hover:bg-violet-200 transition duration-200 ease-in-out">
                                <img loading="lazy" src="assets/kategori_snack.png" alt="Snack bouquet" class="object-contain w-full aspect-[0.99]" />
                                <h3 class="mt-11 text-xl font-bold text-black text-center">Snack</h3>
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                        <div class="flex flex-col max-md:mt-6">
                            <a href="link-to-graduation-product" class="flex flex-col items-center rounded-3xl aspect-square bg-white-100 hover:bg-violet-200 transition duration-200 ease-in-out">
                                <img loading="lazy" src="assets/kategori_grad.png" alt="Graduation bouquet" class="object-contain w-full aspect-[0.99] scale-[0.8] mt-4" />
                                <h3 class="mt-11 text-xl font-bold text-black text-center">Graduation</h3>
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                        <div class="flex flex-col max-md:mt-6">
                            <a href="link-to-artificial-product" class="flex flex-col items-center rounded-3xl aspect-square bg-white-100 hover:bg-violet-200 transition duration-200 ease-in-out">
                                <img loading="lazy" src="assets/kategori_artif.png" alt="Artificial bouquet" class="object-contain w-full aspect-[0.99] scale-[0.8]" />
                                <h3 class="mt-11 text-xl font-bold text-black text-center">Artificial</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  <h2 class="mt-60 text-5xl font-bold text-violet-900 max-md:mt-10 max-md:max-w-full max-md:text-4xl">
    OUR HAPPY CUSTOMERS
  </h2>
  <section class="mt-8 w-full max-w-[1233px] max-md:max-w-full">
    <div class="flex gap-5 max-md:flex-col">
      <article class="flex flex-col w-[33%] max-md:ml-0 max-md:w-full">
        <div
          class="flex overflow-hidden flex-wrap gap-6 items-start px-8 py-7 w-full rounded-3xl border border-solid border-black border-opacity-10 max-md:px-5 max-md:mt-3.5">
          <div class="flex flex-1 shrink justify-between items-start w-full basis-0 min-w-[240px]">
            <div class="flex flex-col flex-1 shrink w-full basis-0 min-w-[240px]">
              <div class="flex flex-col w-full">
                <div class="flex gap-1 items-center self-start text-xl font-bold leading-none text-black">
                  <h3 class="self-stretch my-auto">Alex K.</h3>
                  <span class="flex shrink-0 self-stretch my-auto w-6 h-6" aria-hidden="true"></span>
                </div>
                <p class="mt-3 text-base leading-6 text-black text-opacity-60">
                  "Finding clothes that align with my personal style used to be a challenge until I discovered Shop.co.
                  The range of options they offer is truly remarkable, catering to a variety of tastes and occasions."
                </p>
              </div>
            </div>
          </div>
        </div>
      </article>
      <article class="flex flex-col ml-5 w-[33%] max-md:ml-0 max-md:w-full">
        <div
          class="flex overflow-hidden flex-wrap gap-6 items-start px-8 pt-7 pb-14 w-full rounded-3xl border border-solid border-black border-opacity-10 min-h-[199px] max-md:px-5 max-md:mt-4">
          <div class="flex flex-1 shrink justify-between items-start w-full basis-0 min-w-[240px]">
            <div class="flex flex-col flex-1 shrink w-full basis-0 min-w-[240px]">
              <div class="flex flex-col w-full">
                <h3 class="gap-1 self-start text-xl font-bold leading-none text-black">Sarah M.</h3>
                <p class="mt-3 text-base leading-6 text-black text-opacity-60">
                  "I'm blown away by the quality and style of the clothes I received from Shop.co. From casual wear to
                  elegant dresses, every piece I've bought has exceeded my expectations."
                </p>
              </div>
            </div>
          </div>
        </div>
      </article>
      <article class="flex flex-col ml-5 w-[33%] max-md:ml-0 max-md:w-full">
        <div
          class="flex overflow-hidden flex-wrap gap-6 items-start px-8 py-7 mt-2.5 w-full rounded-3xl border border-solid border-black border-opacity-10 max-md:px-5 max-md:mt-6">
          <div class="flex flex-1 shrink justify-between items-start w-full basis-0 min-w-[240px]">
            <div class="flex flex-col flex-1 shrink w-full basis-0 min-w-[240px]">
              <div class="flex flex-col w-full">
                <h3 class="gap-1 self-start text-xl font-bold leading-none text-black">James L.</h3>
                <p class="mt-3 text-base leading-6 text-black text-opacity-60">
                  "As someone who's always on the lookout for unique fashion pieces, I'm thrilled to have stumbled upon
                  Shop.co. The selection of clothes is not only diverse but also on-point with the latest trends."
                </p>
              </div>
            </div>
          </div>
        </div>
      </article>
    </div>
  </section>
</section>
<script>
  document.getElementById('view-all').addEventListener('click', function() {
    const additionalProducts = document.getElementById('additional-products');
    if (additionalProducts.classList.contains('hidden')) {
        additionalProducts.classList.remove('hidden');
        this.textContent = 'View Less'; // Change button text
    } else {
        additionalProducts.classList.add('hidden');
        this.textContent = 'View All'; // Reset button text
    }
});
</script>
@include ('footer')