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

Route::group(['middleware'=>'XSS'], function() {

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
       Route::get('/manager/getProjects/', [DashboardController::class, 'getProjects']);
       Route::get('/manager/project/show', [DashboardController::class, 'showProjects']);
       Route::get('/manager/project/create', [DashboardController::class, 'createProject']);
       Route::post('/manager/project/create', [DashboardController::class, 'createProject']);

       Route::get('/manager/showTeamMembers/{id}', [DashboardController::class, 'showTeamMembers']);
       Route::post('/manager/addTeamMembers/', [DashboardController::class, 'addTeamMembers']);
       Route::get('/manager/removeTeamMember/{pid}/{uid}', [DashboardController::class, 'removeTeamMembers']);

       Route::get('/manager/getTasks/', [DashboardController::class, 'getTasks']);
       Route::get('/manager/tasks/show', [DashboardController::class, 'showTasks']);
       Route::get('/manager/tasks/create', [DashboardController::class, 'createTask']);
       Route::post('/manager/tasks/create', [DashboardController::class, 'createTask']);

       Route::get('/manager/getMembers/', [DashboardController::class, 'getMembers']);
       Route::get('/manager/getProjects/', [DashboardController::class, 'getProjects']);
       
    });

    Route::group(['middleware' => ['TeamMember']], function () {
       Route::get('/employee/dashboard', [DashboardController::class, 'employeeDashboard']);
       Route::get('/employee/getTasks/', [DashboardController::class, 'getEmpTasks']);
       Route::get('/employee/getTasks/{id}', [DashboardController::class, 'getEmpTasks']);
       Route::get('/employee/getProjects/', [DashboardController::class, 'getEmpProjects']);
       Route::get('/employee/tasks/show', [DashboardController::class, 'showEmpTasks']);

       Route::post('/employee/task/update', [DashboardController::class, 'updateEmpTask']);
    });
});
