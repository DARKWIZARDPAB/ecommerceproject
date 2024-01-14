<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeControler::class,'index']);
Route::get('/redirect', [HomeControler::class,'redirect'])->middleware('auth','verified');
Route::get('/view_category', [AdminController::class,'view_category']);
Route::get('/view_product', [AdminController::class,'view_product']);
Route::get('/show_product', [AdminController::class,'show_product']);
Route::post('/add_category', [AdminController::class,'add_category']);
Route::post('/update_product/{id}', [AdminController::class,'update_product']);
Route::post('/add_product', [AdminController::class,'add_product']);
Route::post('/add_cart/{id}', [HomeControler::class,'add_cart']);
Route::get('/delete_category/{id}', [AdminController::class,'delete_category']);
Route::get('/delete_product/{id}', [AdminController::class,'delete_product']);
Route::get('/edit_product/{id}', [AdminController::class,'edit_product']);
Route::get('/product_details/{id}', [HomeControler::class,'product_details']);
Route::get('/delivered/{id}', [AdminController::class,'delivered']);
Route::get('/print_pdf/{id}', [AdminController::class,'print_pdf']);
Route::get('/show_cart', [HomeControler::class,'show_cart']);
Route::get('/cash_order', [HomeControler::class,'cash_order']);
Route::get('/stripe/{totalprice}', [HomeControler::class,'stripe']);
Route::get('/remove_cart/{id}', [HomeControler::class,'remove_cart']);
Route::get('/order', [AdminController::class,'order']);

Route::post('stripe/{totalprice}', [HomeControler::class,'stripePost'])->name('stripe.post');

//Route::get('/redirect',  [HomeController::class, 'redirect'])->name('redirect');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
