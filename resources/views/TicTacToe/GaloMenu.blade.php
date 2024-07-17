<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="imagex/png" href="https://cdn-icons-png.flaticon.com/512/2219/2219722.png">

        <title>Jogo do Galo</title>
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
        <h1>Tic Tac Toe</h1>
        
        <div>
            <a href="/tic-tac-toe/pvp"><button>Player vs Player</button></a><br>
            <a href="/tic-tac-toe/difficulty"><button>Player vs Bot</button></a><br>
            <a href="/tic-tac-toe/htp"><button>How to play</button></a>
            <a href="/"><button id="last">Games Menu</button></a>
        </div>

    </body>
</html>