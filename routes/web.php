<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MarketingCoordinatorController;
use App\Http\Controllers\MarketingManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware(['auth', 'administrators'])->group(function (){
    Route::get('/home', [AdminController::class, 'home']);
});

Route::prefix('student')->middleware(['auth', 'student'])->group(function (){
    Route::get('/index', [StudentController::class, 'home']);
    Route::get('/magazine-detail', [StudentController::class, 'magazine_detail']);
    Route::match(['get', 'post'], '/contribution', [StudentController::class, 'contribution'])->name('contribution');
    Route::post('/contribution-upload', [StudentController::class, 'contribution_upload'])->name('contribution-upload');
    Route::get('/terms-and-conditions', [StudentController::class, 'terms_and_conditions']);
    Route::get('/contact-us', [StudentController::class, 'contact_us']);
});

Route::prefix('marketing-manager')->middleware(['auth', 'mm'])->group(function (){
    Route::get('/home', [MarketingManagerController::class, 'home']);
});

Route::prefix('marketing-coordinator')->middleware(['auth', 'mc'])->group(function (){
    Route::get('/home', [MarketingCoordinatorController::class, 'home']);
});

Route::prefix('guest')->middleware(['auth', 'guest'])->group(function (){
    Route::get('/home', [GuestController::class, 'home']);
});

Route::get('/guest/home', function () {
    return view('guest/home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
