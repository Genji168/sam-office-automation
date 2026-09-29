@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#08090a] text-white p-8 flex justify-center items-center">
    <div class="max-w-4xl w-full bg-[#0c0d10]/80 backdrop-blur-md p-8 rounded-2xl border border-gray-800/50 shadow-2xl">
        <span class="text-3x1 font-bold tracking-widest text-red-600 uppercase">សេវ៉ាកម្មជួសជុលដល់កន្លែង</span>
        <h1 class="text-3xl font-black text-white mt-3 mb-6">តើម៉ាសុីនកូពីរបស់លោកអ្នកមានបញ្ហាមែនទេ?</h1>

        @if(session('service_success'))
            <div class="mb-6 bg-emerald-500/10 border border-emerald-500/50 text-emerald-400 px-4 py-3 rounded-lg text-sm font-semibold">
                {{ session('service_success') }}
            </div>
        @endif

        @if(session('success'))
            <div class="mb-6 bg-emerald-500/10 border border-emerald-500/50 text-emerald-400 px-4 py-3 rounded-lg text-sm font-semibold">
                {{ session('success') }}
            </div>
        @endif
        

        <form action="{{ route('service.store') }}" method="POST" class="space-y-4">



        <form action="{{ route('service.request') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-3x1 font-semibold text-gray-400 uppercase mb-1">ឈ្មោះហាងរបស់លោកអ្នក</label>
                    <input type="text" name="customer_name" required placeholder="Mr/Mrs John Doe" class="w-full bg-[#141519] border border-gray-800 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-red-500">
                </div>
                <div>
                    <label class="block text-3x1 font-semibold text-gray-400 uppercase mb-1">លេខទូរស័ព្ទ</label>
                    <input type="text" name="phone" required placeholder="+855" class="w-full bg-[#141519] border border-gray-800 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-red-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-3x1 font-semibold text-gray-400 uppercase mb-1">ម៉ាកម៉ាសុីនកូពី និង​ Version ម៉ាសុីនកូពីដែរមាន​បញ្ហា</label>
                    <input type="text" name="machine_model" required placeholder=" anon iR-ADV C5560iii" class="w-full bg-[#141519] border border-gray-800 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-red-500">
                </div>
                <div>
                    <label class="block text-3x1 font-semibold text-gray-400 uppercase mb-1">បញ្ហាកូដរបស់ម៉ាសុីនកូពី</label>
                    <input type="text" name="error_code" placeholder="E000-0001" class="w-full bg-[#141519] border border-gray-800 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-red-500">
                </div>
            </div>

            <div>
                <label class="block text-3x1 font-semibold text-gray-400 uppercase mb-1">ផ្ដល់ព័ត៍មានបន្ថែម</label>
                <textarea name="description" rows="4" required placeholder="Describe the symptom (fuser error code, paper jam in duplex unit, poor color alignment)..." class="w-full bg-[#141519] border border-gray-800 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-red-500"></textarea>
            </div>

            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3.5 rounded-lg transition duration-200 uppercase tracking-wider shadow-lg">
                ចុចបញ្ចូន
            </button>
        </form>

      <script>
            document.getElementById('serviceForm').addEventListener('submit', function(e) {
    const form = this;
    const latInput = document.getElementById('latitude');
    const lngInput = document.getElementById('longitude');

    // If location is already populated, let form submit naturally
    if (latInput.value && lngInput.value) {
        return true;
    }

    // If browser supports geolocation, prevent submit and get position first
    if (navigator.geolocation) {
        e.preventDefault();

        navigator.geolocation.getCurrentPosition(
            function(position) {
                latInput.value = position.coords.latitude;
                lngInput.value = position.coords.longitude;
                form.submit(); // Submit form after setting values
            },
            function(error) {
                console.warn("Location error:", error.message);
                form.submit(); // Submit anyway if user denies permission or error occurs
            },
            {
                enableHighAccuracy: true,
                timeout: 5000,
                maximumAge: 0
            }
        );
    }
});
</script>
    </div>
</div>
@endsection