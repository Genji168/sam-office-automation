<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    

    /**
     * Display a listing of the resource.
     */
  public function index()
{
    // High-level brand summary cards
    $brands = [
        (object)[
            'id' => 1,
            'name' => 'Canon iR2520W Digital Multifunctional PhotoCopier',
            'sku' => 'canon-ir2520w',
            'brand' => 'canon',
            'print_type' => 'Black & White Only',
            'price' => 125000.00,
            'currency_symbol' => '$',
            'image' => 'images/canon-copier.png',
            'features' => 'Copy, Print, Scan (Monochrome)',
        ],
        (object)[
            'id' => 2,
            'name' => 'Canon iR-ADV C5560 Color Multifunctional PhotoCopier',
            'sku' => 'canon-ir-adv-c5560',
            'brand' => 'canon',
            'print_type' => 'Color & Black/White',
            'price' => 245000.00,
            'currency_symbol' => '$',
            'image' => 'images/canon-copier.png',
            'features' => 'Full Color & B/W, Copy, Print, Network Scan',
        ],
    ];
    // Fetch products from database (or mock data if not using Eloquent yet)
    $products = \App\Models\Product::all(); 

    return view('products.index', compact('brands', 'products'));
}

public function brand($slug)
{
    // Dataset of copiers
    $products = collect([
        (object)[
            'id' => 1,
            'name' => 'Canon iR2520W Digital Multifunctional PhotoCopier',
            'sku' => 'canon-ir2520w',
            'brand' => 'canon',
            'print_type' => 'Black & White Only',
            'price' => 125000.00,
            'currency_symbol' => '$',
            'image' => 'images/canon-copier.png',
            'features' => 'Copy, Print, Scan (Monochrome)',
        ],
        (object)[
            'id' => 2,
            'name' => 'Canon iR-ADV C5560 Color Multifunctional PhotoCopier',
            'sku' => 'canon-ir-adv-c5560',
            'brand' => 'canon',
            'print_type' => 'Color & Black/White',
            'price' => 245000.00,
            'currency_symbol' => '$',
            'image' => 'images/canon-copier.png',
            'features' => 'Full Color & B/W, Copy, Print, Network Scan',
        ],
    ]);

    // Filter by selected brand
    $brandProducts = $products->filter(fn($p) => strtolower($p->brand) === strtolower($slug));

    // Separate into print types
    $bwProducts    = $brandProducts->filter(fn($p) => $p->print_type === 'Black & White Only');
    $colorProducts = $brandProducts->filter(fn($p) => $p->print_type === 'Color & Black/White');

    $brandName = strtoupper($slug);

    return view('products.brand', compact('brandName', 'bwProducts', 'colorProducts'));
}
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $products = collect([


        // Canon Using only Black & White Copiers
        (object)[
            'id' => 1,
            'name' => 'Canon iR2520 Digital Multifunctional PhotoCopier',
            'brand' => 'Canon',
            'model' => 'Canon 2520',
            'speed' => '20/15 ppm (A4/A3)',
            'resolution' => '600 x 600 dpi(Copy)',
            'connectivity' => 'USB & LAN',
            'price' => 500.00,
            'currency_symbol' => '$',
            'stock' => 5, // Out of stock
            'image' => 'images/Canon-iR2520.png',
            'logo' => 'images/canon-logo.png',
        ],
    


        // Canon Using For Color and Black & White Copiers
            (object)[
                'id' => 1,
                'name' => 'Canon iR-ADV C5235',
                'sku' => 'Canon-ir-adv-c5235',
                'price' => 150.00,
                'stock' => 12,
                'brand' => 'Canon',
                'image' => 'images/canon-copier.png', 
                'description' => 'Color A3 Multifunction Copier'
            ],
            (object)[
                'id' => 2,
                'name' => 'Canon iR-ADV C5560',
                'sku' => 'Canon-ir-adv-c5560',
                'price' => 3200.00,
                'stock' => 5,
                'brand' => 'Canon',
                'image' => 'images/canon-copier.png',
                'description' => 'High-Speed Enterprise Copier'
            ],
            (object)[
                'id' => 3,
                'name' => 'Canon iR-ADV 4545i',
                'sku' => 'Canon iR-adv-4545i',
                'price' => 1099.00,
                'stock' => 8,
                'brand' => 'Canon',
                'image' => 'images/canon.4545.png', 
                'description' => 'Reliable Color Multifunction Printer'
            ],
        ]);

        $product = $products->firstWhere('id', (int)$id) ?? $products->first();

        return view('products.show', compact('product'));
    }

    /**
     * Handle product purchase request.
     */
    public function purchase(Request $request, $id)
    {
        return redirect()->back()->with('success', 'Thank you for your purchase order! We will contact you shortly.');
    }
}