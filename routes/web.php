<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use \App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\ChoosingBusinessFormController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-service', [HomeController::class, 'termsService'])->name('terms-service');
Route::get('/payment', [HomeController::class, 'payment'])->name('payment');
Route::get('/success', [HomeController::class, 'success'])->name('success');

Route::resource('choosing-business-forms', ChoosingBusinessFormController::class)->middleware('auth');
Route::post('/choosing-business-form', [ChoosingBusinessFormController::class, 'store'])->name('choosing-business-form.store');
Route::post('/choosing-business-form/save', [ChoosingBusinessFormController::class, 'save'])->name('choosing-business-form.save');



Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::resource('plans', PlanController::class);
    Route::resource('site-info', SiteInfoController::class);
});
