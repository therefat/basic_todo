<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\todosController::class,'index'])->name('todo.home');
Route::get('/create',function (){
    return view('create');
})->name('todo.create');


Route::get('/edit/{id}',[\App\Http\Controllers\todosController::class,'edit'])->name('todo.edit');

Route::post('/update', [\App\Http\Controllers\todosController::class,'updateData'])->name("todo.updateData");


Route::post('/create', [\App\Http\Controllers\todosController::class,'store'])->name("todo.store");


Route::get('/delete/{id}', [\App\Http\Controllers\todosController::class,'delete'])->name("todo.delete");
