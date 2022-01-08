<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

//list person route
Route::get('/', ([PersonController::class, 'index']))->name('all.persons');

//create person route
Route::get('/persons/create', ([PersonController::class, 'create']))->name('persons.create');
Route::post('/persons/create', ([PersonController::class, 'store']))->name('persons.store');

//edit person route
Route::get('/persons/{id}/edit',([PersonController::class,'edit']))->name('persons.edit');
Route::post('/persons/{id}/edit',([PersonController::class,'update']))->name('persons.update');

//delete person route
Route::get('/persons/{id}/delete',([PersonController::class,'destroy']))->name('persons.destroy');