<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="imagex/png" href="https://img.icons8.com/fluency/96/000000/ps-controller.png">

        <title>Rock Paper Scissors | Best of</title>
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
            form div{
                width: 80%;
                display: flex;
                margin: 200px auto 0px;
            }
            form div button{
                width: 100%;
                padding: 20px 0px;
                font-size: 30px;
                cursor: pointer;
                background-color: white;
                border: none;
                border-right: 2px solid black;
                border-radius: none;
            }
            form div button:nth-child(3){
                border-right: 0px solid black;
            }
            form div button:hover{
                background-color: hsl(0, 0%, 86%);
            }
            .against{
                margin: 120px 25%;
                font-size: 30px;
            }
            select{
                height: 40px;
                width: 50%;
                font-size: 20px;
                font-weight: 300;
            }
        </style>
    </head>
    <body>
        <h1>Best of:</h1>
        
        <form action="/rock-paper-scissors/pvp" method="POST">
            @csrf
            <div>
                <button type="submit" name="bestOf" value="1">Best of 1</button>
                <button type="submit" name="bestOf" value="3">Best of 3</button>
                <button type="submit" name="bestOf" value="5">Best of 5</button><br>
            </div>

            <div class="against">
                <label>Against : </label>
                <select name="against">
                    <option value="player">Player</option>
                    <option value="bot">Bot</option>
                </select>
            </div>
        </form>

    </body>
</html>