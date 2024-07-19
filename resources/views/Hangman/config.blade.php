<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="imagex/png" href="https://img.icons8.com/fluency/96/000000/ps-controller.png">

        <title>Hangman | Config</title>
        <style>
            body{
                font-family:'Segoe UI', Tahoma, sans-serif;
                overflow-x: hidden; 
            }
            h1{
                text-align: center;
                font-size: 50px;
                font-weight: bold;
                margin: 80px 0px 0px; 
            }
            form{
                width: 80%;
                margin: 160px auto 0px;
            }
            form input{
                width: 80%;
                padding: 14px;
                font-size: 24px;
                background-color: white;
                border: 1px solid black;
                margin: 5px 10%;
            }
            form input:focus{
                background-color: hsl(0, 0%, 95%);
            }
            form button{
                border: 2px solid black;
                width: 50%;
                background-color: transparent;
                height: 40px;
                font-size: 28px;
                cursor: pointer;
                margin: 60px 25% 0px;
                transition: 200ms;
            }
            form button:hover{
                background-color: #000;
                color: white;
            }
        </style>
    </head>
    <body>
        <h1>Write word</h1>
        
        <form action="/hangman/play" method="POST">
            @csrf

            <input type="text" name="word" placeholder="Word to guess (max: 14)" maxlength="14"><br>
            <input type="text" name="category" placeholder="Category (optional)">

            <button type="submit">Play</button>
        </form>

    </body>
</html>