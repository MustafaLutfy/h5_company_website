<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TeamMemberController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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


Route::middleware('localization')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'verified']);
        Route::get('/orders', [PagesController::class, 'orders'])->name('orders')->middleware(['auth', 'verified']);
        Route::get('/products', [PagesController::class, 'products'])->name('products')->middleware(['auth', 'verified']);
        Route::get('/news', [PagesController::class, 'news'])->name('news')->middleware(['auth', 'verified']);
        Route::get('/stores', [PagesController::class, 'stores'])->name('stores')->middleware(['auth', 'verified']);
        Route::post('/add/store', [StoreController::class, 'store'])->name('add.store')->middleware(['auth', 'verified']);
        Route::get('/add/news', [NewsController::class, 'create'])->name('add.news')->middleware(['auth', 'verified']);
        Route::post('/add/news', [NewsController::class, 'store'])->name('store.news')->middleware(['auth', 'verified']);
        Route::get('/edit-news/{id}', [NewsController::class, 'edit'])->name('edit.news')->middleware(['auth', 'verified']);;  
        Route::put('/update-news/{id}', [NewsController::class, 'update'])->name('update.news')->middleware(['auth', 'verified']);;  
        Route::get('/create', [ProductController::class, 'index'])->name('product.page')->middleware(['auth', 'verified']);
        Route::post('/create', [ProductController::class, 'create'])->name('create')->middleware(['auth', 'verified']);
        Route::delete('/order/delete/{id}', [ProductController::class, 'deleteOrder'])->name('order.delete')->middleware(['auth', 'verified']);
        Route::delete('/product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('product.delete')->middleware(['auth', 'verified']);
        Route::put('/product/edit/{id}', [ProductController::class, 'editProduct'])->name('product.edit')->middleware(['auth', 'verified']);
        Route::get('/product/edit/{id}', [PagesController::class, 'productEdit'])->name('product.edit.page')->middleware(['auth', 'verified']);
        Route::delete('/news/delete/{id}', [NewsController::class, 'deletePost'])->name('post.delete')->middleware(['auth', 'verified']);
        Route::delete('/store/delete/{id}', [StoreController::class, 'deleteStore'])->name('store.delete')->middleware(['auth', 'verified']);
        Route::put('/store/edit/{store}', [StoreController::class, 'update'])->name('store.update')->middleware(['auth', 'verified']); 
        Route::resource('/team-members', TeamMemberController::class)->middleware(['auth', 'verified'])->except(['show']);});

    Route::get('/', [PagesController::class, 'landing'])->name('landing');
    Route::get('/home', [PagesController::class, 'home'])->name('home');
    Route::get('/about', [PagesController::class, 'about'])->name('about');
    Route::get('/store', [PagesController::class, 'store'])->name('store');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product');
    Route::get('/store/products/{id}', [StoreController::class, 'show'])->name('store.products');
    Route::post('/product/order/{id}', [ProductController::class, 'order'])->name('order');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');  
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');  
    Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');  
    Route::delete('/cart/remove/{productId}', [CartController::class, 'removeItem'])->name('cart.remove');  
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear'); 
    Route::patch('/carts/{cart}/update-status', [CartController::class, 'updateStatus'])->name('cart.update.status');  
    Route::delete('/carts/{cart}', [CartController::class, 'delete'])->name('cart.delete');  
    Route::get('/carts/{cart}/details', [CartController::class, 'details'])->name('cart.details');
    Route::post('/cart/{product}/update', [CartController::class, 'updateQuantity'])->name('cart.update');  
    Route::delete('/cart/{product}/remove', [CartController::class, 'remove'])->name('cart.remove');  
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');  
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');  
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');  

});



Route::get('/locale/{locale}', function (Request $request, $locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');



require __DIR__.'/auth.php';




Route::view('LightOfDestiny', 'image');