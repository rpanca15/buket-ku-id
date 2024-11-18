@extends('layouts.app')

@section('title')
    Catalog | Buket_ku.id
@endsection

@section('content')
    <nav aria-label="Breadcrumb" class="flex items-center text-base px-20">
        <ol class="flex items-center">
            <li><a href="/" class="text-black text-opacity-60 hover:text-opacity-100">Home</a></li>
            <li class="mx-2"><i class="fas fa-chevron-right text-sm text-gray-600"></i></li>
            <li aria-current="page" class="text-violet-700 font-medium">Catalog</li>
        </ol>
    </nav>

    <div class="px-20 mt-5 max-md:px-5 flex flex-col min-w-full gap-8">
        <section class="min-w-full mx-auto">
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-bold mb-5">Buket Artificial</h2>
                @if ($artificials !== 'null')
                    <a href="{{ route('catalogs.artificial') }}" class="text-violet-800 hover:underline group transition ease-in duration-300">View all <i
                            class="fas fa-chevron-right text-sm group-hover:text-xl"></i></a>
                @endif
            </div>
            <div class="flex gap-5 pb-4 scroll-smooth overflow-x-scroll custom-scrollbar">
                @forelse ($artificials as $item)
                    <a href="#"
                        class="block flex-none w-[calc(25%-1.25rem)] md:w-[calc(50%-1.25rem)] lg:w-[calc(25%-1.25rem)]">
                        <article class="flex flex-col gap-4">
                            <div class="bg-zinc-100 rounded-3xl overflow-hidden aspect-square">
                                <img src="{{ asset('storage/products/' . $item->image) }}" alt="{{ $item->name }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-xl font-bold">{{ $item->name }}</h3>
                            <p class="text-2xl font-bold">{{ 'Rp ' . number_format($item->price, 0, ',', '.') }}</p>
                        </article>
                    </a>
                @empty
                    <div class="flex items-center justify-center">
                        <h3 class="text-xl font-bold text-black">Belum ada produk</h3>
                    </div>
                @endforelse
            </div>
        </section>
        <section class="min-w-full mx-auto">
            <h2 class="text-3xl font-bold mb-5">Buket Wisuda</h2>
            <div class="flex gap-5 pb-4 scroll-smooth overflow-x-scroll custom-scrollbar">
                @forelse ($graduations as $item)
                    <a href="#"
                        class="block flex-none w-[calc(25%-1.25rem)] md:w-[calc(50%-1.25rem)] lg:w-[calc(25%-1.25rem)]">
                        <article class="flex flex-col gap-4">
                            <div class="bg-zinc-100 rounded-3xl overflow-hidden aspect-square">
                                <img src="{{ asset('storage/products/' . $item->image) }}" alt="{{ $item->name }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-xl font-bold">{{ $item->name }}</h3>
                            <p class="text-2xl font-bold">{{ 'Rp ' . number_format($item->price, 0, ',', '.') }}</p>
                        </article>
                    </a>
                @empty
                    <div class="flex items-center justify-center">
                        <h3 class="text-xl font-bold text-black">Belum ada produk</h3>
                    </div>
                @endforelse
            </div>
        </section>
        <section class="min-w-full mx-auto">
            <h2 class="text-3xl font-bold mb-5">Buket Snack</h2>
            <div class="flex gap-5 pb-4 scroll-smooth overflow-x-scroll custom-scrollbar">
                @forelse ($snacks as $item)
                    <a href="#"
                        class="block flex-none w-[calc(25%-1.25rem)] md:w-[calc(50%-1.25rem)] lg:w-[calc(25%-1.25rem)]">
                        <article class="flex flex-col gap-4">
                            <div class="bg-zinc-100 rounded-3xl overflow-hidden aspect-square">
                                <img src="{{ asset('storage/products/' . $item->image) }}" alt="{{ $item->name }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-xl font-bold">{{ $item->name }}</h3>
                            <p class="text-2xl font-bold">{{ 'Rp ' . number_format($item->price, 0, ',', '.') }}</p>
                        </article>
                    </a>
                @empty
                    <div class="flex items-center justify-center">
                        <h3 class="text-xl font-bold text-black">Belum ada produk</h3>
                    </div>
                @endforelse
            </div>
        </section>
    </div>
@endsection
