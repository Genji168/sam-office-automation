<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceRequestController;

// Welcome Website Route
Route::get('/', function () {
    return view('welcome');
})->name('welcome'); // <-- Add ->name('welcome') here

// 1. MUST BE DEFINED ABOVE Route::resource
Route::post('/products/{product}/purchase', [ProductController::class, 'purchase'])->name('products.purchase');

// 2. Standard resource route
Route::resource('products', ProductController::class);

Route::post('/products/{product}/purchase', [ProductController::class, 'purchase'])->name('products.purchase');

// 3. Display the dedicated Service page
Route::get('/service', function () {
    return view('service');
})->name('service.page');

// 4. Handle the Service Form Submission
Route::post('/service-request', [App\Http\Controllers\ProductController::class, 'handleServiceRequest'])->name('service.request');

// Canon dedicated catalog page
Route::get('/catalog/canon', [ProductController::class, 'canonCatalog'])->name('brands.canon');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/brand/{brand}', [ProductController::class, 'brand'])->name('products.brand');

//Service Request Controllers
Route::post('/service-requests', [ServiceRequestController::class, 'store'])->name('service.store');