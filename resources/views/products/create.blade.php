<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | SAM Office Automation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-gray-100 min-h-screen flex flex-col justify-between p-6">

    <div class="max-w-2xl mx-auto w-full bg-gray-900 border border-gray-800 rounded-lg p-8 mt-10">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-xl font-bold tracking-wider text-white uppercase">Add New Product</h1>
            <a href="{{ route('products.index') }}" class="text-xs text-gray-400 hover:text-white uppercase tracking-wider">← Back to Catalog</a>
        </div>

        @if ($errors->any())
            <div class="bg-red-900/50 border border-red-500 text-red-200 text-sm p-4 rounded mb-6">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs uppercase tracking-wider text-gray-400 mb-1">Product Name</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Canon iR-ADV C5035 Fuser Unit" required class="w-full bg-gray-950 border border-gray-800 rounded px-4 py-2 text-sm text-white focus:outline-none focus:border-red-600">
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-gray-400 mb-1">SKU</label>
                <input type="text" name="sku" value="{{ old('sku') }}" placeholder="e.g. SAM-CAN-C5035" required class="w-full bg-gray-950 border border-gray-800 rounded px-4 py-2 text-sm text-white focus:outline-none focus:border-red-600">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-gray-400 mb-1">Price ($)</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}" placeholder="320.00" required class="w-full bg-gray-950 border border-gray-800 rounded px-4 py-2 text-sm text-white focus:outline-none focus:border-red-600">
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-wider text-gray-400 mb-1">Stock Quantity</label>
                    <input type="number" name="stock" value="{{ old('stock') }}" placeholder="12" required class="w-full bg-gray-950 border border-gray-800 rounded px-4 py-2 text-sm text-white focus:outline-none focus:border-red-600">
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-gray-400 mb-1">Description</label>
                <textarea name="description" rows="4" placeholder="Enter component specifications and details..." class="w-full bg-gray-950 border border-gray-800 rounded px-4 py-2 text-sm text-white focus:outline-none focus:border-red-600">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold text-xs uppercase tracking-wider py-3 rounded transition-colors mt-4">
                Save & Add to Catalog
            </button>
        </form>
    </div>

</body>
</html>