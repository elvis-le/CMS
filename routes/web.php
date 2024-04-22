<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MarketingCoordinatorController;
use App\Http\Controllers\MarketingManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('administrators')->middleware(['auth', 'administrators'])->group(function (){
    Route::get('/home', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/student', [AdminController::class, 'student_manage'])->name('admin.student');
    Route::post('/student-edit', [AdminController::class, 'student_edit'])->name('user.edit');
    Route::patch('/student-edit-save', [AdminController::class, 'student_edit_save'])->name('user.edit-save');
    Route::patch('/student-save', [AdminController::class, 'student_save'])->name('user.save');
    Route::get('/student-add', [AdminController::class, 'student_add'])->name('user.add');
    Route::match(['get', 'post'],'/student-delete', [AdminController::class, 'student_delete'])->name('user.delete');
    Route::get('/academic-year', [AdminController::class, 'academic_year_manage'])->name('admin.academic');
    Route::post('/academic-year-edit', [AdminController::class, 'academic_year_edit'])->name('academic.edit');
    Route::patch('/academic-year-edit-save', [AdminController::class, 'academic_year_edit_save'])->name('academic.edit-save');
    Route::patch('/academic-year-save', [AdminController::class, 'academic_year_save'])->name('academic.save');
    Route::get('/academic-year-add', [AdminController::class, 'academic_year_add'])->name('academic.add');
    Route::match(['get', 'post'],'/academic-year-delete', [AdminController::class, 'academic_year_delete'])->name('academic.delete');
    Route::get('/marketing-coordinator', [AdminController::class, 'marketing_coordinator_manage'])->name('admin.mc');
    Route::post('/marketing-coordinator-edit', [AdminController::class, 'marketing_coordinator_edit'])->name('mc.edit');
    Route::patch('/marketing-coordinator-edit-save', [AdminController::class, 'marketing_coordinator_edit_save'])->name('mc.edit-save');
    Route::patch('/marketing-coordinator-save', [AdminController::class, 'marketing_coordinator_save'])->name('mc.save');
    Route::get('/marketing-coordinator-add', [AdminController::class, 'marketing_coordinator_add'])->name('mc.add');
    Route::match(['get', 'post'],'/marketing-coordinator-delete', [AdminController::class, 'marketing_coordinator_delete'])->name('mc.delete');
    Route::get('/faculty', [AdminController::class, 'faculty_manage'])->name('admin.faculty');
    Route::post('/faculty-edit', [AdminController::class, 'faculty_edit'])->name('faculty.edit');
    Route::patch('/faculty-edit-save', [AdminController::class, 'faculty_edit_save'])->name('faculty.edit-save');
    Route::patch('/faculty-save', [AdminController::class, 'faculty_save'])->name('faculty.save');
    Route::get('/faculty-add', [AdminController::class, 'faculty_add'])->name('faculty.add');
    Route::match(['get', 'post'],'/faculty-delete', [AdminController::class, 'faculty_delete'])->name('faculty.delete');
});

Route::prefix('student')->middleware(['auth', 'student'])->group(function (){
    Route::get('/index', [StudentController::class, 'home'])->name('student.index');
    Route::get('/magazine-detail', [StudentController::class, 'magazine_detail']);
    Route::match(['get', 'post'], '/submit-contribution', [StudentController::class, 'submit_contribution'])->name('submit-contribution');
    Route::post('/contribution-upload', [StudentController::class, 'contribution_upload'])->name('contribution-upload');
    Route::patch('/contribution-edit', [StudentController::class, 'contribution_edit'])->name('contribution-edit');
    Route::get('/terms-and-conditions', [StudentController::class, 'terms_and_conditions']);
    Route::get('/contact-us', [StudentController::class, 'contact_us']);
    Route::patch('/comment', [StudentController::class, 'comment'])->name('student.comment');
    Route::get('/profile', [StudentController::class, 'profile'])->name('student.profile');
    Route::patch('/profile', [StudentController::class, 'profile_save'])->name('student.profile-save');
});

Route::prefix('marketing-manager')->middleware(['auth', 'mm'])->group(function (){
    Route::get('/home', [MarketingManagerController::class, 'home']);
    Route::match(['get', 'post'], '/contribution', [MarketingManagerController::class, 'contribution'])->name('contribution');
    Route::post('contribution-detail', [MarketingManagerController::class, 'contribution_detail'])->name('mm.contribution-detail');
    Route::match(['get', 'post'], 'download', [MarketingManagerController::class, 'download'])->name('mm.download');
});

Route::prefix('marketing-coordinator')->middleware(['auth', 'mc'])->group(function (){
    Route::get('/home', [MarketingCoordinatorController::class, 'home']);
    Route::match(['get', 'post'], '/contributions', [MarketingCoordinatorController::class, 'contributions'])->name('contributions');
    Route::post('contribution-detail', [MarketingCoordinatorController::class, 'contribution_detail'])->name('mc.contribution-detail');
    Route::post( '/approved', [MarketingCoordinatorController::class, 'approved'])->name('approved');
    Route::post( '/rejected', [MarketingCoordinatorController::class, 'rejected'])->name('rejected');
});

Route::prefix('guest')->middleware(['auth', 'guests'])->group(function (){
    Route::get('/home', [GuestController::class, 'home']);
    Route::match(['get', 'post'], '/contributions', [GuestController::class, 'contributions'])->name('guest.contributions');
    Route::post('contribution-detail', [GuestController::class, 'contribution_detail'])->name('guest.contribution-detail');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
