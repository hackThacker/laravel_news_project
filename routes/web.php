<?php

use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\Admin\Categorycontroller;
use App\Http\Controllers\Admin\CompanyController as AdminCompanyController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/company', AdminCompanyController::class)->names('company');
    Route::resource('/category', Categorycontroller::class)->names('category');
    Route::resource('/advertise', AdvertiseController::class)->names('advertise');
    Route::resource('/post', PostController::class)->names('post');
});

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/categories/{slug}', [PageController::class, 'categories'])->name('categories');
Route::get('/news/{id}', [PageController::class, 'news'])->name('news');

require __DIR__.'/auth.php';
