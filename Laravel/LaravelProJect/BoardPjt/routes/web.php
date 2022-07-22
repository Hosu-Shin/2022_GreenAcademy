<?php

use App\Http\Controllers\BoardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/board', [BoardController::class, 'index']);
Route::get('/board/create', [BoardController::class, 'create'])->name('boards.create');
Route::get('/board/show', [BoardController::class, 'show'])->name('boards.show');