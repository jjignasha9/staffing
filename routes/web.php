<?php

use App\Http\Controllers\BookingsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceMailController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\PayrollsController;
use App\Http\Controllers\RatesController;
use App\Http\Controllers\ShiftsController;
use App\Http\Controllers\SupervisorsController;
use App\Http\Controllers\TimesheetsController;
use App\Http\Controllers\WorkdaysController;
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
    return redirect()->route('login');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware(['role:1'])->group(function () {

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


/* Invoices */
Route::post('/invoices/store', [InvoicesController::class, 'store'])->name('invoices.store');
Route::get('/invoices/show/{invoice?}', [InvoicesController::class, 'show'])->name('invoices.show');
Route::get('/invoices/draft-invoice/{day_weekend?}', [InvoicesController::class, 'draftinvoice'])->name('invoices.draft-invoice');
Route::get('/invoices/invoice-create/{invoice}', [InvoicesController::class, 'createPdf'])->name('invoice-create');
Route::get('/invoices/sent-invoice', [InvoicesController::class, 'sentinvoice'])->name('invoices.sent-invoice');
Route::get('/invoices/{day_weekend?}', [InvoicesController::class, 'index'])->name('invoices');
Route::post('/invoices/update/{invoice}', [InvoicesController::class, 'update'])->name('invoices.update');
Route::delete('/invoices/destroy/{invoice}', [InvoicesController::class, 'destroy'])->name('timesheets.destroy');



/* Payrolls */
Route::get('/payrolls/create', [PayrollsController::class, 'create'])->name('payrolls.create');
Route::get('/payrolls/paid-payroll', [PayrollsController::class, 'paidpayroll'])->name('payrolls.paid-payroll');
Route::get('/payrolls/{day_weekend?}', [PayrollsController::class, 'index'])->name('payrolls');
Route::post('/payrolls/store', [PayrollsController::class, 'store'])->name('payrolls.store');
Route::get('/payrolls/edit/{payroll}', [PayrollsController::class, 'edit'])->name('payrolls.edit');
Route::get('/payrolls/show/{day_weekend}', [PayrollsController::class, 'show'])->name('payrolls.show');
Route::post('/payrolls/update/{payroll}', [PayrollsController::class, 'update'])->name('payrolls.update');
Route::delete('/payrolls/destroy/{payroll}', [PayrollsController::class, 'destroy'])->name('payrolls.destroy');

});


/* Timesheet */
Route::get('/timesheets', [TimesheetsController::class, 'index'])->name('timesheets')->middleware('role:4|1');
Route::get('/timesheets/create/{weekend?}', [TimesheetsController::class, 'create'])->name('timesheets.create')->middleware('role:2');
Route::post('/timesheets/store', [TimesheetsController::class, 'store'])->name('timesheets.store')->middleware('role:2');
Route::get('/timesheets/edit/{timesheet}', [TimesheetsController::class, 'edit'])->name('timesheets.edit')->middleware('role:2|4');
Route::get('/timesheets/update/{timesheet}', [TimesheetsController::class, 'update'])->name('timesheets.update')->middleware('role:2|4');
Route::get('/timesheets/approved/{timesheet}', [TimesheetsController::class, 'approved'])->name('timesheets.approved')->middleware('role:4');
Route::get('/timesheets/reject/{timesheet}', [TimesheetsController::class, 'reject'])->name('timesheets.reject')->middleware('role:4');
Route::get('/timesheets/pdf/{timesheet}', [TimesheetsController::class, 'createPdf'])->name('timesheets.create-pdf')->middleware('role:2');
Route::post('/timesheets/submit/{timesheet}', [TimesheetsController::class, 'submit'])->name('timesheets.submit')->middleware('role:2');
Route::get('/timesheets/show/{timesheet}', [TimesheetsController::class, 'show'])->name('timesheets.show')->middleware('role:4|1');


Route::middleware(['role:2'])->group(function () {

/* Workdays */
Route::get('/workdays', [WorkdaysController::class, 'index'])->name('workdays');
Route::get('/workdays/create', [WorkdaysController::class, 'create'])->name('workdays.create');
Route::post('/workdays/store', [WorkdaysController::class, 'store'])->name('workdays.store');
Route::get('/workdays/edit/{workday}', [WorkdaysController::class, 'edit'])->name('workdays.edit');
Route::get('/workdays/show/{workday}', [WorkdaysController::class, 'show'])->name('workdays.show');
Route::post('/workdays/update/{workday}', [WorkdaysController::class, 'update'])->name('workdays.update');
Route::delete('/workdays/destroy/{workday}', [WorkdaysController::class, 'destroy'])->name('workdays.destroy');

});


/* Bookings */

Route::get('/bookings', [BookingsController::class, 'index'])->name('bookings');
Route::post('/bookings/store', [BookingsController::class, 'store'])->name('bookings.store');
Route::get('/bookings/show/{id}', [BookingsController::class, 'show'])->name('bookings.show');
Route::post('/bookings/update/{id}', [BookingsController::class, 'update'])->name('bookings.update');
Route::get('/bookings/edit/{id}', [BookingsController::class, 'edit'])->name('bookings.edit');
Route::post('/bookings/destroy/{id}', [BookingsController::class, 'destroy'])->name('bookings.destroy');
