<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lançamento</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body> 
        <div class="container">
            <form method="POST" action="" autocomplete="off">
                @csrf
                <div class="container">
                    <h2>Lançar Produção</h2>
                    <div class="row">
                        <div class="col-sm-3">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <label class="form-label" for="referencia">Referencia:</label><br />
                            <input class="form-control" class="field" type="text" name="referencia"
                                id="referencia" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="form-label" for="produto">Nome do Produto</label><br />
                            <input class="form-control" type="text" name="produto" id="produto" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="form-label" for="quantidade">Quantidade</label><br />
                            <input class="form-control" type="text" name="quantidade" id="quantidade" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12" style="margin-top: 1rem">
                            <input class="btn btn-primary" type="submit" value="Salvar"></input>
                            <a type="button" class="btn btn-warning" href="{{ route('main') }}">Voltar</a>
                        </div>
                    </div>
                </div>
            </form>
            <br>
        </div>
        <br>
        <div class="container">
            <form method="get" action="{{route('filter')}}">
                <div class="row d-flex">
                    <div class="form-group col-lg-2 ">
                        <div class="container">
                            <label class="form-label">Apartir De:</label>
                            <div class="input-group date">
                                <input type="date" name="data" class="form-control" id="kt_datepicker_3"/>
                            </div>
                        </div>
                    </div>
                    <button style="margin-top: 25px;" type="submit" class="btn btn-primary">imprimir</button>
                </div>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Referencia</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Data Lançamento</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lancamento as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->referencia }}</td>
                            <td>{{ $item->nome }}</td>
                            <td>{{ $item->quantidade }}</td>
                            @if ($item->produto[0]->valor == null)
                                <td>R$: 0.00</td>
                            @else
                                <td>{{ 'R$ ' . number_format(($item->produto[0]->valor * $item->quantidade) / 100, 2, ',', '.') }}
                                </td>
                            @endif
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                            <td>
                                <div>
                                    <a type="button" class="btn btn-warning" href="{{ route('send.edit', ['id' => $item->id]) }}">Editar Quantidade</a>
                                    <a type="button" class="btn btn-danger" href="{{ route('delete', ['id' => $item->id]) }}">Deletar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $lancamento->links() }}
        </div>
    </div>
    </div>
    </div>
</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    jQuery(document).ready(function() {
        @yield('postJquery');
    });
</script>
<script>
    var PRODUTO = ['referencia', 'nome', 'valor']

    $('#referencia').change(function() {
        let referencia = $('#referencia').val()
        $.ajax({
            method: 'get',
            url: 'request/' + $(this).val(),
            dataType: "json",
            success: function(data) {
                console.log(data);
                if(data[0].length == 0){
                    alert('Produto não encontrado!');

                }
                $('#produto').val(data[0][0].nome);
            },
            error: function(e) {
                console.log(e)
                
            },
            statusCode: {
                500: function() {
                    console.log('something went wrong')
                }
            }
        })
        console.log(referencia)
    })
</script>

</html>
