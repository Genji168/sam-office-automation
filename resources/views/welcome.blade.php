<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAM OFFICE AUTOMATION</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <!-- SAM Favicon (PNG from public/images/) -->
    <link rel="icon" type="image/png" href="{{ asset('images/sam-logo.png') }}?v={{ time() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/sam-logo.png') }}?v={{ time() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#12161a] text-white min-h-screen flex flex-col justify-between antialiased selection:bg-orange-500 selection:text-white relative overflow-x-hidden">

    <!-- Radial Background Glow -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-slate-800/40 via-[#12161a] to-[#0d1013] pointer-events-none"></div>

   <!-- Top Navigation -->
    <header class="relative z-10 w-full border-b border-slate-800/60 bg-[#12161a]/80 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-6 h-24 flex items-center justify-between">
            <!-- Brand Logo Top Left (Increased size) -->
            <header class="relative z-10 w-full border-b border-slate-800/60 bg-[#12161a]/80 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-6 h-24 flex items-center justify-between">
        
        <!-- Brand Logo Top Left -->
        <a href="{{ url('/') }}" class="flex items-center space-x-4 group">
            <img src="{{ asset('images/sam-logo.png') }}" alt="SAM Logo" class="h-14 sm:h-16 w-auto mix-blend-screen hover:scale-105 transition-transform drop-shadow-[0_0_25px_rgba(139,68,68,0.4)]">
            <span class="font-black tracking-wider text-xl sm:text-2xl text-zinc-100 uppercase">OFFICE AUTOMATION</span>
        </a>

        <!-- Right Navigation Links -->
        <div class="flex items-center space-x-6">
            <a href="{{ url('/') }}" class="text-sm font-bold tracking-widest text-zinc-300 hover:text-white transition uppercase">Home</a>
            <a href="{{ route('products.index') }}" class="text-sm font-bold tracking-widest text-zinc-300 hover:text-white transition uppercase">CATALOG</a>
        </div>

    </div>
</header>
            </a>
        </div>
    </header>

    <!-- Main Hero Content -->
    <main class="relative z-10 max-w-4xl mx-auto px-6 py-12 text-center my-auto flex flex-col items-center">       
        <!-- Center SAM Logo Image -->
        <div class="mb-6">
            <img src="{{ asset('images/sam-logo.png') }}" alt="SAM Logo" class="h-25 sm:h-40 w-auto mx-auto mix-blend-screen drop-shadow-[0_0_25px_rgba(239,68,68,0.4)]">
        </div>

        <!-- Main Title -->
        <h1 class="text-3xl sm:text-4xl md:text-4xl font-black tracking-tight text-white uppercase">
            WELCOME TO <span class="text-[#e02b1b]">SAM</span> OFFICE AUTOMATION
        </h1>

        <!-- Subtitle -->
        <p class="text-slate-300 text-xs sm:text-sm mt-3 max-w-2xl leading-relaxed font-normal">
            Your premier source for high-performance photocopier systems, replacement spare parts, fuser assemblies, and technical office solutions.
        </p>

        <!-- Twin Feature Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 w-full max-w-2xl mt-8">
            
            <!-- Box 1: Copier Machines -->
            <div class="bg-slate-900/60 border border-slate-700/50 rounded-lg p-5 text-left backdrop-blur-sm hover:border-slate-500 transition">
                <div class="flex items-center space-x-2 text-white font-bold text-sm">
                    <svg class="w-4 h-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <span>Copier Machines</span>
                </div>
                <p class="text-slate-400 text-xs mt-2 leading-normal">
                    High-end multifunction printers, color copiers, and heavy-duty office systems.
                </p>
            </div>

            <!-- Box 2: Spare Parts & Supplies -->
            <div class="bg-slate-900/60 border border-slate-700/50 rounded-lg p-5 text-left backdrop-blur-sm hover:border-slate-500 transition">
                <div class="flex items-center space-x-2 text-white font-bold text-sm">
                    <svg class="w-4 h-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span>Spare Parts & Supplies</span>
                </div>
                <p class="text-slate-400 text-xs mt-2 leading-normal">
                    Genuine fuser units, rollers, toner motors, sensors, and maintenance kits.
                </p>
            </div>

        </div>

        <!-- Orange CTA Button -->
        <div class="mt-8">
            <a href="{{ route('products.index') }}" class="inline-block bg-[#f95721] hover:bg-[#e04818] text-white font-bold text-xs uppercase tracking-wider px-8 py-3.5 rounded-md shadow-[0_4px_20px_rgba(249,87,33,0.35)] transition-all transform hover:-translate-y-0.5">
                EXPLORE INVENTORY
            </a>
        </div>

    </main>

    <!-- Footer -->
    <footer class="relative z-10 py-6 text-center text-[10px] text-slate-500 uppercase tracking-widest border-t border-slate-800/40">
        &copy; 2026 SAM OFFICE AUTOMATION. ENGINEERED FOR PERFORMANCE.
    </footer>

</body>
</html>