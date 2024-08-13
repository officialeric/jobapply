<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form',[FormController::class, 'index']) -> name('form');
Route::post('/apply',[FormController::class, 'apply']) -> name('apply');
