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
                    <h2>Lançar Produção</h2>
                    <div class="table">
                        <form class="table" method="POST" action="" autocomplete="off">
                            @csrf
                            <div class="form">
                                <div class="input-group col">
                                    <p id="error" style="display:none">Produto não encontrado!</p>
                                    <label class="form-label" for="referencia">Referencia:</label><br/>
                                    <input class="form-control" class="field" type="text" name="referencia" id="referencia"/>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="produto">Nome do Produto</label><br/>
                                    <input class="form-control" type="text" name="produto" id="produto"/>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="quantidade">Quantidade</label><br/>
                                    <input class="form-control" type="text" name="quantidade" id="quantidade"/>
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
                            <th scope="col">Quantidade</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Data Lançamento</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($lancamento as $item)
                          <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->referencia}}</td>
                            <td>{{$item->nome}}</td>
                            <td>{{$item->quantidade}}</td>
                            <td>{{'R$ '.number_format(($item->valor / 100), 2, ',', '.')}}</td>
                            <td>{{\Carbon\Carbon::parse(\Carbon\carbon::now())->format('d/m/Y')}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
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
        
        $('#referencia').change(function(){
            let referencia = $('#referencia').val()
            $.ajax({
                method: 'get',
                url: 'request/' + $(this).val(),
                dataType: "json",
                success: function(data){
                    $('#produto').val(data[0][0].nome);
                }, error: function(e){
                    $('#error').css("display", "block");
                    console.log(e)
                },
                statusCode: {
                    500: function(){
                        console.log('something went wrong')
                    }
                }
            })
            console.log(referencia)
        })
    </script>
</html>
