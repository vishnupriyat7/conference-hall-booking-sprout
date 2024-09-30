<?php

use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\SectionController;
use App\Http\Controllers\HallsController;

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
Route::group(['prefix' => 'superadmin', 'middleware' => ['web', 'isSuperAdmin']], function () {
    Route::get('dashboard', [SuperAdminController::class, 'dashboard'])->name('dashboard');
    Route::get('users', [SuperAdminController::class, 'users'])->name('superAdminUsers');
    Route::get('manage-role', [SuperAdminController::class, 'manageRole'])->name('manageRole');
    Route::get('update-role', [SuperAdminController::class, 'updateRole'])->name('updateRole');
    //Section CRUD
    Route::get('sections', [SectionController::class, 'sections'])->name('AdminSections');
    Route::get('sections-create', [SectionController::class, 'create'])->name('sections.create');
    Route::post('sections', [SectionController::class, 'store'])->name('sections.store');
    // Route to edit a section
    Route::get('/sections/{id}/edit', [SectionController::class, 'edit'])->name('sections.edit');
    // Route to update a section
    Route::put('/sections/{id}', [SectionController::class, 'update'])->name('sections.update');

    // Route to delete a section
    Route::delete('/sections/{id}', [SectionController::class, 'destroy'])->name('sections.destroy');

    //Hall Crud

    Route::get('halls', [HallsController::class, 'halls'])->name('AdminHalls');
    Route::get('halls-create', [HallsController::class, 'create'])->name('halls.create');
    Route::post('halls', [HallsController::class, 'store'])->name('halls.store');

    // Book Hall route to show calendar
    Route::get('book-hall', [HallsController::class, 'bookHall'])->name('bookHall');

    // Route to show the booking form
    Route::get('book-hall/form', [HallsController::class, 'showBookingForm'])->name('hallBooking.form');

    // Route to store the booking details
    Route::post('book-hall', [HallsController::class, 'storeBooking'])->name('hallBooking.store');



    // Route to edit a section
    Route::get('/halls/{id}/edit', [HallsController::class, 'edit'])->name('halls.edit');
    // Route to update a section
    Route::put('/halls/{id}', [HallsController::class, 'update'])->name('halls.update');

    // Route to delete a section
    Route::delete('/halls/{id}', [HallsController::class, 'destroy'])->name('halls.destroy');
});

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'isAdmin']], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard']);
});

Route::group(['middleware' => ['web', 'isUser']], function () {
    Route::get('dashboard', [UserController::class, 'dashboard']);
});


Route::get('/register', [AuthController::class, 'loadRegister']);
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('/login', function () {
    return redirect('/');
});
Route::get('/', [AuthController::class, 'loadLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout']);
