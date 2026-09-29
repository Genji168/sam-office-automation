@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10 space-y-10">
    <!-- Header with Back Button -->
    <div class="flex items-center justify-between border-b border-gray-800 pb-4">
        <div>
            <h1 class="text-3xl font-black text-white uppercase tracking-wide">Canon Copier Models</h1>
            <p class="text-xs text-gray-400">All available monochrome and full-color models</p>
        </div>
        <a href="{{ route('products.index') }}" class="text-xs font-bold uppercase text-gray-400 hover:text-white transition">
            &larr; Back to Brands
        </a>
    </div>

    <!-- Black & White Models -->
    <div>
        <h2 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
            <span class="w-3 h-3 bg-zinc-400 rounded-full inline-block"></span>
            Black &amp; White Models (Monochrome)
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @forelse($bwProducts as $product)
                <div class="bg-[#161b22] border border-gray-800 rounded-lg p-4 flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-bold text-white">{{ $product->name }}</h3>
                        <p class="text-xs text-gray-400">{{ $product->features }}</p>
                        <span class="text-sm font-black text-indigo-400 mt-2 block">{{ number_format($product->price, 2) }} {{ $product->currency_symbol }}</span>
                    </div>
                    <a href="{{ route('products.show', $product->id) }}" class="px-3 py-1.5 bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-bold rounded">
                        Details
                    </a>
                </div>
            @empty
                <p class="text-xs text-gray-500 italic">No monochrome models available.</p>
            @endforelse
        </div>
    </div>

    <!-- Color & Black/White Models -->
    <div>
        <h2 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
            <span class="w-3 h-3 bg-red-500 rounded-full inline-block"></span>
            Color &amp; Black/White Models
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @forelse($colorProducts as $product)
                <div class="bg-[#161b22] border border-gray-800 rounded-lg p-4 flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-bold text-white">{{ $product->name }}</h3>
                        <p class="text-xs text-gray-400">{{ $product->features }}</p>
                        <span class="text-sm font-black text-indigo-400 mt-2 block">{{ number_format($product->price, 2) }} {{ $product->currency_symbol }}</span>
                    </div>
                    <a href="{{ route('products.show', $product->id) }}" class="px-3 py-1.5 bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-bold rounded">
                        Details
                    </a>
                </div>
            @empty
                <p class="text-xs text-gray-500 italic">No color models available.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection