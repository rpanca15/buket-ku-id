@extends('layouts.app')

@section('title')
    Graduation | Buket_ku.id
@endsection

@section('content')
    <nav aria-label="Breadcrumb" class="flex items-center text-base px-20">
        <ol class="flex items-center">
            <li><a href="/" class="text-black text-opacity-60 hover:text-opacity-100">Home</a></li>
            <li class="mx-2"><i class="fas fa-chevron-right text-sm text-gray-600"></i></li>
            <li><a href="{{ route('catalogs') }}" class="text-black text-opacity-60 hover:text-opacity-100">Catalog</a></li>
            <li class="mx-2"><i class="fas fa-chevron-right text-sm text-gray-600"></i></li>
            <li aria-current="page" class="text-violet-700 font-medium">Graduation</li>
        </ol>
    </nav>
    <main class="px-20 mt-5 max-md:px-5">
        <div class="flex flex-wrap justify-between items-end max-w-[1260px] mx-auto">
            <h1 class="text-3xl font-bold">Buket Graduation</h1>
        </div>

        <section class="mt-5 max-w-[1247px] mx-auto">
            <h2 class="sr-only">Product List</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                @forelse ($graduations as $item)
                    <a href="{{ route('product.show', ['categoryName' => strtolower($item->category->name), 'slug' => $item->slug]) }}"
                        class="block">
                        <article>
                            <div class="bg-zinc-100 rounded-3xl overflow-hidden aspect-square">
                                <img src="{{ asset('storage/products/' . $item->image) }}" alt="{{ $item->name }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <h3 class="mt-4 text-xl font-bold">{{ $item->name }}</h3>
                            <p class="mt-2 text-2xl font-bold">{{ 'Rp ' . number_format($item->price, 0, ',', '.') }}</p>
                        </article>
                    </a>
                @empty
                    <div>
                        <h3 class="self-start mt-10 text-xl font-bold text-black">Belum ada produk</h3>
                    </div>
                @endforelse
            </div>
        </section>
    </main>
@endsection
