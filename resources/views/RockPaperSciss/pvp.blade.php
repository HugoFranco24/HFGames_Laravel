<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/RockPaperSciss.css') }}">
        <link rel="shortcut icon" type="imagex/png" href="https://cdn-icons-png.flaticon.com/512/2219/2219722.png">

        <title>Jogo do Galo | Player vs {{$against == 'bot' ? 'Bot' : 'Player'}}</title>
    </head>
    <body>
        <div class="game">
            <div class="topmenu">
                <h1>Player vs {{$against == 'bot' ? 'Bot' : 'Player'}}</h1>
                <a href="/rock-paper-scissors" class="back"><i class="fas fa-arrow-left fa-lg"></i></a>
            </div>
            
    
            <form action="/rock-paper-scissors/board/reset" method="POST">
                @csrf
                @if($win == 1)
                <div class="res">
                    <h3>Player 1 WON!</h3>
                    <p>Player 1: {{$play1}} | {{$against == 'bot' ? 'Bot' : 'Player 2'}}: {{$play2}}</p>
                    <button>Ok</button>
                </div>
                @elseif($win == 2)
                    <div class="res">
                        <h3>Player 2 WON!</h3>
                        <p>Player 1: {{$play1}} | {{$against == 'bot' ? 'Bot' : 'Player 2'}}: {{$play2}}</p>
                        <button>Ok</button>
                    </div>
                @elseif($win == 3)

                @elseif($win == 0)
                    <div class="res">
                        <h3>It's a DRAW!</h3>
                        <p>Player 1: {{$play1}} | {{$against == 'bot' ? 'Bot' : 'Player 2'}}: {{$play2}}</p>
                        <button>Ok</button>
                    </div>
                @endif
                
                <input type="hidden" name="score1" value="{{$score[0]}}">
                <input type="hidden" name="score2" value="{{$score[1]}}">
                <input type="hidden" name="bestOf" value="{{$bestOf}}">
                <input type="hidden" name="against" value="{{$against}}">
            </form>

            <form action="/rock-paper-scissors/board/reset" method="POST">
                @csrf
                @if($score[0] == 1 and $bestOf == 1 or $score[0] == 2 and $bestOf == 3 or $score[0] == 3 and $bestOf == 5)
                <div class="res" style="background-color: #D6EFD8;">
                    <h3>Player 1 WON in <br>Best of {{$bestOf}}!</h3>
                    <button>Reset Game</button>
                </div>
                @elseif($score[1] == 1 and $bestOf == 1 or $score[1] == 2 and $bestOf == 3 or $score[1] == 3 and $bestOf == 5)
                    <div class="res" style="background-color: #D6EFD8;">
                        <h3>{{$against == 'bot' ? 'Bot' : 'Player 2'}} WON in <br>Best of {{$bestOf}}!</h3>
                        <button>Reset Game</button>
                    </div>
                @endif
                
                <input type="hidden" name="bestOf" value="{{$bestOf}}">
                <input type="hidden" name="against" value="{{$against}}">
            </form>
            
            <div class="score">
                <section>
                    <p>Player 1</p>
                    <h3>{{$score[0]}}</h3>
                    <p>VS</p>
                    <h3>{{$score[1]}}</h3>
                    <p>{{$against == 'bot' ? 'Bot' : 'Player 2'}}</p>

                    <form action="/rock-paper-scissors/board/reset" method="POST">
                        @csrf
                        <button type="submit"><img src="https://img.icons8.com/ios-filled/100/recurring-appointment.png" alt=""></button>
                        
                        <input type="hidden" name="bestOf" value="{{$bestOf}}">
                        <input type="hidden" name="against" value="{{$against}}">
                    </form>
                    <a href="/rock-paper-scissors/best-of"><img src="https://img.icons8.com/material-rounded/92/settings.png" alt=""></a>
                </section>
            </div>

            <form action="/rock-paper-scissors/pvp" method="POST" class="play">
                @csrf

                <input type="hidden" name="hplay1" value="{{$play1}}">
                <input type="hidden" name="hplay2" value="{{$play2}}">
                <input type="hidden" name="score1" value="{{$score[0]}}">
                <input type="hidden" name="score2" value="{{$score[1]}}">
                <input type="hidden" name="bestOf" value="{{$bestOf}}">
                <input type="hidden" name="against" value="{{$against}}">
                

                <div class="play1">

                    <div class="block" style=" display:{{$play1 != null ? 'block' : 'none'}};"><h4>Player 2 turn</h4></div>

                    <div class="subs">
                        <button type="submit" name="play1" value="rock"><img src="https://img.icons8.com/office/480/rock.png" alt="rock"/></button>
                        <button type="submit" name="play1" value="paper"><img src="https://img.icons8.com/office/480/paper.png" alt="rock"/></button>
                        <button type="submit" name="play1" value="scissors"><img src="https://img.icons8.com/office/480/scissors.png" alt="rock"/></button>
                    </div>
                </div>
                
                <!-- In the middle of the game spaces-->

                <div class="play2">
                    <?php 
                        if ($play1 == null) {
                            $hide = 'block';
                        }else{
                            $hide = 'none';
                        }    
                    ?>
                                                        
                    <div class="block" style=" display:{{$play2 != null ? 'block' : $hide }} ;"><h4>Player 1 turn</h4></div>

                    <div class="subs">
                        <button type="submit" name="play2" value="rock"><img src="https://img.icons8.com/office/480/rock.png" alt="rock"/></button>
                        <button type="submit" name="play2" value="paper"><img src="https://img.icons8.com/office/480/paper.png" alt="rock"/></button>
                        <button type="submit" name="play2" value="scissors"><img src="https://img.icons8.com/office/480/scissors.png" alt="rock"/></button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>