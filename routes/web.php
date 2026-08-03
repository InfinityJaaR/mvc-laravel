<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\LugarController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/lugares');

Route::get('/lugares', [LugarController::class, 'index'])->name('lugares.index');
Route::get('/lugares/{id}', [LugarController::class, 'show'])
    ->whereNumber('id')
    ->name('lugares.show');

Route::get('/contacto', [ContactoController::class, 'create'])->name('contacto.create');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');
