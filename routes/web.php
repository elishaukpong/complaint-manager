<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\CustomerController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', \App\Http\Controllers\DashboardController::class)->name('dashboard');

    Route::resource('branches', BranchController::class);

    Route::resource('users', CustomerController::class);
    Route::resource('managers', ManagerController::class);
    Route::resource('customers', CustomerController::class);
});
