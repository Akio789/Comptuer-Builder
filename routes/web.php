<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ComputerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ComponentComputerController;

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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::any('/logout', [AuthenticationController::class, 'logout'])->name('auth.logout');
Route::post('/login', [AuthenticationController::class, 'login'])->name('auth.login');

Route::resource('computers', ComputerController::class);
Route::resource('users', UserController::class);
Route::resource('components', ComponentController::class);
Route::resource('computer.components', ComponentComputerController::class);
