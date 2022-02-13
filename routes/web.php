<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MarksController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\SubjectsController;
use App\Http\Controllers\Admin\TeachersController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/admin/login');
});

Route::prefix('admin')->group(function() {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    // Route::post('/logout', 'AuthenticationController@logout')->name('logout');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('subjects', SubjectsController::class);
        Route::post('/subjects/datatable', [SubjectsController::class, 'datatable']);
        Route::put('/subject/change-status/{id}', [SubjectsController::class, 'changeStatus']);

        Route::resource('teachers', TeachersController::class);
        Route::post('/teachers/datatable', [TeachersController::class, 'datatable']);
        Route::put('/teachers/change-status/{id}', [TeachersController::class, 'changeStatus']);

        Route::resource('students', StudentsController::class);
        Route::post('/students/datatable', [StudentsController::class, 'datatable']);
        Route::put('/students/change-status/{id}', [StudentsController::class, 'changeStatus']);

        Route::resource('marks', MarksController::class);
        Route::post('/marks/datatable', [MarksController::class, 'datatable']);
        Route::put('/marks/change-status/{id}', [MarksController::class, 'changeStatus']);
    });

});

