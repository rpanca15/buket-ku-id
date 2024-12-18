@extends('layouts.app')

@section('title')
    Home | Buket_ku.id
@endsection

@section('content')
    <section class="flex overflow-hidden flex-col items-center bg-white">
        <main class="flex relative flex-col self-stretch px-0.5 pt-32 min-h-[663px] max-md:pt-24 max-md:max-w-full bg-gradient-to-t from-violet-300 to-white-100">
            <img loading="lazy" src="{{ asset('assets/images/Rectangle 2.png') }}" alt="Background image" class="object-cover absolute inset-0 ml-auto h-full w-auto" />
            <div class="flex relative flex-col ml-24 max-w-full w-[602px]">
                <h1 class="text-6xl font-bold text-violet-900 leading-[64px] max-md:max-w-full max-md:text-4xl max-md:leading-10">
                    Crafting Moments, One Stem at a Time
                </h1>
                <p class="mt-9 text-xl tracking-wider leading-6 text-black text-opacity-60 max-md:mr-1 max-md:max-w-full">
                    Temukan buket bunga impian yang siap memperindah momen spesial kalian. Seluruh produk kami dapat dikustomisasi sesuai dengan keinganan kalian.
                </p>
            </div>
        </main>

        <!-- Feature Section -->
        <section class="mt-32 mx-auto px-4 max-w-[980px] max-md:mt-10">
            <div class="flex justify-center gap-44 max-md:flex-col max-md:items-center">
                @foreach([
                    ['title' => 'Cash On Delivery', 'img' => 'COD.png'],
                    ['title' => 'Pesanan Kilat', 'img' => 'kilat.png'],
                    ['title' => 'Gratis Ongkir', 'img' => 'gratis ongkir.png']
                ] as $feature)
                    <a href="#" class="w-1/3 max-md:w-full group">
                        <div class="flex flex-col items-center">
                            <div class="flex items-center justify-center w-[199px] h-[199px] rounded-xl bg-zinc-100 hover:bg-violet-200 hover:scale-[1.2] transition-all duration-300">
                                <img loading="lazy" src="{{ asset('assets/images/'.$feature['img']) }}" alt="{{ $feature['title'] }} icon" class="object-contain w-[198px] h-[198px]" />
                            </div>
                            <h2 class="mt-4 text-2xl font-extrabold text-black/60 text-center transform group-hover:translate-y-6 transition-transform duration-300">
                                {{ $feature['title'] }}
                            </h2>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- New Arrivals -->
        <section class="mt-60 w-full px-10 max-md:mt-10 max-md:max-w-full">
            <h2 class="self-center text-5xl font-bold text-center text-violet-900 max-md:text-4xl -mb-10">NEW ARRIVALS</h2>
            <div class="flex gap-12 max-md:flex-col">
                @foreach([
                    ['title' => 'Buket Kupu LED', 'img' => 'image 10.png', 'price' => 'Rp 50.000'],
                    ['title' => 'Buket Bunga Artificial', 'img' => 'image 7 (3).png', 'price' => 'Rp 50.000'],
                    ['title' => 'Buket Boneka Wisuda', 'img' => 'image 8 (1).png', 'price' => 'Rp 50.000'],
                    ['title' => 'Buket Snack Topper Wisuda', 'img' => 'image 9.png', 'price' => 'Rp 50.000']
                ] as $arrival)
                    <div class="flex flex-col w-[24%] max-md:ml-0 max-md:w-full">
                        <div class="flex flex-col mt-32 items-center justify-center w-full max-md:mt-10">
                            <div class="flex flex-col">
                                <div class="flex overflow-hidden flex-col items-center rounded-3xl aspect-square bg-zinc-100">
                                    <img loading="lazy" src="{{ asset('assets/images/'.$arrival['img']) }}" alt="{{ $arrival['title'] }}" class="object-contain w-full aspect-[0.99]" />
                                </div>
                                <h3 class="self-start mt-10 text-xl font-bold text-black">{{ $arrival['title'] }}</h3>
                            </div>
                            <p class="self-start mt-10 text-2xl font-bold text-violet-900">{{ $arrival['price'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-center">
                <button class="gap-3 px-14 py-4 mt-16 text-lg font-extrabold text-violet-900 border-2 border-violet-900 border-solid rounded-[62px] w-[218px] max-md:px-5 max-md:mt-10">
                    View All
                </button>
            </div>
        </section>

        <hr class="shrink-0 mt-12 max-w-full h-px border border-solid border-black border-opacity-10 w-[1240px] max-md:mt-10" />

        <!-- Browse by Dream Bouquet -->
        <h2 class="mt-28 text-5xl font-bold text-center text-violet-900 max-md:mt-10 max-md:max-w-full max-md:text-4xl">BROWSE BY DREAM BOUQUET</h2>
        <section class="mt-12 w-full max-w-[989px] max-md:mt-10 max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col">
                @foreach([
                    ['title' => 'Snack', 'img' => 'image 7.png'],
                    ['title' => 'Graduation', 'img' => 'image 8.png'],
                    ['title' => 'Artificial', 'img' => 'image 9 (1).png']
                ] as $bouquet)
                    <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                        <div class="flex flex-col max-md:mt-6">
                            <div class="flex overflow-hidden flex-col items-center rounded-3xl aspect-square bg-white-100">
                                <img loading="lazy" src="{{ asset('assets/images/'.$bouquet['img']) }}" alt="{{ $bouquet['title'] }} bouquet" class="object-contain w-full aspect-[0.99]" />
                            </div>
                            <h3 class="self-center mt-11 text-xl font-bold text-black max-md:mt-10 text-center mx-auto">{{ $bouquet['title'] }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Customer Testimonials -->
        <h2 class="mt-60 text-5xl font-bold text-violet-900 max-md:mt-10 max-md:max-w-full max-md:text-4xl">OUR HAPPY CUSTOMERS</h2>
        <section class="mt-8 w-full max-w-[1233px] max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col">
                @foreach([
                    ['name' => 'Alex K.', 'testimonial' => '"Finding clothes that align with my personal style used to be a challenge..."'],
                    ['name' => 'Sarah M.', 'testimonial' => '"I\'m blown away by the quality and style of the clothes I received..."'],
                    ['name' => 'James L.', 'testimonial' => '"As someone who\'s always on the lookout for unique fashion pieces..."']
                ] as $customer)
                    <article class="flex flex-col w-[33%] max-md:ml-0 max-md:w-full">
                        <div class="flex overflow-hidden flex-wrap gap-6 items-start px-8 py-7 w-full rounded-3xl border border-solid border-black border-opacity-10 max-md:px-5 max-md:mt-3.5">
                            <div class="flex flex-1 shrink justify-between items-start w-full basis-0 min-w-[240px]">
                                <div class="flex flex-col flex-1 shrink w-full basis-0 min-w-[240px]">
                                    <div class="flex flex-col w-full">
                                        <div class="flex gap-1 items-center self-start text-xl font-bold leading-none text-black">
                                            <h3 class="self-stretch my-auto">{{ $customer['name'] }}</h3>
                                        </div>
                                        <p class="mt-3 text-base leading-6 text-black text-opacity-60">
                                            {{ $customer['testimonial'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </section>
@endsection
