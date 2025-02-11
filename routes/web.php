<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\OutController;
use App\Http\Controllers\InController;
use App\Http\Controllers\DispositionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::controller(AuthController::class)->prefix('auth')->name('auth.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/login', 'login')->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(DashboardController::class)->name('dashboard.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    
    Route::controller(AgendaController::class)->prefix('agenda')->name('agenda.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    
    Route::controller(DispositionController::class)->prefix('disposition')->name('disposition.')->group(function () {
        Route::get('/new/{letterId}', 'new')->name('new');
        Route::get('/print/{id}', 'print')->name('print');
        Route::post('/store', 'store')->name('store');
    });
    
    Route::controller(OutController::class)->prefix('out')->name('out.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/report', 'report')->name('report');
        Route::get('/new', 'new')->name('new');
        Route::get('/{id}', 'edit')->name('edit');
        Route::post('/', 'store')->name('store');
        Route::post('/update', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    
    Route::controller(InController::class)->prefix('in')->name('in.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/report', 'report')->name('report');
        Route::get('/new', 'new')->name('new');
        Route::get('/{id}', 'edit')->name('edit');
        Route::post('/', 'store')->name('store');
        Route::post('/update', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    
    Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/new', 'new')->name('new');
        Route::get('/{id}', 'edit')->name('edit');
        Route::post('/', 'store')->name('store');
        Route::put('/', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    
    Route::controller(LevelController::class)->prefix('level')->name('level.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/new', 'new')->name('new');
        Route::get('/{id}', 'edit')->name('edit');
        Route::post('/', 'store')->name('store');
        Route::put('/', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    
    Route::controller(EmployeeController::class)->prefix('employee')->name('employee.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/new', 'new')->name('new');
        Route::get('/{id}', 'edit')->name('edit');
        Route::post('/', 'store')->name('store');
        Route::put('/', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
});