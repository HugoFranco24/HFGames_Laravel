<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PagesController;

Route::get('/', function () {
    return view('index');
});

//TicTacToe views
Route::get('/tic-tac-toe', function () {
    return view('TicTacToe.GaloMenu');
});
Route::get('/tic-tac-toe/pvp', [PagesController::class, 'TTTpvp'])->name('pvp');
Route::post('/tic-tac-toe/pvp', [PagesController::class, 'TTTpvp']);
Route::post('/tic-tac-toe/board/reset', [PagesController::class, 'TTTboardReset'])->name('board.reset');
Route::get('/tic-tac-toe/difficulty', [PagesController::class, 'TTTdificulty']);
Route::get('/tic-tac-toe/pvb', [PagesController::class, 'TTTpvp'])->name('pvb');
Route::post('/tic-tac-toe/pvb', [PagesController::class, 'TTTpvp']);
Route::get('/tic-tac-toe/htp', [PagesController::class, 'TTThtp']);
//end of TicTacToe views


//RockPaperScissors views
Route::get('/rock-paper-scissors', function () {
    return view('RockPaperSciss.rpsMenu');
});
Route::get('/rock-paper-scissors/pvp', [PagesController::class, 'RPSpvp'])->name('RPSpvp');
Route::post('/rock-paper-scissors/pvp', [PagesController::class, 'RPSpvp']);
Route::get('/rock-paper-scissors/best-of', [PagesController::class, 'bestOf'])->name('bestOf');

Route::post('/rock-paper-scissors/board/reset', [PagesController::class, 'RPSboardReset']);

Route::get('/rock-paper-scissors/pvb', [PagesController::class, 'RPSpvp'])->name('RPSpvb');
Route::post('/rock-paper-scissors/pvb', [PagesController::class, 'RPSpvp']);

Route::get('/rock-paper-scissors/how-to-play', [PagesController::class, 'RPShtp']);
//end of RockPaperScissors views


//Hangman views
Route::get('/hangman', function () {
    return view('Hangman.menu');
});
Route::get('/hangman/play', [PagesController::class, 'Hplay'])->name('Hplay');
Route::post('/hangman/play', [PagesController::class, 'Hplay']);
Route::get('/hangman/config', [PagesController::class, 'Hconfig'])->name('Hconfig');
Route::get('/hangman/how-to-play', [PagesController::class, 'Hhtp']);
//end of Hangman views