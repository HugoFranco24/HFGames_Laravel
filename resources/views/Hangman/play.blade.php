<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/Hangman.css') }}">
        <link rel="shortcut icon" type="imagex/png" href="https://img.icons8.com/fluency/96/000000/ps-controller.png">

        <title>Hangman | Play</title>
    </head>
    <body>
        <div class="topmenu">
            <h1>Hangman Game</h1>
            <a href="/hangman" class="back"><i class="fas fa-arrow-left fa-lg"></i></a>
        </div>

        <div class="game">
            <div class="guess">
                <?php
                    $complete = false;
                    $nullCnt = count($word);

                    for($i = 0; $i < count($word); $i++) { 
                        if($guessedLArr[$i] != null){
                            $nullCnt --;
                        }
                    }
                    
                    if ($nullCnt == 0) {
                        $complete = true;
                    }
                ?>

                @if ($wrongCnt == 8)
                    <div class="res">
                        <h1>You were hanged</h1>
                        <p>You guessed wrong 8 times so you died</p>
                        <a href="/hangman/config">Play again</a>
                    </div>
                @elseif ($complete == true)
                    <div class="res">
                        <h1>You Win</h1>
                        <p>You guessed the word {{$wordIn}} with {{$tries}} tries</p>
                        <a href="/hangman/config">Play again</a>
                    </div>
                @endif
                <div class="word">
                    <h3 style="text-align: center; padding-top: 20px; font-size:24px">Guess the word</h2>
                    <p style="text-align: center; font-size:20px"><b>Category:</b> {{$category == null ? 'Not choosen' : $category}}</p>

                    <div class="tracos">
                        @for ($i = 0; $i < count($word); $i++)
                            <div class="traco">
                                @if ($guessedLArr[$i] != null)
                                    @if ($word[$i] == $guessedLArr[$i])
                                        {{$guessedLArr[$i]}}
                                    @endif
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>

                <form action="/hangman/play" method="POST">
                    @csrf

                    <label>Guess a letter: </label><input type="text" name="letter" maxlength="1" required>
                    <button type="submit"><i class="fas fa-arrow-right fa-xl"></i></button>

                    @for ($i = 0; $i < count($word); $i++)
                        <input type="hidden" name="guessedLArray{{$i}}" value="{{$guessedLArr[$i]}}">
                    @endfor

                    @for ($i = 0; $i < count($wrongLArr); $i++)
                        <input type="hidden" name="wrongLArray{{$i}}" value="{{$wrongLArr[$i]}}">
                    @endfor

                    <input type="hidden" name="word" value="{{$wordIn}}">
                    <input type="hidden" name="category" value="{{$category}}">
                    <input type="hidden" name="wrongCnt" value="{{$wrongCnt}}">
                    <input type="hidden" name="tries" value="{{$tries}}">
                </form>

                <div class="info">
                    <p><b style="font-size: 18px">Wrong letters:</b>
                        @if ($wrongLArr != null)
                            @for ($i = 0; $i < count($wrongLArr); $i++)
                                {{$wrongLArr[$i]}},
                            @endfor
                        @else
                            You haven't had a wrong letter yet
                        @endif 
                    </p>
                </div>

            </div>
            <div class="hanging">
                @if ($wrongCnt == 0)
                    <img src="{{asset('Images/Hangman/Imgprincipal.png')}}" alt="">
                @else
                    <img src="{{asset('Images/Hangman/Img' . $wrongCnt . '.png')}}" alt="">
                @endif
                
            </div>
        </div>
    </body>
</html>