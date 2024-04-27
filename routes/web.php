<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MarketingCoordinatorController;
use App\Http\Controllers\MarketingManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Models\AcademicYear;
use App\Models\Contribution;
use App\Models\Faculty;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create-password', [AdminController::class, 'create_password'])
    ->name('create-password');

Route::post('/create-password', [AdminController::class, 'create_password_account'])
    ->name('student.create-password');

Route::get('/create-password-mc', [AdminController::class, 'create_password_mc'])
    ->name('create-password-mc');

Route::post('/create-password-mc', [AdminController::class, 'create_password_account_mc'])
    ->name('student.create-password-mc');

Route::prefix('administrators')->middleware(['auth', 'administrators'])->group(function (){
    Route::get('/home', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/student', [AdminController::class, 'student_manage'])->name('admin.student');
    Route::post('/student-edit', [AdminController::class, 'student_edit'])->name('user.edit');
    Route::patch('/student-edit-save', [AdminController::class, 'student_edit_save'])->name('user.edit-save');
    Route::patch('/student-save', [AdminController::class, 'student_save'])->name('user.save');
    Route::get('/student-add', [AdminController::class, 'student_add'])->name('user.add');
    Route::match(['get', 'post'],'/student-delete', [AdminController::class, 'student_delete'])->name('user.delete');
    Route::get('/guest', [AdminController::class, 'guest_manage'])->name('admin.guest');
    Route::match(['get', 'post'],'/guest-edit', [AdminController::class, 'guest_edit'])->name('guest.edit');
    Route::patch('/guest-edit-save', [AdminController::class, 'guest_edit_save'])->name('guest.edit-save');
    Route::patch('/guest-save', [AdminController::class, 'guest_save'])->name('guest.save');
    Route::get('/guest-add', [AdminController::class, 'guest_add'])->name('guest.add');
    Route::match(['get', 'post'],'/guest-delete', [AdminController::class, 'guest_delete'])->name('guest.delete');
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
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::patch('/profile', [AdminController::class, 'profile_save'])->name('admin.profile-save');
});



Route::prefix('student')->middleware(['auth', 'student'])->group(function (){
    Route::get('/index', [StudentController::class, 'home'])->name('student.index');
    Route::get('/academicYear-detail', [StudentController::class, 'academicYear_detail'])->name('st.academicYear-detail');
    Route::patch('/comment', [StudentController::class, 'comment'])->name('student.comment');
    Route::match(['get', 'post'], '/submit-contribution', [StudentController::class, 'submit_contribution'])->name('st.submit-contribution');
    Route::match(['get', 'post'], '/contribution-detail', [StudentController::class, 'contribution_detail'])->name('st.contribution-detail');
    Route::match(['get', 'post'], '/contribution-edit', [StudentController::class, 'edit_contribution'])->name('st.edit-contribution');
    Route::match(['get', 'post'], '/contribution-edit-save', [StudentController::class, 'edit_contribution_save'])->name('st.edit-contribution-save');
    Route::match(['get', 'post'], '/contribution', [StudentController::class, 'contribution'])->name('st.contribution');
    Route::post('/contribution-upload', [StudentController::class, 'contribution_upload'])->name('contribution-upload');
    Route::patch('/contribution-edit', [StudentController::class, 'contribution_edit'])->name('contribution-edit');
    Route::get('/terms-and-conditions', [StudentController::class, 'terms_and_conditions']);
    Route::get('/contact-us', [StudentController::class, 'contact_us']);
    Route::get('/profile', [StudentController::class, 'profile'])->name('student.profile');
    Route::patch('/profile', [StudentController::class, 'profile_save'])->name('student.profile-save');
    Route::get('/get-academic-years', [StudentController::class, 'getAcademicYears'])->name('student.get-academic-years');
});

Route::prefix('marketing-manager')->middleware(['auth', 'mm'])->group(function (){
    Route::get('/home', [MarketingManagerController::class, 'home'])->name('mm.home');
    Route::get('/academicYear', [MarketingManagerController::class, 'academicYear'])->name('mm.academicYear');
    Route::get('/profile', [MarketingManagerController::class, 'profile'])->name('mm.profile');
    Route::patch('/profile', [MarketingManagerController::class, 'profile_save'])->name('mm.profile-save');
    Route::match(['get', 'post'], '/contribution', [MarketingManagerController::class, 'contribution'])->name('contribution');
    Route::post('contribution-detail', [MarketingManagerController::class, 'contribution_detail'])->name('mm.contribution-detail');
    Route::match(['get', 'post'], 'download', [MarketingManagerController::class, 'download'])->name('mm.download');
});

Route::prefix('marketing-coordinator')->middleware(['auth', 'mc'])->group(function (){
    Route::get('/home', [MarketingCoordinatorController::class, 'home'])->name('mc.home');
    Route::get('/academicYear', [MarketingCoordinatorController::class, 'academicYear'])->name('mc.academicYear');
    Route::get('/profile', [MarketingCoordinatorController::class, 'profile'])->name('mc.profile');
    Route::patch('/profile', [MarketingCoordinatorController::class, 'profile_save'])->name('mc.profile-save');
    Route::patch('/comment', [MarketingCoordinatorController::class, 'comment'])->name('mc.comment');
    Route::match(['get', 'post'], '/contributions', [MarketingCoordinatorController::class, 'contributions'])->name('contributions');
    Route::match(['get', 'post'],'/contribution-detail', [MarketingCoordinatorController::class, 'contribution_detail'])->name('mc.contribution-detail');
    Route::post( '/approved', [MarketingCoordinatorController::class, 'approved'])->name('approved');
    Route::post( '/rejected', [MarketingCoordinatorController::class, 'rejected'])->name('rejected');
    Route::post( '/allow-guest', [MarketingCoordinatorController::class, 'allow_guest'])->name('allowGuest');
    Route::post( '/un-allow-guest', [MarketingCoordinatorController::class, 'un_allow_guest'])->name('unAllowGuest');
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
