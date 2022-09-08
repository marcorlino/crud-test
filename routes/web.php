<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Firebase\ContactController;


Route::get('contacts', [ContactController::class, 'index']); 

Route::get('add-contact', [ContactController::class, 'create']); 

Route::post('add-contact', [ContactController::class, 'store']);  

Route::get('edit-contact/{id}', [ContactController::class, 'edit']);  

Route::put('update-contact/{id}', [ContactController::class, 'update']);  

// Route::get('delete-contact/{id}', [ContactController::class, 'destroy']);  
Route::delete('delete-contact/{id}', [ContactController::class, 'destroy']);  

Route::get('/', function () {
    return view('welcome');
});
