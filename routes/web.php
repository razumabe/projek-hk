<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StakeholderController;

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
    return view('index', ['title' => 'Homepage']);
})->name('home');

Route::get('/dashboard', function () {
    return view('admin/index');
})->name('admin');

Route::get('/test', function () {
    return view('test');
});



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/password', [StakeholderController::class, 'password'])->name('password');
Route::post('/password/{id}', [StakeholderController::class, 'passstore'])->name('password.store');

Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
Route::get('/payment/store', [PaymentController::class, 'store'])->name('payment.store'); // Harusnya POST

// Rute-rute yang hanya bisa diakses oleh admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users',[PenggunaController::class, 'index'])->name('users');
    Route::get('/admin/users/create',[PenggunaController::class, 'create'])->name('create.users');
    Route::post('/admin/users/store',[PenggunaController::class, 'store']);
    Route::get('/admin/users/{id}/edit',[PenggunaController::class, 'edit']);
    Route::put('/admin/users/{id}',[PenggunaController::class, 'update']);
    Route::delete('/admin/users/{id}',[PenggunaController::class, 'destroy']);
    Route::put('/admin/users/reset-password/{nim}', [PenggunaController::class, 'resetPassword'])->name('users.reset-password');

    // Pembayaran
    Route::get('/admin/payment',[PaymentController::class, 'adminIndex'])->name('admin.payment');
});


// Rute-rute yang hanya bisa diakses oleh pengajar
Route::middleware(['auth', 'pengajar'])->group(function () {
    Route::get('/santri',[SantriController::class, 'index'])->name('santris');
    Route::get('/santri/create',[SantriController::class, 'create'])->name('create.santris');
    Route::post('/santri/store',[SantriController::class, 'store']);
    Route::get('/santri/{id}/edit',[SantriController::class, 'edit']);
    Route::put('/santri/{id}',[SantriController::class, 'update']);
    Route::delete('/santri/{id}',[SantriController::class, 'destroy']);
    Route::post('/import/santri', [SantriController::class, 'importSantri'])->name('import.santri');

    Route::get('/exam',[ExamController::class, 'index'])->name('exam');
});

Route::middleware(['auth', 'mahasantri'])->group(function () {
    //
});

Route::middleware(['auth', 'santri'])->group(function () {
    //
});





