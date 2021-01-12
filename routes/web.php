<?php
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaveForLaterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/continue', [CheckoutController::class, 'index'])->name('continue');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/saveForLater/{id}', [CartController::class, 'saveForLater'])->name('cart.save');

Route::post('/SwitchToCart/{product}', [saveForLaterController::class, 'switchToCart'])->
            name('SaveForLater.switchToCart');
Route::delete('/saveForLater/{id}', [SaveForLaterController::class, 'destroy'])->name('SaveForLater.destroy');

Route::get('/thankyou', [PagesController::class, 'thankyou'])->name('thankyou');


Route::get('/dashboard', function () {
    $categories=Category::all();

    return view('dashboard', [
        'categories'=>$categories]);
    })->middleware(['auth'])->name('dashboard');
    //admin routes

    Route::group(['prefix' => 'admin'], function () {
        Voyager::routes();
    });
    
require __DIR__.'/auth.php';

/* Route::get('/', function () {
    return view('pages.landing');
});
*/