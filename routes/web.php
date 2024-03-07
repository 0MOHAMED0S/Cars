<?php

use App\Http\Controllers\Admin\Cars;
use App\Http\Controllers\Admin\Categories;
use App\Http\Controllers\Admin\dashboard;
use App\Http\Controllers\Admin\Testimonials;
use App\Http\Controllers\Admin\messages;
use App\Http\Controllers\Admin\Users;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\main;
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
//     return view('Admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

    //main//
    Route::get('/', [main::class, 'index'])->name('home');
    Route::get('/cars', [main::class, 'cars'])->name('cars.user');
    Route::get('/cars/details/{id}', [main::class, 'cars_details'])->name('cars.details');
    Route::get('/contactus', [main::class, 'contactus'])->name('contactus');
    Route::post('/contactus/store', [main::class, 'store_contactus'])->name('store.contactus');


Route::middleware('auth')->group(function () {
    //dashboard//
    Route::get('/dashboard', [dashboard::class, 'index'])->name('dashboard');

    //categories//
    Route::get('/dashboard/categories', [Categories::class, 'categories'])->name('categories');
    Route::post('/dashboard/categories/store', [Categories::class, 'store_categories'])->name('store.categories');
    Route::put('/dashboard/categories/update/{id}', [Categories::class, 'update_categories'])->name('update.categories');
    Route::delete('/dashboard/categories/destroy/{id}', [Categories::class, 'destroy_categorie'])->name('destroy.categorie');

    //Users//
    Route::get('/dashboard/users', [Users::class, 'users'])->name('users');
    Route::post('/dashboard/users/add', [Users::class, 'add_users'])->name('add.users');
    Route::put('/dashboard/users/update/{id}', [Users::class, 'update_users'])->name('update.users');
    Route::delete('/dashboard/users/destroy/{id}', [Users::class, 'destroy_users'])->name('destroy.users');

    //Cars//
    Route::get('/dashboard/cars', [Cars::class, 'cars'])->name('cars');
    Route::post('/dashboard/cars/store', [Cars::class, 'store_cars'])->name('store.cars');
    Route::put('/dashboard/cars/update/{id}', [Cars::class, 'update_cars'])->name('update.cars');
    Route::delete('/dashboard/cars/destroy/{id}', [cars::class, 'destroy'])->name('destroy.cars');

    //Testimonials//
    Route::get('/dashboard/testimonials', [Testimonials::class, 'testimonials'])->name('testimonials');
    Route::post('/dashboard/testimonials/add', [Testimonials::class, 'add_testimonials'])->name('store.testimonials');
    Route::delete('/dashboard/testimonials/destroy/{id}', [Testimonials::class, 'destroy'])->name('destroy.testimonials');
    Route::put('/dashboard/testimonials/update/{id}', [Testimonials::class, 'update_testimonials'])->name('update.testimonials');

    //messages
    Route::get('/dashboard/messages', [messages::class, 'messages'])->name('messages');
    Route::any('/dashboard/messages/read/{id}', [messages::class, 'messages_read'])->name('messages.read');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
