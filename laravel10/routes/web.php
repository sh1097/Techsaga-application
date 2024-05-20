<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ApplicationController::class, 'index'])->name('applications.list');
Route::get('/application',[ApplicationController::class,'create'])->name('application.create');
Route::post('/application',[ApplicationController::class,'store'])->name('application.store');
Route::get('applications/{application}', [ApplicationController::class, 'show'])->name('application.show');
Route::get('applications/{application}/edit', [ApplicationController::class, 'edit'])->name('application.edit');
Route::put('applications/{application}',[ApplicationController::class, 'update'])->name('application.update');
Route::delete('applications/{application}', [ApplicationController::class, 'destroy'])->name('application.destroy');
Route::put('applications/{application}/approve', [ApplicationController::class, 'approve'])->name('application.approve');
Route::put('applications/{application}/reject', [ApplicationController::class, 'reject'])->name('application.reject');
Route::get('login', [ApplicationController::class, 'showLoginForm'])->name('login');
Route::post('login', [ApplicationController::class, 'login']);
