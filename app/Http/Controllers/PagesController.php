<?php

namespace App\Http\Controllers;
use App\Services\JogoDoGalo;
use App\Services\RockPaperScissors;

class PagesController extends Controller{

    /* START of TicTacToe PagesController*/
    public function TTTpvp(){

        //input with default values
        $difficulty = request('difficulty');         
        $win = 0;
        $board = request()->has('board') ? request('board') : array_fill(0,9,null);
        $tpp = request()->has('tp') ? request('tp') : 0;        
        $score1 = request()->has('score1') ? request('score1') : 0;
        $score2 = request()->has('score2') ? request('score2') : 0;
        $player = request()->has('player') ? request('player') : true;

        if(request()->has('action')){
            if($difficulty == null){
                $win = JogoDoGalo::play($board, $player, $tpp, request('action'));
            }else{
                $win = JogoDoGalo::playBot($board, $player, $tpp, $difficulty, request('action'));
            }
        }

        if($difficulty == null){
            return view('TicTacToe.pvp', [
                'board' => $board,
                'player' => $player,
                'tp' => $tpp,
                'win' => $win,
                'score' => [$score1,$score2]
            ]);
        }else{
            return view('TicTacToe.pvb', [
                'difficulty' => $difficulty,
                'board' => $board,
                'player' => $player,
                'tp' => $tpp,
                'win' => $win,
                'score' => [$score1,$score2]
            ]);
        }
    }

    public function TTTboardReset(){        

        $score1 = request('score1');
        $score2 = request('score2');
        $difficulty = request('difficulty');
        
        if($difficulty == null){
            return redirect()->route('pvp', [            
                'score1' => $score1,
                'score2' => $score2,
            ]);
        }else{
            return redirect()->route('pvb', [            
                'score1' => $score1,
                'score2' => $score2,
                'difficulty' => $difficulty
            ]);
        }
    }

    public function TTTdificulty(){
        return view('TicTacToe.dificulty');
    }

    public function TTThtp(){
        return view('TicTacToe.how-to-play');
    }
    /* END of TicTacToe PagesController*/




    /* START of RockPaperScissors PagesController*/
    public function RPSpvp(){

        //input with default values
        $bestOf = request()->has('bestOf') ? request('bestOf') : abort(403);
        $against = request()->has('against') ? request('against') : abort(403);  
        $win = -1;
        $score1 = request()->has('score1') ? request('score1') : 0;
        $score2 = request()->has('score2') ? request('score2') : 0;

        $hplay1 = request()->has('hplay1') ? request('hplay1') : null;
        $hplay2 = request()->has('hplay2') ? request('hplay2') : null;
        
        $play1 = request()->has('play1') ? request('play1') : $hplay1;
        $play2 = request()->has('play2') ? request('play2') : $hplay2;

        if(request()->has('play1') or request()->has('play2')){
            if($against == 'player'){
                $win = RockPaperScissors::checkWin($play1, $play2, $score1, $score2);
            }else{
                $win = RockPaperScissors::playBot($play1, $play2, $score1, $score2);
            }
        }

        return view('RockPaperSciss.pvp', [
            'play1' => $play1,
            'play2' => $play2,
            'win' => $win,
            'score' => [$score1,$score2],
            'bestOf' => $bestOf,
            'against' => $against
        ]);
    }


    public function RPSboardReset(){
        $score1 = request('score1');
        $score2 = request('score2');
        $bestOf = request()->has('bestOf') ? request('bestOf') : abort(403);
        $against = request()->has('against') ? request('against') : abort(403);
        
        return redirect()->route('RPSpvp', [            
            'score1' => $score1,
            'score2' => $score2,
            'bestOf' => $bestOf,
            'against' => $against
        ]);
    }

    public function bestOf(){
        return view('RockPaperSciss.bestOf');
    }
    /* END of RockPaperScissors PagesController*/




    /* START of Hangman PagesController*/

    /* END of Hangman PagesController*/
}