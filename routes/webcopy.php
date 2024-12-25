<?php

use App\Http\Controllers\TestController;
use App\Http\Middleware\CobacobaMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(TestController::class)->group(function () {
    Route::get('/greetings/{data}', 'index')->name('greet');
    Route::get('/nigger', 'index')->name('nigga');
    Route::get('/else', 'index')->name('else');

});
