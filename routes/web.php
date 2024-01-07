<?php

use App\Events\HelloEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [MainController::class, 'index'])->name('home')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('actionLogin')->middleware('guest');
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/', [ChatController::class, 'saveMessage'])->name('chat.save');
Route::get('/load/{room}', [ChatController::class, 'loadMessage'])->name('chat.load');
Route::post('/room', [RoomController::class, 'create'])->name('room.create');
