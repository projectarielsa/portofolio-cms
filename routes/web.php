<?php

use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController as AdminExperienceController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\ResumeController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\AccountController;


Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/projects', [PublicController::class, 'projects'])->name('projects');
Route::get('/projects/{project:slug}', [PublicController::class, 'projectShow'])->name('projects.show');
Route::get('/services', [PublicController::class, 'services'])->name('services');
Route::get('/experiences', [PublicController::class, 'experiences'])->name('experiences');
Route::get('/skills', [PublicController::class, 'skills'])->name('skills');
Route::get('/testimonials', [PublicController::class, 'testimonials'])->name('testimonials');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('projects', AdminProjectController::class);
    Route::get('about/edit', [AdminAboutController::class, 'edit'])->name('about.edit');
    Route::put('about', [AdminAboutController::class, 'update'])->name('about.update');
    Route::resource('services', AdminServiceController::class)->except('show');
    Route::resource('experiences', AdminExperienceController::class)->except('show');
    Route::resource('skills', AdminSkillController::class)->except('show');
    Route::resource('testimonials', AdminTestimonialController::class)->except('show');
    Route::resource('educations', EducationController::class)->except(['show']);
    Route::resource('resumes', ResumeController::class)->except('show');
    Route::get('/account', [AccountController::class, 'edit'])->name('account.edit');
    Route::put('/account/email', [AccountController::class, 'updateEmail'])->name('account.email');
    Route::put('/account/password', [AccountController::class, 'updatePassword'])->name('account.password');
});

require __DIR__.'/auth.php';
