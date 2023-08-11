<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;

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
    return view('home');
});

Route::get('/logout', [LoginController::class, 'logout']);

Route::namespace ('Auth')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegisterForm']);
    Route::post('/register', [RegisterController::class, 'createUser']);
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.get');
    Route::post('login', [LoginController::class, 'submitLoginForm'])->name('login.post');
    Route::post('chkemailexists', [RegisterController::class, 'chkemailExists']);
    
});

Route::group(['middleware' => ['Manager']], function () {
   Route::get('/manager/dashboard', [DashboardController::class, 'managerDashboard']);
});
