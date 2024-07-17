<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="imagex/png" href="https://cdn-icons-png.flaticon.com/512/2219/2219722.png">

        <title>Jogo do Galo | Difficulty</title>
        <style>
            body{
                font-family:'Segoe UI', Tahoma, sans-serif;
            }
            h1{
                text-align: center;
                font-size: 50px;
                font-weight: bold;
                margin: 80px 0px 0px; 
            }
            form{
                width: 80%;
                display: flex;
                margin: 200px auto 0px;
            }
            form button{
                width: 100%;
                padding: 20px 0px;
                font-size: 30px;
                cursor: pointer;
                background-color: white;
                border: none;
                border-right: 2px solid black;
                border-radius: none;
            }
            form button:last-child{
                border-right: 0px solid black;
            }
            form button:hover{
                background-color: hsl(0, 0%, 86%);
            }
        </style>
    </head>
    <body>
        <h1>Choose the Bot's Difficulty</h1>
        
        <form action="/tic-tac-toe/pvb" method="POST">
            @csrf
            <button type="submit" name="difficulty" value="Easy">Easy</button>
            <button type="submit" name="difficulty" value="Medium">Medium</button>
            <button type="submit" name="difficulty" value="Hard">Hard</button>
        </form>

    </body>
</html>