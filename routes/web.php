<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TTTEoginController;

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

Route::get('/', function() {
    return view('welcome');
});

Route::get('/login',[AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'checklogin']);
Route::get('/logout', [AuthController::class, 'logout']);


//auth.admin คือ middleware AuthAdmin ที่ต้้งชื่อไว้ใน Kernalfile
Route::middleware(['auth.admin'])->group(function(){
    Route::get('/content', [ContentController::class, 'index']);
    Route::get('/content/create', [ContentController::class, 'create']);
    Route::get('/content/{id}/edit', [ContentController::class, 'edit']);
    
    Route::post('/content', [ContentController::class, 'store']);
    Route::put('/content/{id}', [ContentController::class, 'update']);
    Route::delete('/content/{id}', [ContentController::class, 'destroy']);
});

