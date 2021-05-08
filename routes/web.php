<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ComputerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ComponentComputerController;
use App\Http\Controllers\ComponentMotherboardController;
use App\Http\Controllers\MotherboardController;

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

Route::get('/', [ComputerController::class, 'public'])->name('index');
Route::get('/login', function () {
    return view('index');
})->name('auth.login');

Route::any('/logout', [AuthenticationController::class, 'logout'])->name('auth.logout');
Route::post('/login', [AuthenticationController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthenticationController::class, 'registerForm'])->name('auth.registerForm');
Route::post('/register', [AuthenticationController::class, 'register'])->name('auth.register');

Route::resource('computers', ComputerController::class)
    ->middleware('auth');
Route::put('/computers/{computer}/publish', [ComputerController::class, 'publish'])->name('computers.publish');

Route::resource('users', UserController::class)
    ->middleware('auth');
Route::resource('components', ComponentController::class)
    ->middleware('auth');
Route::resource('computer.components', ComponentComputerController::class)
    ->middleware('auth');
Route::resource('motherboards', MotherboardController::class)
    ->middleware('auth');
Route::resource('slots', ComponentMotherboardController::class)
    ->middleware('auth');

Route::get('/component/chooseType', [ComponentController::class, 'chooseType'])->name('components.chooseType');
