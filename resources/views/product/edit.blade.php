<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Editar produtos</title>

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
            <h2>Editar Produto</h2>
            <form class="form" method="POST" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-sm-2">
                        <label class="form-label" for="referencia">Referencia:</label><br/>
                        <input class="form-control" value="{{$product->referencia}}" class="field" type="text" name="referencia" id="referencia"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label" for="produto">Nome do Produto</label><br/>
                        <input class="form-control" value="{{$product->nome}}" type="text" name="produto" id="produto"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label class="form-label" for="valor">Valor do Produto</label><br/>
                        <input class="form-control" value="{{str_replace(',','.',number_format(($product->valor / 100), 2))}}" type="text" name="valor" id="valor"/>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px">
                    <div class="col-sm-2">
                        <input class="btn btn-primary" type="submit" value="Salvar"></input>
                        <a type="button" class="btn btn-warning" href="{{ route('produto.create') }}">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>