<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/JogoDoGalo.css') }}">
        <link rel="shortcut icon" type="imagex/png" href="https://img.icons8.com/fluency/96/000000/ps-controller.png">

        <title>Jogo do Galo | Player vs Player</title>
    </head>
    <body>
        <h1>Player vs Player</h1>
        <a href="/tic-tac-toe" class="back"><i class="fas fa-arrow-left fa-lg"></i></a>
        
        <h2>{{ $player == true ? 'Player 1 turn' : 'Player 2 turn'}}</h2>

        <form action="{{ route('board.reset') }}" method="POST">
            @csrf
            <?php 
                if ($win == 1) {
                    $score[0] ++;
                }elseif ($win == 2) {
                    $score[1] ++;
                }
            ?>
            @if ($win == 1)
                <div class="res">
                    <h3>Player 1 WON!</h3>
                    <button type="submit">Reset Board</button>
                </div>
            @elseif($win == 2)
                <div class="res">
                    <h3>Player 2 WON!</h3>
                    <button type="submit">Reset Board</button>
                </div>
            @elseif($tp == 9)
                <div class="res">
                    <h3>It's a DRAW!</h3>
                    <button type="submit">Reset Board</button>
                </div>
            @endif
            <input type="hidden" name="score1" value="{{$score[0]}}">
            <input type="hidden" name="score2" value="{{$score[1]}}">
        </form>

        <div class="score">
            <h3>Player 1</h3>
            <p>{{$score[0]}}</p>
            <h3>VS</h3>
            <p>{{$score[1]}}</p>
            <h3>Player 2</h3>

            <form action="/tic-tac-toe/pvp" method="POST">
                @csrf
                <button type="submit">Reset Game</button>
            </form>
        </div>

        <form class="jogoGalo" method="post" action="/tic-tac-toe/pvp">
            @csrf
            
            <input type="hidden" name="score1" value="{{$score[0]}}">
            <input type="hidden" name="score2" value="{{$score[1]}}">
            <input type="hidden">
            <input type="hidden" name="player" value="{{$player}}">
            <input type="hidden" name="tp" value="{{$tp}}">


            <table>
                <tr class="row">                    
                    <td class="square">      
                        <input type="hidden" name="board[0]" value="{{$board[0]}}">
                        <button name="action" value="0" type="submit" 
                        {{$board[0] == 'O' || $board[0] == 'X' || $win == 1 || $win == 2 ? 'disabled' : $board[0] = null}}>
                            {{$board[0]}}
                        </button>
                    </td>                    
                    <td class="square">
                        <input type="hidden" name="board[1]" value="{{$board[1]}}">
                        <button name="action" value="1" type="submit" 
                        {{$board[1] == 'O' || $board[1] == 'X' || $win == 1 || $win == 2 ? 'disabled' : $board[1] = null}}>
                            {{$board[1]}}
                    </button>
                    </td>
                    <td class="square">
                        <input type="hidden" name="board[2]" value="{{$board[2]}}">
                        <button name="action" value="2" type="submit" 
                        {{$board[2] == 'O' || $board[2] == 'X' || $win == 1 || $win == 2 ? 'disabled' : $board[2] = null}}>
                            {{$board[2]}}
                    </button>
                    </td>
                </tr>
                <tr class="row">
                    <td class="square">
                        <input type="hidden" name="board[3]" value="{{$board[3]}}">
                        <button name="action" value="3" type="submit" 
                        {{$board[3] == 'O' || $board[3] == 'X' || $win == 1 || $win == 2 ? 'disabled' : $board[3] = null}}>
                            {{$board[3]}}
                    </button>
                    </td>
                    <td class="square">
                        <input type="hidden" name="board[4]" value="{{$board[4]}}">
                        <button name="action" value="4" type="submit" 
                        {{$board[4] == 'O' || $board[4] == 'X' || $win == 1 || $win == 2 ? 'disabled' : $board[4] = null}}>
                            {{$board[4]}}
                        </button>
                    </td>
                    <td class="square">
                        <input type="hidden" name="board[5]" value="{{$board[5]}}">
                        <button name="action" value="5" type="submit" 
                        {{$board[5] == 'O' || $board[5] == 'X' || $win == 1 || $win == 2 ? 'disabled' : $board[5] = null}}>
                            {{$board[5]}}
                        </button>
                    </td>
                </tr>
                <tr class="row">
                    <td class="square">
                        <input type="hidden" name="board[6]" value="{{$board[6]}}">
                        <button name="action" value="6" type="submit" 
                        {{$board[6] == 'O' || $board[6] == 'X' || $win == 1 || $win == 2 ? 'disabled' : $board[6] = null}}>
                            {{$board[6]}}
                        </button>
                    </td>
                    <td class="square">
                        <input type="hidden" name="board[7]" value="{{$board[7]}}">
                        <button name="action" value="7" type="submit" 
                        {{$board[7] == 'O' || $board[7] == 'X' || $win == 1 || $win == 2 ? 'disabled' : $board[7] = null}}>
                            {{$board[7]}}
                        </button>
                    </td>
                    <td class="square">
                        <input type="hidden" name="board[8]" value="{{$board[8]}}">
                        <button name="action" value="8" type="submit" 
                        {{$board[8] == 'O' || $board[8] == 'X' || $win == 1 || $win == 2 ? 'disabled' : $board[8] = null}}>
                            {{$board[8]}}
                        </button>
                    </td>
                </tr>
            </table>
                
        </form>

    </body>
</html>