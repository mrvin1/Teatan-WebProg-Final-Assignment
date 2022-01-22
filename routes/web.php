<?php

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
Route::get('/profile', [\App\Http\Controllers\ProfileController::class,'get'])->name('show-profile')->middleware(['auth']);
Route::post('/profile', [\App\Http\Controllers\ProfileController::class,'update'])->name('edit-profile')->middleware(['auth']);

Route::get('/', [\App\Http\Controllers\HomeController::class, 'get']);
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'get'])->name('home');
Route::post('/home', [\App\Http\Controllers\HomeController::class, 'searchDrink'])->name('home');

Route::get('/manage-drink', [\App\Http\Controllers\DrinkController::class, 'get'])->name('show-drink')->middleware(['auth', 'admin']);
Route::get('/drink-detail/{id}', [\App\Http\Controllers\DrinkController::class, 'getDetail'])->name('show-drink-detail');
Route::post('/manage-drink', [\App\Http\Controllers\DrinkController::class, 'add'])->name('add-drink')->middleware(['auth', 'admin']);
Route::post('/drink-detail/{id}', [\App\Http\Controllers\DrinkController::class, 'update'])->name('update-drink-detail')->middleware(['auth', 'admin']);
Route::delete('/manage-drink/{id}', [\App\Http\Controllers\DrinkController::class, 'delete'])->name('delete-drink')->middleware(['auth', 'admin']);

Route::get('/manage-user',[\App\Http\Controllers\UserController::class,'get'])->name('show-user')->middleware(['auth', 'admin']);;
Route::post('/manage-user/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('update-user')->middleware(['auth', 'admin']);
Route::delete('/manage-user/{id}', [\App\Http\Controllers\UserController::class, 'delete'])->name('delete-user')->middleware(['auth', 'admin']);
Route::get('/user-detail/{id}', [\App\Http\Controllers\UserController::class, 'getDetail'])->name('show-user-detail')->middleware(['auth', 'admin']);


Route::get('/cart', [\App\Http\Controllers\CartController::class, 'get'])->name('show-item')->middleware(['auth', 'user']);
Route::get('/edit/cart/{id}', [\App\Http\Controllers\CartController::class,'getEdit'])->name('show-edit-item')->middleware(['auth', 'user']);
Route::post('/update/cart/{id}', [\App\Http\Controllers\CartController::class,'update'])->name('update-item')->middleware(['auth', 'user']);
Route::post('/add/cart/{id}', [\App\Http\Controllers\CartController::class, 'add'])->name('add-item')->middleware(['auth', 'user']);
Route::delete('delete/cart/{id}', [\App\Http\Controllers\CartController::class, 'delete'])->name('delete-item')->middleware(['auth', 'user']);

Route::get('/transactions', [\App\Http\Controllers\TransactionController::class, 'get'])->name('show-transactions')->middleware(['auth', 'user']);
Route::get('/transaction-detail/{id}', [\App\Http\Controllers\TransactionController::class, 'getDetail'])->name('show-transaction-detail')->middleware(['auth', 'user']);
Route::post('/checkout', [\App\Http\Controllers\TransactionController::class, 'add'])->name('checkout')->middleware(['auth', 'user']);

Route::get('/change-password', [\App\Http\Controllers\PasswordController::class, 'get'])->name('show-change-password')->middleware(['auth']);
Route::post('/change-password', [\App\Http\Controllers\PasswordController::class, 'update'])->name('update-password')->middleware(['auth']);

Route::get('/about-us', function () {
    return view('aboutUs');
});

require __DIR__.'/auth.php';
