<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

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
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/search/{name}', [UserController::class, 'searchByName'])->name('users.searchByName');
Route::get('/users/filter', [UserController::class, 'filterByDateOfBirth'])->name('users.filterByDateOfBirth');
Route::get('/crear-usuario', [UserController::class, 'create'])->name('crear-usuario');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

