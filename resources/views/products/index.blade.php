@extends('layouts.app')

<!-- GSAP Animation Library -->
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>

@section('content')
<div class="min-h-screen bg-[#07080a] text-slate-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto space-y-10">

        <!-- HERO BANNER SLIDE CAROUSEL -->
        <div x-data="{ 
                activeSlide: 0, 
                slides: [
                    {
                        title: 'SAM Spare Parts & Supplies',
                        subtitle: 'Genuine replacement fuser units, toner cartridges, and maintenance kits.',
                        badge: 'Replacement Parts',
                        image: '{{ asset("images/sparepart-logo.png") }}',
                        buttonText: 'View Parts',
                        buttonLink: '#catalog'
                    },
                    {
                        title: 'Canon imageRUNNER ADVANCE',
                        subtitle: 'High-performance enterprise photocopiers and digital press systems.',
                        badge: 'Featured Series',
                        image: '{{ asset("images/canon-copier.png") }}',
                        buttonText: 'View Canon',
                        buttonLink: '#catalog'
                    },
                    {
                        title: 'RICOH Aficio & IM Series',
                        subtitle: 'Reliable multifunction digital copiers and print solutions.',
                        badge: 'RICOH Series',
                        image: '{{ asset("images/ricoh-copier.png") }}',
                        buttonText: 'View RICOH',
                        buttonLink: '#catalog'
                    },
                    {
                        title: 'Toshiba E-Studio Series',
                        subtitle: 'High-performance enterprise photocopiers and digital press systems.',
                        badge: 'Featured Series',
                        image: '{{ asset("images/toshiba-copier.png") }}',
                        buttonText: 'View Toshiba',
                        buttonLink: '#catalog'
                    },
                    {
                        title: 'HP LaserJet & Office Printers',
                        subtitle: 'Genuine replacement fuser units, toner cartridges, and maintenance kits.',
                        badge: 'Replacement Parts',
                        image: '{{ asset("images/hp-copier.png") }}',
                        buttonText: 'View Parts',
                        buttonLink: '#catalog'
                    }
                ],
                next() { this.activeSlide = (this.activeSlide + 1) % this.slides.length },
                prev() { this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length }
             }"
             x-init="setInterval(() => next(), 6000)"
             class="relative w-full rounded-2xl overflow-hidden bg-gradient-to-r from-[#111319] via-[#0d0e12] to-[#161820] border border-slate-800/80 shadow-2xl h-[320px]">

            <!-- Carousel Slides -->
            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="activeSlide === index"
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute inset-0 flex items-center justify-between p-8 md:p-12">
                    
                    <div class="max-w-lg z-10 space-y-4">
                        <span class="text-[11px] font-extrabold uppercase tracking-widest text-red-500 bg-red-500/10 px-3 py-1 rounded-full border border-red-500/20"
                              x-text="slide.badge"></span>
                        
                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-white tracking-wide leading-tight"
                            x-text="slide.title"></h2>
                        
                        <p class="text-xs sm:text-sm text-slate-400 leading-relaxed"
                           x-text="slide.subtitle"></p>

                        <a :href="slide.buttonLink"
                           class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-500 text-white font-bold text-xs uppercase tracking-wider px-6 py-3 rounded-xl shadow-lg shadow-red-600/20 transition-all duration-200">
                            <span x-text="slide.buttonText"></span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>

                    <div class="hidden md:flex justify-center items-center h-full w-1/2 relative">
                        <img :src="slide.image" 
                             alt="Slide Banner" 
                             class="max-h-60 max-w-full object-contain drop-shadow-[0_20px_30px_rgba(0,0,0,0.8)]">
                    </div>
                </div>
            </template>

            <!-- Navigation Controls -->
            <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 bg-slate-900/60 hover:bg-slate-800 text-white p-2.5 rounded-full border border-slate-700/60 backdrop-blur-sm transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 bg-slate-900/60 hover:bg-slate-800 text-white p-2.5 rounded-full border border-slate-700/60 backdrop-blur-sm transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>

            <!-- Indicators -->
            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 z-20 flex gap-2">
                <template x-for="(slide, index) in slides" :key="index">
                    <button @click="activeSlide = index"
                            :class="activeSlide === index ? 'bg-red-600 w-6' : 'bg-slate-700 w-2'"
                            class="h-2 rounded-full transition-all duration-300"></button>
                </template>
            </div>
        </div>
        
        <!-- MAIN CATALOG SECTION -->
        <div id="catalog" class="w-full bg-[#0b0c10] text-slate-100 p-6 md:p-8 rounded-2xl border border-slate-800/80 shadow-2xl">
            
            <!-- HEADER & SORTING BAR -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8 pb-6 border-b border-slate-800/80">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="h-2.5 w-2.5 rounded-full bg-red-500 animate-pulse"></span>
                        <span class="text-[11px] font-black uppercase tracking-widest text-red-500">Enterprise Inventory</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-black text-white tracking-tight mt-1">OFFICE COPIERS & HARDWARE</h1>
                    <p class="text-xs text-slate-400 mt-1">Enterprise-grade photocopiers, fuser units, and diagnostic replacement parts by SAM.</p>
                </div>

                <div class="flex items-center gap-3 bg-[#12141c] p-2 rounded-xl border border-slate-800/90 self-start md:self-auto">
                    <span class="text-xs text-slate-400 font-medium pl-2 whitespace-nowrap">Sort by:</span>
                    <select class="bg-[#181a24] text-xs font-semibold text-slate-200 px-3 py-2 rounded-lg border border-slate-700/80 focus:outline-none focus:border-red-500 cursor-pointer">
                        <option value="latest">Latest Models</option>
                        <option value="price-low">Price: Low to High</option>
                        <option value="price-high">Price: High to Low</option>
                    </select>
                </div>
            </div>

            <!-- CATEGORY PILLS GRID -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3.5 mb-8">
                <!-- Low Prod -->
                <button class="flex items-center gap-3 p-3.5 bg-[#12141c] hover:bg-[#181b26] border border-slate-800 hover:border-red-500/50 rounded-xl transition-all group text-left shadow-sm">
                    <div class="w-10 h-10 rounded-lg bg-red-500/10 border border-red-500/20 flex items-center justify-center text-red-500 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <div class="min-w-0">
                        <span class="block text-[10px] font-black uppercase tracking-widest text-red-500">Low Prod</span>
                        <span class="block text-xs font-bold text-slate-200 truncate">Office Copier</span>
                    </div>
                </button>

                <!-- High Prod -->
                <button class="flex items-center gap-3 p-3.5 bg-[#12141c] hover:bg-[#181b26] border border-slate-800 hover:border-indigo-500/50 rounded-xl transition-all group text-left shadow-sm">
                    <div class="w-10 h-10 rounded-lg bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-400 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 8h14M5 8a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v1a2 2 0 01-2 2M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                    </div>
                    <div class="min-w-0">
                        <span class="block text-[10px] font-black uppercase tracking-widest text-indigo-400">High Prod</span>
                        <span class="block text-xs font-bold text-slate-200 truncate">Office Copier</span>
                    </div>
                </button>

                <!-- Wide Format -->
                <button class="flex items-center gap-3 p-3.5 bg-[#12141c] hover:bg-[#181b26] border border-slate-800 hover:border-emerald-500/50 rounded-xl transition-all group text-left shadow-sm">
                    <div class="w-10 h-10 rounded-lg bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="min-w-0">
                        <span class="block text-[10px] font-black uppercase tracking-widest text-emerald-400">B&W / Color</span>
                        <span class="block text-xs font-bold text-slate-200 truncate">Wide Format</span>
                    </div>
                </button>

                <!-- Digital Press Low -->
                <button class="flex items-center gap-3 p-3.5 bg-[#12141c] hover:bg-[#181b26] border border-slate-800 hover:border-amber-500/50 rounded-xl transition-all group text-left shadow-sm">
                    <div class="w-10 h-10 rounded-lg bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    </div>
                    <div class="min-w-0">
                        <span class="block text-[10px] font-black uppercase tracking-widest text-amber-400">Low Prod</span>
                        <span class="block text-xs font-bold text-slate-200 truncate">Digital Press</span>
                    </div>
                </button>

                <!-- Digital Press High -->
                <button class="flex items-center gap-3 p-3.5 bg-[#12141c] hover:bg-[#181b26] border border-slate-800 hover:border-cyan-500/50 rounded-xl transition-all group text-left shadow-sm col-span-2 sm:col-span-1">
                    <div class="w-10 h-10 rounded-lg bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <div class="min-w-0">
                        <span class="block text-[10px] font-black uppercase tracking-widest text-cyan-400">High Prod</span>
                        <span class="block text-xs font-bold text-slate-200 truncate">Digital Press</span>
                    </div>
                </button>
            </div>

            <!-- TWO-COLUMN WORKSPACE -->
            <div class="flex flex-col lg:flex-row gap-8 items-start w-full">

                <!-- SIDEBAR FILTERS -->
                <aside class="w-full lg:w-64 flex-shrink-0 space-y-5">
                    
                    <!-- BRAND SELECTOR -->
                    <div class="bg-[#12141c] border border-slate-800/90 rounded-2xl p-5 shadow-xl">
                        <label class="text-[11px] font-black uppercase tracking-wider text-slate-400 block mb-3">Select Brand</label>
                        <div class="relative">
                            <select class="w-full bg-[#181a24] border border-slate-700/80 rounded-xl px-4 py-3 text-sm font-semibold text-white focus:outline-none focus:border-red-500 appearance-none cursor-pointer">
                                <option value="canon" selected>Canon</option>
                                <option value="toshiba">Toshiba</option>
                                <option value="ricoh">Ricoh</option>
                                <option value="hp">HP LaserJet</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- SPEED CATEGORY -->
                    <div class="bg-[#12141c] border border-slate-800/90 rounded-2xl p-5 shadow-xl">
                        <h3 class="text-[11px] font-black uppercase tracking-wider text-slate-400 mb-4 pb-2 border-b border-slate-800">Speed Category</h3>
                        <div class="space-y-3 text-xs text-slate-300">
                            <label class="flex justify-between items-center cursor-pointer hover:text-white transition-colors group">
                                <span class="flex items-center space-x-2.5">
                                    <input type="checkbox" class="w-4 h-4 rounded bg-[#181a24] border-slate-700 text-red-600 focus:ring-0 focus:ring-offset-0 cursor-pointer">
                                    <span>1-35 PPM</span>
                                </span>
                                <span class="text-[11px] font-bold text-slate-500 group-hover:text-slate-400">121</span>
                            </label>
                            <label class="flex justify-between items-center cursor-pointer hover:text-white transition-colors group">
                                <span class="flex items-center space-x-2.5">
                                    <input type="checkbox" class="w-4 h-4 rounded bg-[#181a24] border-slate-700 text-red-600 focus:ring-0 focus:ring-offset-0 cursor-pointer">
                                    <span>35-45 PPM</span>
                                </span>
                                <span class="text-[11px] font-bold text-slate-500 group-hover:text-slate-400">78</span>
                            </label>
                            <label class="flex justify-between items-center cursor-pointer hover:text-white transition-colors group">
                                <span class="flex items-center space-x-2.5">
                                    <input type="checkbox" class="w-4 h-4 rounded bg-[#181a24] border-slate-700 text-red-600 focus:ring-0 focus:ring-offset-0 cursor-pointer">
                                    <span>45-55 PPM</span>
                                </span>
                                <span class="text-[11px] font-bold text-slate-500 group-hover:text-slate-400">67</span>
                            </label>
                            <label class="flex justify-between items-center cursor-pointer hover:text-white transition-colors group">
                                <span class="flex items-center space-x-2.5">
                                    <input type="checkbox" class="w-4 h-4 rounded bg-[#181a24] border-slate-700 text-red-600 focus:ring-0 focus:ring-offset-0 cursor-pointer">
                                    <span>55-75 PPM</span>
                                </span>
                                <span class="text-[11px] font-bold text-slate-500 group-hover:text-slate-400">141</span>
                            </label>
                            <label class="flex justify-between items-center cursor-pointer hover:text-white transition-colors group">
                                <span class="flex items-center space-x-2.5">
                                    <input type="checkbox" class="w-4 h-4 rounded bg-[#181a24] border-slate-700 text-red-600 focus:ring-0 focus:ring-offset-0 cursor-pointer">
                                    <span>75+ PPM</span>
                                </span>
                                <span class="text-[11px] font-bold text-slate-500 group-hover:text-slate-400">113</span>
                            </label>
                        </div>
                    </div>

                    <!-- COLOR CAPABILITY -->
                   <div class="bg-[#11131a] border border-slate-800/90 rounded-2xl p-5 shadow-xl">
                <h3 class="text-xs font-extrabold uppercase tracking-wider text-slate-400 mb-4 pb-2 border-b border-slate-800">Color Capability</h3>
                <div class="space-y-3 text-xs text-slate-300">
                    <label class="flex justify-between items-center cursor-pointer hover:text-white transition-colors group">
                        <span class="flex items-center space-x-2.5">
                            <input type="checkbox" class="w-4 h-4 rounded bg-[#181a24] border-slate-700 text-red-600 focus:ring-0 focus:ring-offset-0">
                            <span>Black & White Copier</span>
                        </span>
                        <span class="text-[11px] font-semibold text-slate-500 group-hover:text-slate-400">229</span>
                    </label>
                    <label class="flex justify-between items-center cursor-pointer hover:text-white transition-colors group">
                        <span class="flex items-center space-x-2.5">
                            <input type="checkbox" class="w-4 h-4 rounded bg-[#181a24] border-slate-700 text-red-600 focus:ring-0 focus:ring-offset-0">
                            <span>Color Copier</span>
                        </span>
                        <span class="text-[11px] font-semibold text-slate-500 group-hover:text-slate-400">212</span>
                    </label>
                </div>
            </div>
        </aside>

                <!-- PRODUCT LISTING MAIN GRID -->
                <main class="flex-1 w-full min-w-0">
                    
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xs font-extrabold text-slate-400 uppercase tracking-widest">
                            Showing <span class="text-white">1–3</span> of {{ $products->count() ?? 3 }} Results
                        </h2>
                    </div>

                    <!-- 3-COLUMN PRODUCT CARD GRID -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">

                        <!-- 2525 -->
                        <div class="bg-[#12141c] border border-slate-800/90 hover:border-blue-700/70 rounded-2xl p-5 flex flex-col justify-between transition-all duration-300 hover:shadow-2xl hover:shadow-red-500/5 group">
                            <div>
                                <div class="w-full aspect-[4/3] bg-[#171924] rounded-xl border border-slate-800 p-4 flex items-center justify-center relative overflow-hidden mb-4">
                                    <span class="absolute top-3 left-3 bg-red-500/10 text-red-500 text-[10px] font-black px-2.5 py-1 rounded-md border border-red-500/20 uppercase tracking-widest z-10">
                                        CANON
                                    </span>
                                    <img src="{{ asset('images/canon-ir2520.png') }}" 
                                         onerror="this.onerror=null; this.src='https://placehold.co/400x400/171924/ffffff?text=Canon+DX+8795i';" 
                                         alt="Canon iR ADV 2525" 
                                         class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                                </div>

                                <h3 class="text-sm font-black text-white group-hover:text-blue-700 transition-colors line-clamp-2 leading-snug min-h-[2.5rem]">
                                    Canon imageRUNNER ADVANCE 2525
                                </h3>
                            </div>

                            <div class="mt-4 pt-4 border-t border-slate-800/80 flex flex-col gap-3">
                                <div class="flex items-baseline justify-between">
                                    <span class="text-xl font-black text-white">$500.00</span>
                                    <span class="text-[11px] font-bold text-slate-300 bg-slate-800/80 px-2 py-0.5 rounded-md border border-slate-700/50">
                                        ⚡ 25 PPM
                                    </span>
                                </div>
                                <a href="/products/1" class="w-full py-2.5 bg-blue-700 hover:bg-blue-700 text-white font-bold text-xs text-center rounded-xl transition-all shadow-lg shadow-red-600/20 uppercase tracking-wider">
                                    View Details
                                </a>
                            </div>
                        </div>

                        <!-- C5560 -->
                        <div class="bg-[#12141c] border border-slate-800/90 hover:border-blue-700/70 rounded-2xl p-5 flex flex-col justify-between transition-all duration-300 hover:shadow-2xl hover:shadow-red-500/5 group">
                            <div>
                                <div class="w-full aspect-[4/3] bg-[#171924] rounded-xl border border-slate-800 p-4 flex items-center justify-center relative overflow-hidden mb-4">
                                    <span class="absolute top-3 left-3 bg-red-500/10 text-red-500 text-[10px] font-black px-2.5 py-1 rounded-md border border-red-500/20 uppercase tracking-widest z-10">
                                        CANON
                                    </span>
                                    <img src="{{ asset('images/canon-copier.png') }}" 
                                         onerror="this.onerror=null; this.src='https://placehold.co/400x400/171924/ffffff?text=Canon+DX+8786i';" 
                                         alt="Canon iR ADV DX 8786i" 
                                         class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                                </div>

                                <h3 class="text-sm font-black text-white group-hover:text-blue-700 transition-colors line-clamp-2 leading-snug min-h-[2.5rem]">
                                    Canon imageRUNNER ADVANCE C5560
                                </h3>
                            </div>

                            <div class="mt-4 pt-4 border-t border-slate-800/80 flex flex-col gap-3">
                                <div class="flex items-baseline justify-between">
                                    <span class="text-xl font-black text-white">$1,119.00</span>
                                    <span class="text-[11px] font-bold text-slate-300 bg-slate-800/80 px-2 py-0.5 rounded-md border border-slate-700/50">
                                        ⚡ 60 PPM
                                    </span>
                                </div>
                                <a href="/products/2" class="w-full py-2.5 bg-blue-700 hover:bg-blue-700 text-white font-bold text-xs text-center rounded-xl transition-all shadow-lg shadow-red-600/20 uppercase tracking-wider">
                                    View Details
                                </a>
                            </div>
                        </div>

                        <!-- 4545i -->
                        <div class="bg-[#12141c] border border-slate-800/90 hover:border-blue-700/70 rounded-2xl p-5 flex flex-col justify-between transition-all duration-300 hover:shadow-2xl hover:shadow-red-500/5 group">
                            <div>
                                <div class="w-full aspect-[4/3] bg-[#171924] rounded-xl border border-slate-800 p-4 flex items-center justify-center relative overflow-hidden mb-4">
                                    <span class="absolute top-3 left-3 bg-red-500/10 text-red-500 text-[10px] font-black px-2.5 py-1 rounded-md border border-red-500/20 uppercase tracking-widest z-10">
                                        CANON
                                    </span>
                                    <img src="{{ asset('images/4545.png') }}" 
                                         onerror="this.onerror=null; this.src='https://placehold.co/400x400/171924/ffffff?text=Canon+DX+8705i';" 
                                         alt="Canon iR ADV 4545i" 
                                         class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                                </div>

                                <h3 class="text-sm font-black text-white group-hover:text-red-400 transition-colors line-clamp-2 leading-snug min-h-[2.5rem]">
                                    Canon imageRUNNER ADVANCE 4545i
                                </h3>
                            </div>

                            <div class="mt-4 pt-4 border-t border-slate-800/80 flex flex-col gap-3">
                                <div class="flex items-baseline justify-between">
                                    <span class="text-xl font-black text-white">$1,099.00</span>
                                    <span class="text-[11px] font-bold text-slate-300 bg-slate-800/80 px-2 py-0.5 rounded-md border border-slate-700/50">
                                        ⚡ 45 PPM
                                    </span>
                                </div>
                                <a href="/products/3" class="w-full py-2.5 bg-blue-700 hover:bg-blue-700 text-white font-bold text-xs text-center rounded-xl transition-all shadow-lg shadow-red-600/20 uppercase tracking-wider">
                                    View Details
                                </a>
                            </div>
                        </div>

                    </div>
                </main>

            </div>
        </div>

    </div>
</div>
@endsection