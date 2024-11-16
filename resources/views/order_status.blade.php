@vite('resources/css/app.css')
@include ('header')
<section class="flex overflow-hidden flex-col pb-36 bg-white max-md:pb-24" aria-labelledby="order-status-heading">

    <nav aria-label="Breadcrumb" class="flex items-center text-base ml-2.5">
        <ol class="flex items-center">
            <li><a href="/" class="text-black text-opacity-60 hover:text-violet-700">Home</a></li>
            <li aria-hidden="true" class="mx-2">
                <img src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/e022f34536a1faf4527bf20407743f60c88ae03e0929af8760e5a1126cca6059?apiKey=8d90719630234040b8c6e31cc1469133&"
                    alt="" class="w-4 h-4">
            </li>
            <li aria-current="page" class="text-violet-700">Order</li>
        </ol>
    </nav>
    <h1 id="order-status-heading" class="self-start mt-2.5 ml-5 text-4xl font-bold text-black max-md:ml-2.5">Order Status</h1>
    <div class="flex flex-wrap gap-5 justify-between self-center mt-10 max-w-full text-2xl font-medium text-black w-[844px]" style="position: relative;">
      <p class="status-item cursor-pointer" style="display: inline-block; padding-bottom: 5px;">Status Pesanan</p>
      <p class="status-item cursor-pointer" style="display: inline-block; padding-bottom: 5px;">Selesai</p>
      <div class="underline-animation" style="position: absolute; height: 4px; background-color: black; bottom: 5px; left: 50%; transform: translateX(-50%); width: 50vw; transition: left 0.3s ease, width 0.3s ease;"></div>
    </div>
  </header>
    <!-- Bagian Bingkai order -->
  <main class="flex z-10 flex-col mt-12 ml-20 w-full max-w-[1154px] max-md:mt-10 max-md:max-w-full">
    <section aria-labelledby="order-summary-heading" class="mt-32 max-md:mt-10">
        
        <div class="flex justify-between items-start overflow-hidden text-xl rounded-3xl border border-violet-900 border-solid min-h-[660px] max-md:px-5 max-md:pb-24">
                <!-- Bagian Kiri -->
                <div class="flex flex-col px-6 pt-5 mt-0 pb-[514px] max-md:px-5">
                    <p class="mt-4 text-xl text-black">ID Order: SMA 8</p>
                    <p class="mt-4 text-xl text-black">Lokasi COD: SMA 8</p>
                    <p class="mt-4 text-xl text-black">Tanggal COD: 20 November 2024</p>
                    <p class="mt-4 text-xl text-black">Metode Bayar: COD</p>
                    <p class="mt-4 text-xl font-bold text-black">Total Harga: Rp46.000</p>
                    <section aria-label="Order Items" class="flex overflow-hidden z-10 flex-col px-6 pt-5 mt-0 w-full font-bold rounded-3xl border border-solid border-black border-opacity-0 h-[471px] max-md:px-5 max-md:mt-0 max-md:max-w-full">
                        <ul>
                          <li class="flex flex-wrap gap-4 items-center w-full max-md:max-w-full">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb" alt="Gradient Graphic T-shirt" class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-square w-[126px]" />
                            <div class="flex flex-wrap flex-1 shrink gap-10 justify-between items-center self-stretch my-auto basis-0 min-w-[240px] max-md:max-w-full">
                              <div class="flex flex-col justify-between self-stretch my-auto h-[120px] min-w-[240px]">
                                <h3 class="text-xl text-black">Gradient Graphic T-shirt</h3>
                                <p class="mt-14 text-2xl text-black max-md:mt-10">$145</p>
                              </div>
                            </div>
                          </li>
                          <li class="flex flex-wrap gap-4 items-center mt-6 w-full max-md:max-w-full">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/e3b6f0a27c55bec49e36da2c6bbc6010df8efdfca92f656b8dd2f29ab5eb0327?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb" alt="Checkered Shirt" class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-square w-[126px]" />
                            <div class="flex flex-wrap flex-1 shrink gap-10 justify-between items-center self-stretch my-auto basis-0 min-w-[240px] max-md:max-w-full">
                              <div class="flex flex-col justify-between self-stretch my-auto h-[120px]">
                                <h3 class="text-xl text-black">Checkered Shirt</h3>
                                <p class="mt-14 text-2xl text-black max-md:mt-10">$180</p>
                              </div>
                            </div>
                          </li>
                          <li class="flex flex-wrap gap-4 items-center mt-6 w-full max-md:max-w-full">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/2d4acf507fe9101538e5ed9950416103e4c071aeb9786d2ccd92315b9e7f199d?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb" alt="Skinny Fit Jeans" class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-square w-[126px]" />
                            <div class="flex flex-wrap flex-1 shrink gap-10 justify-between items-center self-stretch my-auto basis-0 min-w-[240px] max-md:max-w-full">
                              <div class="flex flex-col justify-between self-stretch my-auto h-[120px]">
                                <h3 class="text-xl text-black">Skinny Fit Jeans</h3>
                                <p class="mt-14 text-2xl text-black max-md:mt-10">$240</p>
                              </div>
                            </div>
                          </li>
                        </ul>
                        <hr class="mt-6 w-full min-h-0 border border-solid border-black border-opacity-10 max-md:max-w-full" />
                      </section>
                </div>
        
                <!-- Bagian Kanan -->
                <div class="flex flex-col items-end px-6 pt-5">
                    <p class="z-10 gap-2.5 self-end px-3 py-2 mt-0 text-base tracking-normal text-red-700 bg-red-100 min-h-[37px] rounded-[50px] max-w-fit">Belum Dibayar</p>
                    <p class="z-10 gap-2.5 self-end px-3 py-2 mt-4 text-base tracking-normal text-red-700 bg-red-100 rounded-md min-h-[37px] max-w-fit">Belum Diproses</p>
                </div>
      </div>
    </section>
    
    <section aria-labelledby="order-summary-heading" class="mt-32 max-md:mt-10">
        <div class="flex justify-between items-start overflow-hidden text-xl rounded-3xl border border-violet-900 border-solid min-h-[660px] max-md:px-5 max-md:pb-24">
                <!-- Bagian Kiri -->
                <div class="flex flex-col px-6 pt-5 mt-0 pb-[514px] max-md:px-5">
                    <p class="mt-4 text-xl text-black">ID Order: SMA 8</p>
                    <p class="mt-4 text-xl text-black">Lokasi COD: SMA 8</p>
                    <p class="mt-4 text-xl text-black">Tanggal COD: 20 November 2024</p>
                    <p class="mt-4 text-xl text-black">Metode Bayar: COD</p>
                    <p class="mt-4 text-xl font-bold text-black">Total Harga: Rp46.000</p>
                    <section aria-label="Order Items" class="flex overflow-hidden z-10 flex-col px-6 pt-5 mt-0 w-full font-bold rounded-3xl border border-solid border-black border-opacity-0 h-[471px] max-md:px-5 max-md:mt-0 max-md:max-w-full">
                        <ul>
                          <li class="flex flex-wrap gap-4 items-center w-full max-md:max-w-full">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb" alt="Gradient Graphic T-shirt" class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-square w-[126px]" />
                            <div class="flex flex-wrap flex-1 shrink gap-10 justify-between items-center self-stretch my-auto basis-0 min-w-[240px] max-md:max-w-full">
                              <div class="flex flex-col justify-between self-stretch my-auto h-[120px] min-w-[240px]">
                                <h3 class="text-xl text-black">Gradient Graphic T-shirt</h3>
                                <p class="mt-14 text-2xl text-black max-md:mt-10">$145</p>
                              </div>
                            </div>
                          </li>
                          <li class="flex flex-wrap gap-4 items-center mt-6 w-full max-md:max-w-full">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/e3b6f0a27c55bec49e36da2c6bbc6010df8efdfca92f656b8dd2f29ab5eb0327?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb" alt="Checkered Shirt" class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-square w-[126px]" />
                            <div class="flex flex-wrap flex-1 shrink gap-10 justify-between items-center self-stretch my-auto basis-0 min-w-[240px] max-md:max-w-full">
                              <div class="flex flex-col justify-between self-stretch my-auto h-[120px]">
                                <h3 class="text-xl text-black">Checkered Shirt</h3>
                                <p class="mt-14 text-2xl text-black max-md:mt-10">$180</p>
                              </div>
                            </div>
                          </li>
                          <li class="flex flex-wrap gap-4 items-center mt-6 w-full max-md:max-w-full">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/2d4acf507fe9101538e5ed9950416103e4c071aeb9786d2ccd92315b9e7f199d?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb" alt="Skinny Fit Jeans" class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-square w-[126px]" />
                            <div class="flex flex-wrap flex-1 shrink gap-10 justify-between items-center self-stretch my-auto basis-0 min-w-[240px] max-md:max-w-full">
                              <div class="flex flex-col justify-between self-stretch my-auto h-[120px]">
                                <h3 class="text-xl text-black">Skinny Fit Jeans</h3>
                                <p class="mt-14 text-2xl text-black max-md:mt-10">$240</p>
                              </div>
                            </div>
                          </li>
                        </ul>
                        <hr class="mt-6 w-full min-h-0 border border-solid border-black border-opacity-10 max-md:max-w-full" />
                      </section>
                </div>
        
                <!-- Bagian Kanan -->
                <div class="flex flex-col items-end px-6 pt-5">
                    <p class="z-10 gap-2.5 self-end px-3 py-2 mt-0 text-base tracking-normal text-red-700 bg-red-100 min-h-[37px] rounded-[50px] max-w-fit">Belum Dibayar</p>
                    <p class="z-10 gap-2.5 self-end px-3 py-2 mt-4 text-base tracking-normal text-orange-600 bg-yellow-200 rounded-md min-h-[37px] max-w-fit">Sedang Diproses</p>
                </div>
      </div>
    </section>
    
    <section aria-labelledby="order-summary-heading" class="mt-32 max-md:mt-10">
        <div class="flex justify-between items-start overflow-hidden text-xl rounded-3xl border border-violet-900 border-solid min-h-[660px] max-md:px-5 max-md:pb-24">
                <!-- Bagian Kiri -->
                <div class="flex flex-col px-6 pt-5 mt-0 pb-[514px] max-md:px-5">
                    <p class="mt-4 text-xl text-black">ID Order: SMA 8</p>
                    <p class="mt-4 text-xl text-black">Lokasi COD: SMA 8</p>
                    <p class="mt-4 text-xl text-black">Tanggal COD: 20 November 2024</p>
                    <p class="mt-4 text-xl text-black">Metode Bayar: COD</p>
                    <p class="mt-4 text-xl font-bold text-black">Total Harga: Rp46.000</p>
                    <section aria-label="Order Items" class="flex overflow-hidden z-10 flex-col px-6 pt-5 mt-0 w-full font-bold rounded-3xl border border-solid border-black border-opacity-0 h-[471px] max-md:px-5 max-md:mt-0 max-md:max-w-full">
                        <ul>
                          <li class="flex flex-wrap gap-4 items-center w-full max-md:max-w-full">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb" alt="Gradient Graphic T-shirt" class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-square w-[126px]" />
                            <div class="flex flex-wrap flex-1 shrink gap-10 justify-between items-center self-stretch my-auto basis-0 min-w-[240px] max-md:max-w-full">
                              <div class="flex flex-col justify-between self-stretch my-auto h-[120px] min-w-[240px]">
                                <h3 class="text-xl text-black">Gradient Graphic T-shirt</h3>
                                <p class="mt-14 text-2xl text-black max-md:mt-10">$145</p>
                              </div>
                            </div>
                          </li>
                          <li class="flex flex-wrap gap-4 items-center mt-6 w-full max-md:max-w-full">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/e3b6f0a27c55bec49e36da2c6bbc6010df8efdfca92f656b8dd2f29ab5eb0327?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb" alt="Checkered Shirt" class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-square w-[126px]" />
                            <div class="flex flex-wrap flex-1 shrink gap-10 justify-between items-center self-stretch my-auto basis-0 min-w-[240px] max-md:max-w-full">
                              <div class="flex flex-col justify-between self-stretch my-auto h-[120px]">
                                <h3 class="text-xl text-black">Checkered Shirt</h3>
                                <p class="mt-14 text-2xl text-black max-md:mt-10">$180</p>
                              </div>
                            </div>
                          </li>
                          <li class="flex flex-wrap gap-4 items-center mt-6 w-full max-md:max-w-full">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/2d4acf507fe9101538e5ed9950416103e4c071aeb9786d2ccd92315b9e7f199d?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb" alt="Skinny Fit Jeans" class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-square w-[126px]" />
                            <div class="flex flex-wrap flex-1 shrink gap-10 justify-between items-center self-stretch my-auto basis-0 min-w-[240px] max-md:max-w-full">
                              <div class="flex flex-col justify-between self-stretch my-auto h-[120px]">
                                <h3 class="text-xl text-black">Skinny Fit Jeans</h3>
                                <p class="mt-14 text-2xl text-black max-md:mt-10">$240</p>
                              </div>
                            </div>
                          </li>
                        </ul>
                        <hr class="mt-6 w-full min-h-0 border border-solid border-black border-opacity-10 max-md:max-w-full" />
                      </section>
                </div>
        
                <!-- Bagian Kanan -->
                <div class="flex flex-col items-end px-6 pt-5">
                    <p class="z-10 gap-2.5 self-end px-3 py-2 mt-0 text-base tracking-normal text-green-700 bg-green-100 min-h-[37px] rounded-[50px] max-w-fit">Sudah Dibayar</p>
                    <p class="z-10 gap-2.5 self-end px-3 py-2 mt-4 text-base tracking-normal text-green-700 bg-green-100 rounded-md min-h-[37px] max-w-fit">Pesanan Siap</p>
                </div>
      </div>
    </section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusItems = document.querySelectorAll('.status-item');
        const underline = document.querySelector('.underline-animation');

        // Set posisi awal garis bawah
        underline.style.left = `calc(${statusItems[0].offsetLeft + statusItems[0].offsetWidth / 2}px)`;

        statusItems.forEach(item => {
            item.addEventListener('click', function() {
                underline.style.left = `calc(${item.offsetLeft + item.offsetWidth / 2}px)`;
            });
        });
    });
</script>

  @include ('footer')