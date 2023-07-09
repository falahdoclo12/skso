<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\PlbController;
use App\Http\Controllers\RtbController;
use App\Http\Controllers\BoqController;
use App\Http\Controllers\QosController;
use App\Http\Controllers\Admin\BOQ\IndexController as AdminBoqController;
use App\Http\Controllers\User\ProjectController as UserProjectController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
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


//route for login and logout
// Route::get('/', [UserProjectController::class, 'index'])->name('index');
Route::get('/', [LoginController::class, 'showLoginForm'])->name('landing');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//feature Routes
Route::middleware('auth')->group(function () {
    Route::resource('plb', PlbController::class);
    Route::post('/save-pdf', [PlbController::class, 'savePdf'])->name('save-pdf');
    Route::resource('rtb', RtbController::class);
    Route::resource('rute', RuteController::class)->except('store'); // Exclude the store method
    Route::post('rute', [RuteController::class, 'store'])->name('rute.store'); // Add the store route
    Route::resource('boq', BoqController::class);
    Route::get('/boq/download/{id}', 'BoqController@download')->name('boq.download');
    Route::resource('qos', QosController::class)->only(['index', 'create', 'store', 'destroy']);
    Route::post('/qos', [QosController::class, 'store'])->name('qos.store');
    Route::get('qos/download/{id}', [QosController::class, 'download'])->name('qos.download');
    Route::get('/search', 'SearchController@search')->name('search');

});

//admin Routes
Route::middleware('auth:web')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::resource('user', UserController::class);
        Route::get('/projects/create', 'ProjectController@create')->name('project.create');
        Route::post('/projects', 'ProjectController@store')->name('projects.store');
        Route::resource('admin-projects', AdminProjectController::class);

        // BOQ

        Route::get('/boq', [AdminBoqController::class, 'index'])->name('admin.boq.index');
        Route::post('/boq/store', [AdminBoqController::class, 'store'])->name('admin.boq.store');
    });
});

// user Routes
Route::middleware('auth')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('user/dashboard', [UserDashboardController::class, 'Dashboard'])->name('user.dashboard');
        Route::resource('user-project', UserProjectController::class);
        Route::resource('infrastructure-route', RuteController::class);
    });
});
