<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="imagex/png" href="https://img.icons8.com/fluency/96/000000/ps-controller.png">

        <title>HFGames</title>
        <style>
            body{
                font-family: Helvetica, Arial, sans-serif;
            }
            h1{
                font-size: 120px;
                text-align: center;
            }
            div{
                text-align: center;
                margin: 120px 0px 0px;
            }
            div a button{
                text-decoration: none;
                color: black;
                border: 2px solid #508D4E;
                border-bottom: none; 
                width: 60%;
                font-size: 26px;
                padding: 16px 0px;
                background-color: transparent;
                cursor: pointer;
                transition: 400ms;
            }
            div a #last{
                border-bottom: 2px solid #508D4E;
            }
            div a button:hover{
                background-color: #508D4E;
                color: white;
            }
        </style>
    </head>
    <body>
        <h1>HFGames</h1>
        
        <div>
            <a href="/tic-tac-toe"><button>Tic Tac Toe</button></a><br>
            <a href="/rock-paper-scissors"><button>Rock Paper Scissors</button></a><br>
            <a href="/hangman"><button id="last">Hangman</button></a>
        </div>

    </body>
</html>