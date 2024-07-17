<?php

namespace App\Services;

use Illuminate\Support\Collection;


class RockPaperScissors
{

    public $board;

    public static function checkWin(&$play1, &$play2, &$score1, &$score2) : int {
        
        $bp = 3;
        
        if($play1 == null || $play2 == null){
            $bp = 3;
        }elseif($play1 == 'rock' && $play2 == 'scissors' || $play1 == 'paper' && $play2 == 'rock' || $play1 == 'scissors' && $play2 == 'paper'){
            $bp = 1;
            $score1 ++;
        }elseif($play2 == 'rock' && $play1 == 'scissors' || $play2 == 'paper' && $play1 == 'rock' || $play2 == 'scissors' && $play1 == 'paper'){
            $bp = 2;
            $score2 ++;
        }elseif($play1 == $play2){
            $bp = 0;
        }

        return $bp;
    }

    public static function playBot(&$play1, &$play2, &$score1, &$score2) : int {

        $bp = rand(1,3);

        if($bp == 1){
            $play2 = 'rock';
        }elseif($bp == 2){
            $play2 = 'paper';
        }else{
            $play2 = 'scissors';
        }
        
        return RockPaperScissors::checkWin($play1 , $play2, $score1, $score2);
    }
}
