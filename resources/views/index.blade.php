<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="imagex/png" href="https://cdn-icons-png.flaticon.com/512/2219/2219722.png">

        <title>Jogo do Galo</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <h1 class="text-center text-9xl font-bold mt-8">Tic Tac Toe</h1>
        
        <div class="text-center mt-48">
            <a href="/pvp"><button class="mb-6 text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-xl px-5 py-2.5 text-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Player vs Player</button></a><br>
            <a href="/difficulty"><button class="mb-6 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-xl px-5 py-2.5 text-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Player vs Bot</button></a><br>
            <a href="/htp"><button class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-xl px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">How to play</button></a>
        </div>

    </body>
</html>