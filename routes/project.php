<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Route::get('/project', [ProjectController::class, 'index']);
// Route::get('/project/create', [ProjectController::class, 'create']);
// Route::post('/project', [ProjectController::class, 'store']);
// Route::get('/project/{id}', [ProjectController::class, 'show']);
// Route::get('/project/{id}/edit', [ProjectController::class, 'edit']);
// Route::put('/project/{id}', [ProjectController::class, 'update']);
// Route::patch('/project/{id}', [ProjectController::class, 'update']);
// Route::delete('/project/{id}', [ProjectController::class, 'destroy']);

//Route::resource = tutti i metodi (get,post,put,patch, delete) associati ai rispettivi 7 metodi (index,create store, ecc...) riportati sopra
Route::resource('/project', ProjectController::class)->middleware(['auth', 'verified']);
//aggiungo il middleware per proteggere tutte le rotte 'project': richiedendo un login per accedervi
