<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController as Restaurant;
use App\Http\Controllers\MenuController as Menu;
use App\Http\Controllers\DishController as Dish;
use App\Http\Controllers\OrderController as Order;

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

Auth::routes();

//restaurant routes
//index
Route::get('/restaurants', [Restaurant::class, 'index'])->name('restaurants-index')->middleware('rp:user') ;
//create
Route::get('/restaurants/create', [Restaurant::class, 'create'])->name('restaurants-create')->middleware('rp:admin');
Route::post('/restaurants', [Restaurant::class, 'store'])->name('restaurants-store')->middleware('rp:admin');
//edit
Route::get('/restaurants/edit/{restaurant}', [Restaurant::class, 'edit'])->name('restaurants-edit')->middleware('rp:admin');
Route::put('/restaurants/edit/{restaurant}', [Restaurant::class, 'update'])->name('restaurants-update')->middleware('rp:admin');
//delete
Route::delete('/restaurants/{restaurant}', [Restaurant::class, 'destroy'])->name('restaurants-delete')->middleware('rp:admin');


//menu routes
//index
Route::get('/menus', [Menu::class, 'index'])->name('menus-index')->middleware('rp:user') ;
//create
Route::get('/menus/create', [Menu::class, 'create'])->name('menus-create')->middleware('rp:admin');
Route::post('/menus', [Menu::class, 'store'])->name('menus-store')->middleware('rp:admin');
//edit
Route::get('/menus/edit/{menu}', [Menu::class, 'edit'])->name('menus-edit')->middleware('rp:admin');
Route::put('/menus/edit/{menu}', [Menu::class, 'update'])->name('menus-update')->middleware('rp:admin');
//delete
Route::delete('/menus/{menu}', [Menu::class, 'destroy'])->name('menus-delete')->middleware('rp:admin');

//dish routes
//index
Route::get('/dishes', [Dish::class, 'index'])->name('dishes-index')->middleware('rp:user') ;
//create
Route::get('/dishes/create', [Dish::class, 'create'])->name('dishes-create')->middleware('rp:admin');
Route::post('/dishes', [Dish::class, 'store'])->name('dishes-store')->middleware('rp:admin');
//edit
Route::get('/dishes/edit/{dish}', [Dish::class, 'edit'])->name('dishes-edit')->middleware('rp:admin');
Route::put('/dishes/edit/{dish}', [Dish::class, 'update'])->name('dishes-update')->middleware('rp:admin');
//delete
Route::delete('/dishes/{dish}', [Dish::class, 'destroy'])->name('dishes-delete')->middleware('rp:admin');

//order routes
//index
Route::get('/orders', [Order::class, 'index'])->name('orders-index')->middleware('rp:admin') ;
// //create
// Route::get('/dishes/create', [Dish::class, 'create'])->name('dishes-create')->middleware('rp:admin');
// Route::post('/dishes', [Dish::class, 'store'])->name('dishes-store')->middleware('rp:admin');
// //edit
// Route::get('/dishes/edit/{dish}', [Dish::class, 'edit'])->name('dishes-edit')->middleware('rp:admin');
// Route::put('/dishes/edit/{dish}', [Dish::class, 'update'])->name('dishes-update')->middleware('rp:admin');
// //delete
// Route::delete('/dishes/{dish}', [Dish::class, 'destroy'])->name('dishes-delete')->middleware('rp:admin');
//comfirm
Route::put('/orders/confirm/{order}', [Order::class, 'confirmOrder'])->name('order-confirm')->middleware('rp:admin');
//cancel
Route::put('/orders/cancel/{order}', [Order::class, 'cancelOrder'])->name('order-cancel')->middleware('rp:admin');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
