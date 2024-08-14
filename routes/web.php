<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\todosController::class,'index'])->name('todo.home');
Route::get('/create',function (){
    return view('create');
})->name('todo.create');
//Route::post('/store',[\App\Http\Controllers\todosController::class,'store'])->name('todo.edit');
//edit todo route
Route::get('/edit/{id}',[todosController::class,'edit'])->name("todo.edit");

//update todo route
Route::post('/update', [todosController::class,'updateData'])->name("todo.updateData");

//store todo route
Route::post('/create', [todosController::class,'store'])->name("todo.store");

//delete toto route
Route::get('/delete/{id}', [todosController::class,'delete'])->name("todo.delete");
