<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard.index');
});

Route::get('/login', function () {
    return view('pages.auth.login');
});

Route::get('/category', function () {
    return view('pages.category.index');
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