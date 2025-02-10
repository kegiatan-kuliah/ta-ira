<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('pages.dashboard.index');
});

Route::get('/login', function () {
    return view('pages.auth.login');
});

Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/new', 'new')->name('new');
    Route::get('/{id}', 'edit')->name('edit');
    Route::post('/', 'store')->name('store');
    Route::put('/', 'update')->name('update');
    Route::get('/destroy/{id}', 'destroy')->name('destroy');
});

Route::get('/incoming', function () {
    return view('pages.incoming.index');
});

Route::get('/incoming/new', function () {
    return view('pages.incoming.new');
});

Route::get('/outgoing', function () {
    return view('pages.outgoing.index');
});

Route::get('/outgoing/new', function () {
    return view('pages.outgoing.new');
});