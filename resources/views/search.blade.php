@extends('layouts.app')

@section('title')
    {{ request()->input('search') }} | Buket_ku.id
@endsection

@section('content')
    <nav aria-label="Breadcrumb" class="flex items-center text-base px-20">
        <ol class="flex items-center">
            <li><a href="/" class="text-black text-opacity-60 hover:text-opacity-100">Home</a></li>
            <li class="mx-2"><i class="fas fa-chevron-right text-sm text-gray-600"></i></li>
            <li aria-current="page" class="text-violet-700 font-medium">Search Results</li>
        </ol>
    </nav>

    <div class="px-20 mt-5 max-md:px-5 flex flex-col min-w-full gap-8">
        <section class="min-w-full mx-auto">
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-bold mb-5">Search Results for "{{ request()->input('search') }}"</h2>
            </div>
            <!-- Gunakan Grid Layout untuk Produk -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 pb-4">
                @forelse ($results as $item)
                    <a href="{{ route('product.show', ['categoryName' => strtolower($item->category->name), 'slug' => $item->slug]) }}"
                        class="block">
                        <article class="flex flex-col gap-4">
                            <div class="bg-zinc-100 rounded-3xl overflow-hidden aspect-square">
                                <img src="{{ asset('storage/products/' . $item->image) }}" alt="{{ $item->name }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-xl font-bold">{{ $item->name }}</h3>
                                    <p class="text-2xl font-bold">{{ 'Rp ' . number_format($item->price, 0, ',', '.') }}</p>
                                </div>
                                <form class="flex items-center gap-4 pr-4" action="{{ route('cart.add', $item->id) }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="text-violet-900 font-bold text-2xl hover:text-violet-700 transition-colors ease-in duration-300">
                                        <i class="fas fa-cart-shopping"></i>
                                    </button>
                                </form>
                            </div>
                        </article>
                    </a>
                @empty
                    <div class="flex items-center justify-center col-span-full">
                        <h3 class="text-xl font-bold text-black">No products found</h3>
                    </div>
                @endforelse
            </div>
        </section>
    </div>
@endsection
