<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Menu</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .form {
                width: 500px;
                height: 500px;
            }
            .form .col {
                margin: 10px;
            }
            .form .field{
                padding: 5px;
                width: 300px;
            }
            .buttonBack{
                text-decoration: none;
                padding: 9px;
                background-color:aquamarine;
                color: #000; 
            }
            .buttonCreate{
                text-decoration: none;
                padding: 10px;
                background-color:darkcyan;
                color: #000; 
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="main-container">
                <div class="container">
                    <h2>Menu</h2>
                    <div class="col">
                        <a type="button" class="btn btn-warning" href="{{route('produto.create')}}">Cadastrar Produto</a>
                        <a type="button" class="btn btn-warning" href="{{route('send.list')}}">Lançar Produção</a>
                    </div>
                    <div class="col">
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>