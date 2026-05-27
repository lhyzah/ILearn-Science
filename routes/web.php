<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('sitemap');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::post('/checkout/receipt-email', [HomeController::class, 'sendReceiptEmail'])->name('checkout.receipt-email');
Route::get('/products/live', [HomeController::class, 'productsIndex'])->name('products.index');
Route::post('/admin/products', [HomeController::class, 'saveProduct'])->name('admin.products.save');
Route::delete('/admin/products/{id}', [HomeController::class, 'deleteProduct'])->name('admin.products.delete');
Route::get('/blogs/live', [HomeController::class, 'blogsIndex'])->name('blogs.index');
Route::post('/admin/blog-posts', [HomeController::class, 'saveBlogPost'])->name('admin.blog-posts.save');
Route::delete('/admin/blog-posts/{id}', [HomeController::class, 'deleteBlogPost'])->name('admin.blog-posts.delete');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/admin-login', [HomeController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin-dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/blog-admin', [HomeController::class, 'blogAdmin'])->name('admin.blog');
Route::get('/mission-control', [HomeController::class, 'missionControl'])->name('mission-control');
Route::get('/orders', [HomeController::class, 'orders'])->name('orders');
Route::get('/order-success', [HomeController::class, 'orderSuccess'])->name('order-success');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/resources/cell-biology-interactive-powerpoint', [HomeController::class, 'cellBiology'])->name('resources.cell-biology');
Route::get('/resources/{id}', [HomeController::class, 'resourceShow'])->name('resources.show');
Route::post('/generate', [HomeController::class, 'generate'])->name('generate');
