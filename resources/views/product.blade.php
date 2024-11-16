@vite('resources/css/app.css')

<header class="flex overflow-hidden flex-col bg-white">
  <div class="flex overflow-hidden flex-wrap gap-10 px-20 py-2.5 w-full text-sm font-bold text-white bg-violet-900 max-md:px-5 max-md:max-w-full">
    <p>
      <span>Sign up and get 20% off to your first order.</span>
      <a href="#" class="underline">Sign Up Now</a>
    </p>
    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/a52b63876fff4beeb0c2bf382f13b3762f7a73b95fda56ba4f1b446869812aa0?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 w-5 aspect-square" />
  </div>
  <div class="flex flex-col self-center mt-5 w-full max-w-[1240px] max-md:max-w-full">
    <nav class="flex flex-wrap gap-10 justify-center items-center w-full h-[59px] max-md:max-w-full">
      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/bc0ea5168d1f6aab677fc4c15cd6a9b43d956e20ea472b3fe9664df57ff219a4?apiKey=8d90719630234040b8c6e31cc1469133&" alt="Company Logo" class="object-contain shrink-0 self-stretch my-auto aspect-[1.9] w-[133px]" />
      <ul class="flex gap-6 items-center self-stretch my-auto text-base text-black min-w-[240px] max-md:max-w-full">
        <li class="gap-1 self-stretch my-auto text-violet-900 whitespace-nowrap">
          <a href="#">Home</a>
        </li>
        <li class="flex self-stretch px-0.5 my-auto whitespace-nowrap w-[70px]">
          <a href="#" class="grow max-md:-mr-0.5">Catalog</a>
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/8332062a9174e0561f321511f7ccfa803f1e66b65e91e02cc3a671ccf48f5807?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 my-auto w-4 aspect-square" />
        </li>
        <li class="self-stretch my-auto"><a href="#">Order</a></li>
        <li class="self-stretch my-auto"><a href="#">Order Custom</a></li>
        <li class="self-stretch my-auto"><a href="#">Dashboard</a></li>
      </ul>
      <form class="flex overflow-hidden flex-wrap grow shrink gap-3 items-start self-stretch px-4 py-3 my-auto text-base bg-violet-50 min-w-[240px] rounded-[62px] text-black text-opacity-40 w-[485px] max-md:max-w-full">
        <label for="search" class="sr-only">Search for products</label>
        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/2320f727ad31200fafa23e0d3acad9019f275d04413737c93dfdb8cb7c2cd19f?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 w-6 aspect-square" />
        <input type="search" id="search" placeholder="Search for products..." class="bg-transparent border-none outline-none flex-grow" />
      </form>
      <div class="flex gap-3.5 items-start self-stretch my-auto">
        <button aria-label="User profile" class="focus:outline-none focus:ring-2 focus:ring-violet-900">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/3d90f78b2d31ca420ec46352bd5d2018f7d8445bc53c5200a8d1bc9ae7d715a1?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 w-6 aspect-square" />
        </button>
        <button aria-label="Shopping cart" class="focus:outline-none focus:ring-2 focus:ring-violet-900">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/03b9cf6c2f4e03109a86d56bac6905fe545cb34d28c3d247606762ed08df7000?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 w-6 aspect-square" />
        </button>
      </div>
    </nav>
    <hr class="shrink-0 mt-4 h-px border border-solid border-black border-opacity-10 max-md:max-w-full" />
    <nav aria-label="Breadcrumb" class="flex gap-2.5 mt-6 max-w-full text-base w-[391px]">
      <ol class="flex flex-auto gap-3 items-center text-black text-opacity-60">
        <li class="flex gap-1 items-center self-stretch my-auto whitespace-nowrap">
          <a href="#" class="self-stretch my-auto">Home</a>
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/e022f34536a1faf4527bf20407743f60c88ae03e0929af8760e5a1126cca6059?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 self-stretch my-auto w-4 aspect-square" />
        </li>
        <li class="flex gap-1 items-center self-stretch my-auto whitespace-nowrap">
          <a href="#" class="self-stretch my-auto">Catalog</a>
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/e022f34536a1faf4527bf20407743f60c88ae03e0929af8760e5a1126cca6059?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 self-stretch my-auto w-4 aspect-square" />
        </li>
        <li class="flex gap-1 items-center self-stretch my-auto">
          <a href="#" class="self-stretch my-auto">Buket Snack</a>
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/e022f34536a1faf4527bf20407743f60c88ae03e0929af8760e5a1126cca6059?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 self-stretch my-auto w-4 aspect-square" />
        </li>
      </ol>
      <span class="grow shrink my-auto text-violet-700 w-[84px]">Buket Snack 1</span>
    </nav>
    <main class="self-end mt-9 w-full max-w-[1185px] max-md:max-w-full">
      <div class="flex gap-5 max-md:flex-col">
        <section class="flex flex-col w-[44%] max-md:ml-0 max-md:w-full">
          <div class="flex relative flex-col grow items-start px-20 pt-28 pb-96 rounded-3xl min-h-[543px] max-md:px-5 max-md:py-24 max-md:mt-10 max-md:max-w-full">
            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/65293413289e73de6aa4227383d7037ab0376b6e4b4795f1d69c5d0849ec8650?apiKey=8d90719630234040b8c6e31cc1469133&" alt="Buket Snack product image" class="object-cover absolute inset-0 size-full" />
            <div class="flex relative shrink-0 bg-yellow-500 rounded-full h-[37px] w-[37px]"></div>
          </div>
        </section>
        <section class="flex flex-col ml-5 w-[56%] max-md:ml-0 max-md:w-full">
          <div class="flex flex-col w-full max-md:mt-10 max-md:max-w-full">
            <div class="flex flex-col items-start pr-16 pl-2 w-full font-bold max-md:pr-5 max-md:max-w-full">
              <h1 class="text-4xl text-black">Buket Snack</h1>
              <p class="gap-3 mt-12 text-3xl text-violet-900 max-md:mt-10">Rp 50.000</p>
              <p class="mt-14 text-xl leading-6 text-black text-opacity-60 max-md:mt-10 max-md:max-w-full">
                Buket snack dengan beragam variasi warna senada yang menciptakan keindahan tersendiri untuk menemani hari sepesial kalian.
              </p>
            </div>
            <hr class="shrink-0 mt-9 max-w-full h-px border border-solid border-black border-opacity-10 w-[590px] max-md:mr-2" />
            <hr class="shrink-0 mt-32 max-w-full h-px border border-solid border-black border-opacity-10 w-[590px] max-md:mt-10" />
            <form class="flex flex-wrap gap-5 mt-16 w-full text-base max-md:mt-10 max-md:max-w-full">
              <div class="flex overflow-hidden gap-9 justify-between items-center px-5 py-3.5 font-bold text-black whitespace-nowrap bg-zinc-100 min-h-[52px] rounded-[62px]">
                <button type="button" aria-label="Decrease quantity" class="focus:outline-none focus:ring-2 focus:ring-violet-900">
                  <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/f816b3f3b4b506cfde19d60073eed60877d22c7978b2c01279fe82781912a0fa?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                </button>
                <span id="quantity" aria-live="polite">1</span>
                <button type="button" aria-label="Increase quantity" class="focus:outline-none focus:ring-2 focus:ring-violet-900">
                  <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/d306eb0589117495a00e989220af8bf4f87f3537301924ffb59bd1ee7d426e80?apiKey=8d90719630234040b8c6e31cc1469133&" alt="" class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                </button>
              </div>
              <button type="submit" class="overflow-hidden flex-auto gap-3 self-stretch px-14 py-4 font-extrabold text-white bg-violet-900 min-h-[52px] rounded-[62px] max-md:px-5 focus:outline-none focus:ring-2 focus:ring-violet-700">
                Add to Cart
              </button>
            </form>
          </div>
        </section>
      </div>
    </main>
    <h2 class="self-center mt-40 text-4xl font-semibold text-black max-md:mt-10">Aturan Pemesanan</h2>
  </div>
  <hr class="shrink-0 self-center mt-28 max-w-full h-px border border-solid border-black border-opacity-10 w-[1240px] max-md:mt-10" />
  <footer class="flex flex-col items-center px-20 py-8 w-full bg-zinc-100 mt-[1351px] max-md:px-5 max-md:mt-10 max-md:max-w-full">
    <div class="self-start max-md:max-w-full">
      <div class="flex gap-5 max-md:flex-col">
        <div class="flex flex-col w-[41%] max-md:ml-0 max-md:w-full">
          <div class="flex flex-col w-full max-md:mt-10 max-md:max-w-full">
            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/44ef5edf8b785f037e273dbd106765cf405635d2eb29e96290977ed00635cee0?apiKey=8d90719630234040b8c6e31cc1469133&" alt="Company Logo" class="object-contain w-96 max-w-full aspect-[2.44]" />
            <div class="flex flex-wrap gap-10 justify-between items-start mt-8 max-md:max-w-full">
              <div class="flex flex-col min-w-[240px] w-[280px]">
                <div class="flex flex-col max-w-full w-[280px]">
                  <h2 class="text-4xl font-bold text-violet-900">Buket_ku.id</h2>
                  <p class="mt-6 text-base font-semibold tracking-wider leading-6 text-black text-opacity-60">
                    Temukan buket bunga impian yang siap memperindah momen spesial kalian. Seluruh produk kami dapat dikustomisasi sesuai dengan keinganan kalian.
                  </p>
                </div>
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/47560d68edbdd82d8b994e3ddf1e2144a4570eb44138df6c2d12cf033c35a62d?apiKey=8d90719630234040b8c6e31cc1469133&" alt="Social Media Icons" class="object-contain mt-9 max-w-full aspect-[3.86] w-[108px]" />
              </div>
              <nav class="text-base font-bold leading-5 text-black text-opacity-60">
                <ul>
                  <li><a href="#" class="hover:text-violet-900 focus:outline-none focus:ring-2 focus:ring-violet-900">Home</a></li>
                  <li><a href="#" class="hover:text-violet-900 focus:outline-none focus:ring-2 focus:ring-violet-900">Catalog</a></li>
                  <li><a href="#" class="hover:text-violet-900 focus:outline-none focus:ring-2 focus:ring-violet-900">Order</a></li>
                  <li><a href="#" class="hover:text-violet-900 focus:outline-none focus:ring-2 focus:ring-violet-900">Custom Order</a></li>
                  <li><a href="#" class="hover:text-violet-900 focus:outline-none focus:ring-2 focus:ring-violet-900">Dashboard</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="flex flex-col ml-5 w-[59%] max-md:ml-0 max-md:w-full">
          <div class="flex flex-col pt-2.5 mt-4 w-full max-md:mt-10 max-md:max-w-full">
            <h3 class="z-10 self-start mt-2.5 ml-20 text-2xl font-bold leading-none text-violet-900 max-md:ml-2.5">Our Location</h3>
            <div class="flex overflow-hidden justify-between items-center px-7 py-14 mt-0 rounded-3xl bg-zinc-300 min-h-[474px] max-md:px-5">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/1129c489c35e5c403b6a72a63e48bc99b1f3ee37047eed9ac7592c022dbef70c?apiKey=8d90719630234040b8c6e31cc1469133&" alt="Map showing our location" class="object-contain self-stretch my-auto aspect-[1.77] min-w-[240px] w-[651px]" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr class="shrink-0 mt-7 max-w-full h-px border border-solid border-black border-opacity-10 w-[1240px]" />
    <p class="mt-7 ml-6 text-sm text-right text-black text-opacity-60">Shop.co © 2000-2023, All Rights Reserved</p>
  </footer>
</header>