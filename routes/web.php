<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/hello', function () {
    return '<a>Hello</a>';
})->name('hello');

Route::get('/hallo', function () {
    // return redirect('/hello');
    return redirect()->route('hello');
});

Route::get('/greet/{name}', function ($name) {
    return  "Hello {$name}!";
});

Route::fallback(function () {
    return "No Route Found!";
});
