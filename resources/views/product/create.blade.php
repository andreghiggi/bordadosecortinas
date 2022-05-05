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
            input[type=number]::-webkit-inner-spin-button { 
                -webkit-appearance: none;
    
                }
            input[type=number] { 
            -moz-appearance: textfield;
            appearance: textfield;
            }

}
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="main-container">
                <div class="container">
                    <div class="container">
                        <h2>Cadastrar Produto</h2>
                        <form method="POST" action="" autocomplete="off">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="form-label" for="referencia">Referencia:</label><br/>
                                        <input class="form-control" class="field" type="text" name="referencia" id="referencia"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="form-label" for="produto">Nome do Produto</label><br/>
                                        <input class="form-control" type="text" name="produto" id="produto"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="form-label" for="valor">Valor</label><br/>
                                        <input class="form-control" placeholder="0.00" type="text" name="valor" id="valor"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="margin-top: 1rem">
                                        <input class="btn btn-primary" type="submit" value="Salvar"></input>
                                        <a type="button" class="btn btn-warning"  href="{{ route('main') }}">Voltar</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br>
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
                                    <td>{{'R$ '.str_replace(',','.',number_format(($item->valor / 100), 2))}}</td>
                                    <td>{{ $item->created_at->format('d-m-Y')}}</td>
                                    <td>
                                        <div>
                                            <a type="button" class="btn btn-warning" href="{{ route('product.edit', ['id' => $item->id]) }}">Editar</a>
                                            <a type="button" class="btn btn-danger" href="{{ route('product.delete', ['id' => $item->id]) }}">Deletar</a>
                                        </div>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                            {{ $produto->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>