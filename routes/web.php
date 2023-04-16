<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ContentController::class, 'index']);
Route::get('/content', [ContentController::class, 'index']);
Route::get('/content/create', [ContentController::class, 'create']);
Route::get('/content/{id}/edit', [ContentController::class, 'edit']);

Route::post('/content', [ContentController::class, 'store']);
Route::put('/content/{id}', [ContentController::class, 'update']);
Route::delete('/content/{id}', [ContentController::class, 'destroy']);
