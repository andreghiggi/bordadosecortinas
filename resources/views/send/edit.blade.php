<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Editar Lançamento</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            input[type=number]::-webkit-inner-spin-button { 
                -webkit-appearance: none;
    
                }
            input[type=number] { 
            -moz-appearance: textfield;
            appearance: textfield;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            <h2>Editar Lançamento</h2>
            <form class="form" method="POST" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-4">
                        @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                    </div>
                    <div class="col-sm-2">
                        
                        <label class="form-label" for="quantidade">Quantidade</label><br/>
                        <input class="form-control" value="{{$send->quantidade}}" type="number" name="quantidade" id="quantidade"/>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px">
                    <div class="col-sm-2">
                        <input class="btn btn-primary" type="submit" value="Salvar"></input>
                        <a type="button" class="btn btn-warning" href="{{ route('send.list') }}">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>