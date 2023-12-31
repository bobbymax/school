<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('clearance/access/fee', 'DashboardController@clearance')->name('access.fee');
Route::get('clearance/{type}', 'DashboardController@checkers')->name('check.clearance');
Route::resource('students', 'StudentController');
Route::resource('departments', 'DepartmentController');
Route::resource('levels', 'LevelController');
Route::resource('programs', 'ProgramController');
Route::resource('clearances', 'ClearanceController');
Route::resource('complains', 'ComplainController');

