<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ShiftsController;

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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

/* Employee */
Route::get('/employees', [EmployeesController::class, 'index'])->name('employees');

Route::get('/employees/create', [EmployeesController::class, 'create'])->name('employees.create');

Route::post('/employees/store', [EmployeesController::class, 'store'])->name('employees.store');

Route::get('/employees/edit/{employee}', [EmployeesController::class, 'edit'])->name('employees.edit');

Route::post('/employees/update/{user}', [EmployeesController::class, 'update'])->name('employees.update');

Route::delete('/employees/destroy/{employee}', [EmployeesController::class, 'destroy'])->name('employees.destroy');



/* Shift */

Route::get('/shifts', [ShiftsController::class, 'index'])->name('shifts');

Route::get('/shifts/create', [ShiftsController::class, 'create'])->name('shifts.create');

Route::post('/shifts/store', [ShiftsController::class, 'store'])->name('shifts.store');

Route::get('/shifts/edit/{shift}', [ShiftsController::class, 'edit'])->name('shifts.edit');

Route::post('/shifts/update/{shift}', [ShiftsController::class, 'update'])->name('shifts.update');

Route::delete('/shifts/destroy/{shift}', [ShiftsController::class, 'destroy'])->name('shifts.destroy');