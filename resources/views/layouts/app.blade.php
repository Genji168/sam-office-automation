<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAM | Official Automation Store</title>

    <!-- SAM Favicon (PNG from public/images/) -->
    <link rel="icon" type="image/png" href="{{ asset('images/sam-logo.png') }}?v={{ time() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/sam-logo.png') }}?v={{ time() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-[#08090a] text-white antialiased min-h-screen flex">

          
    <!-- LEFT SIDEBAR -->
     
    <aside class="w-64 bg-[#0c0d10] border-r border-gray-800/80 min-h-screen flex flex-col justify-between shrink-0">
        <div>
            <!-- Top Logo Header -->
            <div class="p-5 border-b border-gray-800/60 flex items-center gap-3">
                <img src="{{ asset('images/sam-logo.png') }}" alt="SAM Logo" class="h-10 w-auto object-contain drop-shadow-[0_0_25px_rgba(139,68,68,0.4)]">
                <span class="text-xs font-black tracking-widest text-white uppercase">Office Automation</span>
            </div>

            <!-- Setup Progress Banner -->
            <div class="p-4 mx-3 my-4 bg-[#141519] border border-gray-800 rounded-xl">
                <p class="text-xs font-semibold text-gray-300">Store Status</p>
                <p class="text-[10px] text-gray-500 mb-2">2/7 completed</p>
                <div class="w-full bg-gray-800 rounded-full h-1.5">
                    <div class="bg-red-600 h-1.5 rounded-full" style="width: 30%"></div>
                </div>
            </div>

            <!-- SIDEBAR NAVIGATION -->
<aside class="w-64 bg-[#0c0d10] border-r border-gray-800/80 min-h-screen p-4 flex flex-col justify-between">
    <div class="space-y-6">

        <!-- Section: Navigation Header -->
        <div class="space-y-1">
            <a href="{{ route('products.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-gray-300 hover:text-white rounded-lg hover:bg-gray-800/40 transition">
                <span class="flex items-baseline gap-2.5 "><i class ="fa-solid fa-home txt-sm text-gray-400"></i>Home</span>
               
            </a>
        </div>

        <!-- Section: MANAGEMENT -->
        <div>
            <span class="px-3 text-[10px] font-bold text-gray-500 uppercase tracking-widest block mb-2">Management</span>
            
            <div class="space-y-1">
                <!-- Store Products Submenu / Link -->
                 <a href="{{ route('products.index') }}" class="flex items-center justify-between px-3 py-2.5 rounded-lg hover:text-white hover:bg-gray-800/40 transition">
                    <span class="flex items-center gap-2.5"><i class="fa-solid fa-store text-sm text-gray-400"></i>Store Products</span>
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>  
                </a>

                <!-- Spare Parts & Supplies -->
                 <a href="{{ route('service.page') }}" class="flex items-center justify-between px-3 py-2.5 rounded-lg hover:text-white hover:bg-gray-800/40 transition">    
                    <span class="flex items-center gap 2.5"><i class="fa-solid fa-gear text-sm text-gray-400 mr-2.5"></i>Spare Parts & Supplies</span>
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    
                                     
                 <!-- Service Link moved under MANAGEMENT -->
                <a href="{{ route('service.page') }}" class="flex items-center justify-between px-3 py-2.5 rounded-lg hover:text-white hover:bg-gray-800/40 transition">
                   <span class="flex items-center gap-2.5"><i class="fa-solid fa-screwdriver-wrench text-sm text-gray-400"></i>Service Requests</span>
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>       
                    
                </a>


                <!-- Service Link moved under Maketing & SEo -->

                <div class="pt-2 pb-1 px-3 text-[10px] font-bold text-gray-500 uppercase tracking-wider">Marketing & SEO</div>

                <a href="#" class="flex items-center justify-between px-3 py-2.5 rounded-lg hover:text-white hover:bg-gray-800/40 transition">
                    <span class="flex items-center gap-2.5"><i class="fa-solid fa-envelope text-gray-400"></i> Email Marketing</span>
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                </a>

                <a href="#" class="flex items-center justify-between px-3 py-2.5 rounded-lg hover:text-white hover:bg-gray-800/40 transition">
                    <span class="flex items-center gap-2.5"><i class="fa-solid fa-bullhorn text-gray-400"></i> Social Media</span>
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                </a>
            <!-- Section: Settings -->
                <div class="pt-2 pb-1 px-3 text-[10px] font-bold text-gray-500 uppercase tracking-wider">Settings</div>
            <!--Billing & Payments -->
                <a href="#" class="flex items-center justify-between px-3 py-2.5 rounded-lg hover:text-white hover:bg-gray-800/40 transition">
                    <span class="flex items-center gap-2.5"><i class="fa-solid fa-credit-card text-gray-400"></i> Billing & Payments</span>
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                </a>

               
                <!-- Orders -->
                <a href="#" class="flex items-center justify-between px-3 py-2.5 rounded-lg hover:text-white hover:bg-gray-800/40 transition">
                    <span class="flex items-center gap-2.5" ><i class="fa-solid fa-cart-flatbed text text-gray-400"></i> Orders</span>
                        <i class="fa-solid fa-chevron-right text-[10px]"></i>
                </a>
            </div>
        </div>

    </div>
</aside>
        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-gray-800/60">
            <button class="w-full flex items-center gap-2 text-xs font-semibold text-gray-400 hover:text-white transition">
                <i class="fa-solid fa-bolt"></i> Quick Access
            </button>
        </div>
        
    </aside>

    <!-- RIGHT MAIN CONTENT AREA -->
    <main class="flex-1 min-w-0 min-h-screen">
        @yield('content')
    </main>
    

</body>
</html>