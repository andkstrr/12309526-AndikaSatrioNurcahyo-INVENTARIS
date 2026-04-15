<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\LendingController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isStaff;

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

// AUTHENTICATION
Route::get('/login', [AuthController::class, 'show_login'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN ROUTES
Route::middleware(['isAdmin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'admin_dashboard'])->name('dashboard');

        // CATEGORIES
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/store', [CategoryController::class, 'store'])->name('store');
            Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');
            Route::put('/update/{category}', [CategoryController::class, 'update'])->name('update');
        });

        // ITEMS
        Route::prefix('items')->name('items.')->group(function () {
            Route::get('/', [ItemController::class, 'index'])->name('index');
            Route::get('/create', [ItemController::class, 'create'])->name('create');
            Route::post('/store', [ItemController::class, 'store'])->name('store');
            Route::get('/edit/{item}', [ItemController::class, 'edit'])->name('edit');
            Route::put('/update/{item}', [ItemController::class, 'update'])->name('update');
            Route::get('/lending/{item}', [ItemController::class, 'lending'])->name('lending');
            Route::get('/export', [ItemController::class, 'export'])->name('export');
        });

        // ACCOUNTS
        Route::prefix('accounts')->name('accounts.')->group(function () {
            Route::prefix('admin')->name('admin.')->group(function () {
                Route::get('/', [AccountController::class, 'index_admin'])->name('index');
                Route::get('/create', [AccountController::class, 'create'])->name('create');
                Route::post('/store', [AccountController::class, 'store'])->name('store');
                Route::get('/edit/{user}', [AccountController::class, 'edit'])->name('edit');
                Route::put('/update/{user}', [AccountController::class, 'update'])->name('update');
                Route::delete('/delete/{user}', [AccountController::class, 'destroy'])->name('destroy');
                Route::get('/export', [AccountController::class, 'export'])->name('export');
            });

            Route::prefix('staff')->name('staff.')->group(function () {
                Route::get('/', [AccountController::class, 'index_staff'])->name('index');
                Route::put('/reset-password/{user}', [AccountController::class, 'reset_password'])->name('reset_password');
            });
        });
    });
});

// STAFF ROUTES
Route::middleware(['isStaff'])->group(function () {
    Route::prefix('staff')->name('staff.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'staff_dashboard'])->name('dashboard');

        // ITEMS
        Route::prefix('items')->name('items.')->group(function () {
            Route::get('/', [ItemController::class, 'index_staff'])->name('index');
        });

        // LENDINGS
        Route::prefix('lendings')->name('lendings.')->group(function () {
            Route::get('/', [LendingController::class, 'index'])->name('index');
            Route::get('/create', [LendingController::class, 'create'])->name('create');
            Route::post('/store', [LendingController::class, 'store'])->name('store');
            Route::patch('/update/{lending}', [LendingController::class, 'update'])->name('update');
            Route::delete('/delete/{lending}', [LendingController::class, 'destroy'])->name('destroy');
            Route::get('/export', [LendingController::class, 'export'])->name('export');
        });

        // ACCOUNTS
        Route::prefix('accounts')->name('accounts.')->group(function () {
            Route::get('/edit/{user}', [AccountController::class, 'edit_staff'])->name('edit');
            Route::put('/update/{user}', [AccountController::class, 'update_staff'])->name('update');
        });
    });
});
