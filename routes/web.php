<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'data' => "Shaqil"
    ]);
});

// get data
Route::get('/user', [UserController::class, 'index']);
// buat data
Route::post('/user/store' ,[UserController::class, 'store']);
// edit data
Route::get('/user/edit/{id}', [UserController:: class, 'edit']);

// Route::resource('user', UserController::class);
