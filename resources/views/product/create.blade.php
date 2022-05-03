<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de produtos</title>

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
                    <h2>Cadastrar Produto</h2>
                    <div class="table">
                        <form class="table" method="POST" action="" autocomplete="off">
                            @csrf
                            <div class="form">
                                <div class="col">
                                    <label class="form-label" for="nome">Referencia:</label><br/>
                                    <input class="form-control" class="field" type="text" name="referencia" id="referencia"/>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="contacts">Nome do Produto</label><br/>
                                    <input class="form-control" type="text" name="produto" id="produto"/>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="contacts">Valor</label><br/>
                                    <input class="form-control" type="text" name="valor" id="valor"/>
                                </div>
                                <div class="col">
                                    <input class="btn btn-primary" type="submit" value="Salvar"></input>
                                    <a type="button" class="btn btn-warning"  href="{{ route('main') }}">Voltar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="container">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Referencia</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Data de criação</th>
                            <th scope="col">Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($produto as $item)
                          <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->referencia}}</td>
                            <td>{{$item->nome}}</td>
                            <td>{{'R$ '.number_format(($item->valor / 100), 2, ',', '.')}}</td>
                            <td>{{ $item->created_at->format('d-m-Y')}}</td>
                            <td><div>
                                <a type="button" class="btn btn-danger"
                                    href="{{ route('product.delete', ['id' => $item->id]) }}">Deletar</a>
                            </div></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </body>
</html>