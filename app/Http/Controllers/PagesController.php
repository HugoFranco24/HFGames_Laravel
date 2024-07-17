<?php

namespace App\Http\Controllers;
use App\Services\JogoDoGalo;

class PagesController extends Controller{

    public function pvp(){

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
            return view('pvp', [
                'board' => $board,
                'player' => $player,
                'tp' => $tpp,
                'win' => $win,
                'score' => [$score1,$score2]
            ]);
        }else{
            return view('pvb', [
                'difficulty' => $difficulty,
                'board' => $board,
                'player' => $player,
                'tp' => $tpp,
                'win' => $win,
                'score' => [$score1,$score2]
            ]);
        }
    }

    public function boardReset(){        

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

    public function dificulty(){
        return view('dificulty');
    }

    public function htp(){
        return view('how-to-play');
    }
}