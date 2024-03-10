<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganiserController;
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

#------------------- Admin ----------------------#
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::post('/admin/{user}/suspend', [AdminController::class, 'suspend'])->name('users.suspend');
Route::post('/admin/{user}/unsuspend', [AdminController::class, 'unsuspend'])->name('users.unsuspend');
Route::get('/admin/categories', [CategoryController::class, 'categories'])->name('admin.categories');
Route::get('/admin/create_category',[CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/create_category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
Route::get('/admin/events', [AdminController::class, 'events'])->name('admin.events');
Route::patch('admin/events/{event}/status/{status}', [AdminController::class, 'eventsReview'])->name('admin.review.event');


#------------------- Organiser ----------------------#
Route::get('/organiser/dashboard', [OrganiserController::class, 'dashboard'])->name('organiser.dashboard');
Route::get('/organiser/events', [OrganiserController::class, 'events'])->name('organiser.events');
Route::get('/organiser/create_event',[EventController::class, 'create'])->name('organiser.event.create');
Route::post('/organiser/create_event', [EventController::class, 'store'])->name('organiser.event.store');
Route::get('/organiser/events/{event}/edit', [EventController::class, 'edit'])->name('organiser.events.edit');
Route::put('/organiser/events/{event}', [EventController::class, 'update'])->name('organiser.events.update');
Route::delete('/organiser/events/{event}', [EventController::class, 'destroy'])->name('organiser.events.destroy');
Route::get('/organiser/reservations', [OrganiserController::class, 'reservations'])->name('organiser.reservations');

#------------------- Customer ----------------------#
Route::get('/customer/dashboard', function () {
    return view('customer.dashboard');
})->middleware(['auth', 'verified'])->name('customer.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
