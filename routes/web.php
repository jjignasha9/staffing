<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ShiftsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\SupervisorsController;
use App\Http\Controllers\RatesController;


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


/* Clients */
Route::get('/clients', [ClientsController::class, 'index'])->name('clients');

Route::get('/clients/create', [ClientsController::class, 'create'])->name('clients.create');

Route::post('/clients/store', [ClientsController::class, 'store'])->name('clients.store');

Route::get('/clients/edit/{client}', [ClientsController::class, 'edit'])->name('clients.edit');

Route::post('/clients/update/{user}', [ClientsController::class, 'update'])->name('clients.update');

Route::delete('/clients/destroy/{client}', [ClientsController::class, 'destroy'])->name('clients.destroy');


/* Supervisors */
Route::get('/supervisors', [SupervisorsController::class, 'index'])->name('supervisors');

Route::get('/supervisors/create/{client_id}', [SupervisorsController::class, 'create'])->name('supervisors.create');

Route::post('/supervisors/store', [SupervisorsController::class, 'store'])->name('supervisors.store');

Route::get('/supervisors/edit/{supervisor}', [SupervisorsController::class, 'edit'])->name('supervisors.edit');

Route::post('/supervisors/update/{user}', [SupervisorsController::class, 'update'])->name('supervisors.update');

Route::delete('/supervisors/destroy/{supervisor}', [SupervisorsController::class, 'destroy'])->name('supervisors.destroy');


/* Rates */
Route::get('/rates', [RatesController::class, 'index'])->name('rates');

Route::get('/rates/create', [RatesController::class, 'create'])->name('rates.create');

Route::post('/rates/store', [RatesController::class, 'store'])->name('rates.store');

Route::get('/rates/edit/{rate}', [RatesController::class, 'edit'])->name('rates.edit');

Route::post('/rates/update/{rate}', [RatesController::class, 'update'])->name('rates.update');

Route::delete('/rates/destroy/{rate}', [RatesController::class, 'destroy'])->name('rates.destroy');



