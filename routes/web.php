<?php

use App\Http\Controllers\StudentController;
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


Route::prefix('students')->controller(StudentController::class)->group(function () {
    Route::get("", 'index')->name('students');
    Route::post("/store", 'store')->name('students.store');
    Route::put("/update/{student}", 'update')->name('students.update');
    Route::delete("/delete/{student}", 'delete')->name('students.delete');
    Route::get('/export', 'export')->name('students.export');
    Route::post('/import', 'import')->name('students.import');

    Route::get('/statistics', 'showPieChart')->name('students.statistics');
});