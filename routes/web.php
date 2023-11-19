<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
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

Route::controller(LoginController::class)->group(function () {
    Route::get("/", 'index');
    Route::get("/login", 'index')->name('login');
    Route::post("/check-login", 'checkLogin');
});

Route::middleware(['auth'])->group(function() {

    Route::controller(MainController::class)->group(function () {
        Route::get("/home", 'index')->name('home');
        Route::get("/logout", 'logout')->name('logout');
    });

    Route::prefix('students')->controller(StudentController::class)->group(function () {
        Route::get("", 'index')->name('students');
        Route::post("/store", 'store')->name('students.store');
        Route::put("/update/{student}", 'update')->name('students.update');
        Route::delete("/delete/{student}", 'delete')->name('students.delete');
        Route::get('/export', 'export')->name('students.export');
        Route::post('/import', 'import')->name('students.import');

        Route::get('/statistics', 'showChart')->name('students.statistics');
    });

});