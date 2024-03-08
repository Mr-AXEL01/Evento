<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::post('/admin/{user}/suspend', [AdminController::class, 'suspend'])->name('users.suspend');
Route::post('/admin/{user}/unsuspend', [AdminController::class, 'unsuspend'])->name('users.unsuspend');
Route::get('/admin/categories', [CategoryController::class, 'categories'])->name('admin.categories');
Route::get('/admin/create_category',[CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/create_category', [CategoryController::class, 'store'])->name('category.store');


Route::get('/customer/dashboard', function () {
    return view('customer.dashboard');
})->middleware(['auth', 'verified'])->name('customer.dashboard');

Route::get('/organiser/dashboard', function () {
    return view('organiser.dashboard');
})->middleware(['auth', 'verified'])->name('organiser.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
