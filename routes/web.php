<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PagesController;

Route::get('/', function () {
    return view('index');
});

Route::get('/pvp', [PagesController::class, 'pvp'])->name('pvp');
Route::post('/pvp', [PagesController::class, 'pvp']);
Route::post('/board/reset', [PagesController::class, 'boardReset'])->name('board.reset');

Route::get('/difficulty', [PagesController::class, 'dificulty']);
Route::get('/pvb', [PagesController::class, 'pvp'])->name('pvb');
Route::post('/pvb', [PagesController::class, 'pvp']);
Route::get('/htp', [PagesController::class, 'htp']);