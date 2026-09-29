<!DOCTYPE html>
<html lang="en" class="h-full bg-black">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} | SAM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-[#0b0c0e] text-white min-h-screen font-sans flex antialiased">

    <!-- Sidebar Navigation -->
    <aside class="w-64 bg-[#111317] border-r border-zinc-800 p-6 flex flex-col justify-between hidden md:flex min-h-screen">
        <div>
            <a href="{{ url('/') }}" class="flex items-center space-x-3 mb-10">
                <div class="w-15 h-15 flex items-center justify-center font-black text-white text-lg tracking-wider">
                <img src="{{ asset('images/sam-logo.png') }}" alt="SAM Logo" class="h-12 w-auto object-contain">
                </div>
                <div>
                    <h1 class="font-bold text-sm leading-none tracking-widest text-zinc-100 uppercase">OFFICE</h1>
                    <p class="text-xs text-zinc-400 tracking-wider">AUTOMATION</p>
                </div>
            </a>

            <div class="bg-[#181a20] p-3 rounded-lg border border-zinc-800/80 mb-8">
                <p class="text-[10px] font-semibold tracking-wider text-zinc-400 uppercase">Store Status</p>
                <p class="text-xs text-zinc-300 font-medium mt-1">Live Store</p>
            </div>

            <nav class="space-y-6 text-sm">
                <a href="{{ url('/') }}" class="flex items-center space-x-3 text-zinc-400 hover:text-white transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Home</span>
                </a>

                <div>
                    <p class="text-[10px] font-bold tracking-widest text-zinc-500 uppercase mb-3">Management</p>
                    <div class="space-y-3 pl-1">
                        <a href="{{ route('products.index') }}" class="flex items-center justify-between text-zinc-300 hover:text-white transition">
                            <span class="flex items-center space-x-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                <span>Store Products</span>
                            </span>
                            <svg class="w-3 h-3 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                     </div>

            <nav class="space-y-6 text-sm">
                <a href="{{ url('/') }}" class="flex items-center space-x-3 text-zinc-400 hover:text-white transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Spare Parts & Supplies</span>
                    
                </a>

                <div>
                </div>
            </nav>
        </div>
    </aside>

    <!-- Main Section with Large Background Copier Overlay -->
    <main class="flex-1 relative overflow-hidden flex items-center justify-center p-6 md:p-12">
        
        <!-- Background Overlay Image (Dynamic) -->
        <div class="absolute inset-0 flex items-center justify-start pl-12 opacity-30 pointer-events-none">
            <img src="{{ asset($product->image) }}" alt="Background Copier" class="h-[85%] w-auto object-contain filter grayscale">
        </div>

        <div class="relative z-10 max-w-5xl w-full grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            
            <!-- Foreground Center Product Image (Dynamic) -->
            <div class="flex items-center justify-center p-4">
                <img src="{{ asset($product->image) }}" 
                     alt="{{ $product->name }}" 
                     class="max-h-[380px] w-auto object-contain drop-shadow-[0_20px_50px_rgba(0,0,0,0.9)]">
            </div>

            <!-- Product Details Card -->
            <div class="bg-[#12141a]/90 backdrop-blur-md p-8 rounded-2xl border border-zinc-800 shadow-2xl">
                @if(session('success'))
                    <div class="mb-4 p-3 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs rounded-lg">
                {{ session('success') }}
            
                    
                    </div>
                @endif

                <p class="text-[11px] font-bold tracking-widest text-red-500 uppercase mb-2">SAM OFFICE AUTOMATION</p>
                <h1 class="text-3xl font-black text-white tracking-tight mb-3">{{ $product->name }}</h1>
                <p class="text-2xl font-black text-white mb-6">${{ number_format($product->price, 2) }}</p>

                <div class="border-t border-zinc-800 pt-4 mb-6">
                    <div class="flex justify-between text-xs text-zinc-400 mb-4">
                        <span>Availability</span>
                        <span class="text-emerald-400 font-semibold">{{ $product->stock ?? 8 }} units remaining</span>
                    </div>

                    <form action="{{ url('/products/' . $product->id . '/purchase') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-[10px] font-bold tracking-widest text-zinc-400 uppercase mb-2">Quantity</label>
                            <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock ?? 10 }}" 
                                   class="w-full bg-[#1a1d24] border border-zinc-700 rounded-lg px-4 py-2.5 text-white text-sm focus:outline-none focus:border-indigo-500 transition">
                        </div>

                        <button type="submit" class="w-full py-3.5 px-6 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs tracking-wider uppercase transition duration-200 shadow-lg shadow-indigo-600/30">
                            Purchase Now
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </main>

</body>
</html>