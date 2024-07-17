<?php

namespace App\Services;

use Illuminate\Support\Collection;


class JogoDoGalo
{

    public $board;

    public static function play(&$board, &$player, &$tpp, $clicked) : int {
        
        //change player
        if($player == true){
            $player = false;
            $letter = 'X';
        }else{
            $player = true;
            $letter = 'O';
        }

        //update board
        $board[$clicked] = $letter;  
        
        //update number of plays
        $tpp ++;        

        //check win
        return JogoDoGalo::checkWin($board, $player); 
    }

    public static function playBot(&$board, &$player, &$tpp, &$difficulty, $clicked) : int {
        //update board
        $board[$clicked] = 'X';  
       
        //update number of plays
        $tpp ++;
       
        //bot play
        if($difficulty == 'Easy'){
            if($tpp == 9){
                //empate o bot nao joga haha
            }else{
                if(JogoDoGalo::checkWin($board, $player) == 1){
                    //bot nao joga perdeu haha
                }else{
                    JogoDoGalo::randPlay($board, $tpp);
                }
            }
        }elseif($difficulty == 'Medium'){
            if($tpp == 9){
                //empate o bot nao joga haha
            }else{
                if(JogoDoGalo::checkWin($board, $player) == 1){
                    //o bot perdeu nao joga haha
                }else{
                    JogoDoGalo::mediumDif($board, $tpp);
                }
            }
        }else{
            if($tpp == 9){
                //empate o bot nao joga haha
            }else{
                if(JogoDoGalo::checkWin($board, $player) == 1){
                    //o bot perdeu nao joga haha
                }else{
                    JogoDoGalo::hardDif($board, $tpp);
                }
            }
        }
       //check win
       return JogoDoGalo::checkWin($board, $player); 
    }

    public static function randPlay(&$board, &$tpp){
        do{
            $bp = rand(0, 8);
        }while($board[$bp] == 'X' || $board[$bp] == 'O');
        
        $board[$bp] = 'O';
        $tpp ++;
    }

    public static function mediumDif(&$board, &$tpp){
        
        $positionL1 = [0,1,2];  
        $positionL2 = [3,4,5];        
        $positionL3 = [6,7,8];

        $positionC1 = [0,3,6];        
        $positionC2 = [1,4,7];        
        $positionC3 = [2,5,8];

        $positionD1 = [0,4,8];        
        $positionD2 = [2,4,6];
        
        $letter = 'X';

        $line1 = JogoDoGalo::checkMoves($positionL1, $board, $letter);
        $line2 = JogoDoGalo::checkMoves($positionL2, $board, $letter);
        $line3 = JogoDoGalo::checkMoves($positionL3, $board, $letter);

        $col1 = JogoDoGalo::checkMoves($positionC1, $board, $letter);
        $col2 = JogoDoGalo::checkMoves($positionC2, $board, $letter);
        $col3 = JogoDoGalo::checkMoves($positionC3, $board, $letter);

        $diag1 = JogoDoGalo::checkMoves($positionD1, $board, $letter);
        $diag2 = JogoDoGalo::checkMoves($positionD2, $board, $letter);

        $pplays = [$line1, $line2, $line3, $col1, $col2, $col3, $diag1, $diag2];    

        $pplaysArr = collect($pplays)->filter(fn($item) => $item != -1)->values()->toArray();        

        if(count($pplaysArr) == 1){
            for($i = 0; $i < 8; $i++){
                if($pplays[$i] != -1){
                    $defend = rand(1,3);
                    if($defend != 1){
                        $board[$pplays[$i]] = 'O';
                        $tpp++;
                    }else{
                        JogoDoGalo::randPlay($board, $tpp);
                    }
                }
            }
        }elseif(count($pplaysArr) > 1){
            $bp = rand(1, count($pplaysArr));
            $board[$pplaysArr[$bp-1]] = 'O';
            $tpp++;
        }else{
            JogoDoGalo::randPlay($board, $tpp);
        }
    }

    public static function hardDif(&$board, &$tpp){        

        $positionL1 = [0,1,2];  
        $positionL2 = [3,4,5];        
        $positionL3 = [6,7,8];

        $positionC1 = [0,3,6];        
        $positionC2 = [1,4,7];        
        $positionC3 = [2,5,8];

        $positionD1 = [0,4,8];        
        $positionD2 = [2,4,6];        

        $letterD = 'X';
        $letterA = 'O';

        //defend
        $Dline1 = JogoDoGalo::checkMoves($positionL1, $board, $letterD);
        $Dline2 = JogoDoGalo::checkMoves($positionL2, $board, $letterD);
        $Dline3 = JogoDoGalo::checkMoves($positionL3, $board, $letterD);

        $Dcol1 = JogoDoGalo::checkMoves($positionC1, $board, $letterD);
        $Dcol2 = JogoDoGalo::checkMoves($positionC2, $board, $letterD);
        $Dcol3 = JogoDoGalo::checkMoves($positionC3, $board, $letterD);

        $Ddiag1 = JogoDoGalo::checkMoves($positionD1, $board, $letterD);
        $Ddiag2 = JogoDoGalo::checkMoves($positionD2, $board, $letterD);

        $pplays = [$Dline1, $Dline2, $Dline3, $Dcol1, $Dcol2, $Dcol3, $Ddiag1, $Ddiag2];
        $pplaysArr = collect($pplays)->filter(fn($item) => $item != -1)->values()->toArray();

        //attack
        $Aline1 = JogoDoGalo::checkMoves($positionL1, $board, $letterA);
        $Aline2 = JogoDoGalo::checkMoves($positionL2, $board, $letterA);
        $Aline3 = JogoDoGalo::checkMoves($positionL3, $board, $letterA);

        $Acol1 = JogoDoGalo::checkMoves($positionC1, $board, $letterA);
        $Acol2 = JogoDoGalo::checkMoves($positionC2, $board, $letterA);
        $Acol3 = JogoDoGalo::checkMoves($positionC3, $board, $letterA);

        $Adiag1 = JogoDoGalo::checkMoves($positionD1, $board, $letterA);
        $Adiag2 = JogoDoGalo::checkMoves($positionD2, $board, $letterA);

        $Aplays = [$Aline1, $Aline2, $Aline3, $Acol1, $Acol2, $Acol3, $Adiag1, $Adiag2];   
        $AplaysArr = collect($Aplays)->filter(fn($item) => $item != -1)->values()->toArray(); 

        $firstMove = JogoDoGalo::checkFirstMove($board);

        if($firstMove != -1){
            $board[$firstMove] = 'O';
            $tpp++;
        }else{
            if(count($AplaysArr) >= 1){
                if(count($AplaysArr) == 1){
                    for($i = 0; $i < 8; $i++){
                        if($Aplays[$i] != -1){
                            $board[$Aplays[$i]] = 'O';
                            $tpp++;
                        }
                    }
                }elseif(count($AplaysArr) > 1){
                    $bp = rand(1, count($AplaysArr));
                    $board[$AplaysArr[$bp-1]] = 'O';
                    $tpp++;
                }
            }elseif(count($pplaysArr) >= 1){
                if(count($pplaysArr) == 1){
                    for($i = 0; $i < 8; $i++){
                        if($pplays[$i] != -1){
                            $board[$pplays[$i]] = 'O';
                            $tpp++;
                        }
                    }
                }elseif(count($pplaysArr) > 1){
                    $bp = rand(1, count($pplaysArr));
                    $board[$pplaysArr[$bp-1]] = 'O';
                    $tpp++;
                }
            }else{
                JogoDoGalo::randPlay($board, $tpp);
            } 
        }
    }

    public static function checkMoves($positions, $board, $letter) : int{
        $xNum = 0;
        $emptyNum = 0;
        $ptp = -1;
      
        for($i = 0; $i < 3; $i++){

            if($board[$positions[$i]] == $letter){
                $xNum++;
            }

            if($board[$positions[$i]] == ''){
                $emptyNum++;
                $ptp = $positions[$i]; 
            }
        }

        if($emptyNum > 1 || $xNum < 2){
            $ptp = -1;
        }       

        return $ptp;
    }

    public static function checkFirstMove($board) : int{
        
        $bp = -1;
        $emptyCount = 0;
        
        for($i = 0; $i < 8; $i++){
            if($board[$i] == ''){
                $emptyCount++;
            }
        }

        $xIndex = array_search('X', $board);
        
        if($emptyCount == 7){
            if($board[4] == $board[$xIndex]){
                $squares = [0,2,6,8];
                $rand = rand(0,3);
                $bp = $squares[$rand];
            }else{
                $bp = 4;
            }
        }
    
        return $bp;
    }

    public static function checkWin($board, $player){

        //diagonal from left to right
        if($board[0] == $board[4] and $board[0] == $board[8] and $board[0] != ''){
            if($board[0] == 'X'){
                return 1;
            }elseif($board[0] == 'O'){
                return 2;
            }
        }
        //diagonal from right to left
        if($board[2] == $board[4] and $board[2] == $board[6] and $board[2] != ''){
            if($board[2] == 'X'){
                return 1;
            }else{
                return 2;
            }
        }

        //1st line
        if($board[0] == $board[1] and $board[0] == $board[2] and $board[0] != ''){
            if($board[0] == 'X'){
                return 1;
            }else{
                return 2;
            }
        }
        //2nd line
        if($board[3] == $board[4] and $board[3] == $board[5] and $board[3] != ''){
            if($board[3] == 'X'){
                return 1;
            }else{
                return 2;
            }
        }
        //3rd line
        if($board[6] == $board[7] and $board[6] == $board[8] and $board[6] != ''){
            if($board[6] == 'X'){
                return 1;
            }else{
                return 2;
            }
        }

        //1st collumn
        if($board[0] == $board[3] and $board[0] == $board[6] and $board[0] != ''){
            if($board[0] == 'X'){
                return 1;
            }else{
                return 2;
            }
        }
        //2nd collumn
        if($board[1] == $board[4] and $board[1] == $board[7] and $board[1] != ''){
            if($board[1] == 'X'){
                return 1;
            }else{
                return 2;
            }
        }
        //3rd collumn
        if($board[2] == $board[5] and $board[2] == $board[8] and $board[2] != ''){
            if($board[2] == 'X'){
                return 1;
            }else{
                return 2;
            }
        }

        return 0;
    }
}
