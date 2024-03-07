<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/home', function () {return view('home');
//     });
// });
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'index']);

// });
Auth::routes(['verify' => true]);

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'verified']);
    Route::get('/orders', [PagesController::class, 'orders'])->name('orders')->middleware(['auth', 'verified']);
    Route::get('/products', [PagesController::class, 'products'])->name('products')->middleware(['auth', 'verified']);
    Route::get('/add/news', [NewsController::class, 'create'])->name('add.news')->middleware(['auth', 'verified']);
    Route::post('/add/news', [NewsController::class, 'store'])->name('store.news')->middleware(['auth', 'verified']);
    Route::get('/create', [ProductController::class, 'index'])->name('product.page')->middleware(['auth', 'verified']);
    Route::post('/create', [ProductController::class, 'create'])->name('create')->middleware(['auth', 'verified']);
    Route::delete('/order/delete/{id}', [ProductController::class, 'deleteOrder'])->name('order.delete')->middleware(['auth', 'verified']);
    Route::delete('/product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('product.delete')->middleware(['auth', 'verified']);
});


Route::get('/', [PagesController::class, 'landing'])->name('landing');
Route::get('/home', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/store', [PagesController::class, 'store'])->name('store');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product');
Route::post('/product/order/{id}', [ProductController::class, 'order'])->name('order');


require __DIR__.'/auth.php';
