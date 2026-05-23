<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/admin-login', [HomeController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin-dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/blog-admin', [HomeController::class, 'blogAdmin'])->name('admin.blog');
Route::get('/mission-control', [HomeController::class, 'missionControl'])->name('mission-control');
Route::get('/orders', [HomeController::class, 'orders'])->name('orders');
Route::get('/order-success', [HomeController::class, 'orderSuccess'])->name('order-success');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/resources/cell-biology-interactive-powerpoint', [HomeController::class, 'cellBiology'])->name('resources.cell-biology');
Route::post('/generate', [HomeController::class, 'generate'])->name('generate');
