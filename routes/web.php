<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UserController::class, 'getRegistration'])->name('register');
Route::post('/register', [UserController::class, 'postRegistration'])->name('register');

Route::get('/login', [UserController::class, 'getLogin'])->name('login');
Route::post('/login', [UserController::class, 'postLogin'])->name('login');


Route::get('/signout', [UserController::class, 'signOut'])->name('signout');

Route::get('/main',[MainController::class,'getMainPage'])->name('main');
Route::post('/addProduct', [ProductController::class, 'addProduct'])->name('addProduct');

Route::post('/addCart', [CartController::class, 'addCart'])->name('addCart');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cartView');
Route::post('/cart/editQuantity', [CartController::class, 'editQuantity'])->name('editQuantity');
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('clearCart');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('updateCart');

Route::get('/order', [OrderController::class, 'viewOrderForm'])->name('viewOrderForm');
Route::post('/order', [OrderController::class, 'createOrder'])->name('orderCreate');
Route::get('/order/{id}', [OrderController::class, 'viewOrder'])->name('viewOrderProduct');
Route::get('/orders', [OrderController::class, 'viewOrders'])->name('orders');

Route::get('/test', [OrderController::class, 'test'])->name('test');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
