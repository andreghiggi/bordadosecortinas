<!DOCTYPE html>
<html>

<head>
    <title></title>
    <!--  -->
    {{-- {{dd($venda[0])}} --}}
    <style type="text/css">
        .content {
            margin-top: -30px;
        }
        .titulo {
            font-size: 20px;
            margin-bottom: 0px;
            font-weight: bold;
        }
        .b-top {
            border-top: 1px solid #000;
        }
        .b-bottom {
            border-bottom: 1px solid #000;
        }
        th {
            text-align: left;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td style="width: 450px;">
                <strong>Impressão - Lançamento</strong>
            </td>
            <td>
                Impressão em: {{\Carbon\Carbon::parse(\Carbon\carbon::now())->format('d/m/Y')}}
            </td>
        </tr>
    </table>
    <table>
        <thead class="b-bottom">
            <tr>
                <td style="width: 100px;">
                    <strong>Referencia</strong>
                </td>
                <td style="width: 210px;">
                    <strong>Nome do Produto</strong>
                </td>
                <td style="width: 150px;">
                    <strong>Valor Unitário</strong>
                </td>
                <td style="width: 110px;">
                    <strong>Quantidade</strong>
                </td>
                <td style="">
                    <strong>Valor total</strong>
                </td>
            </tr>
        </thead>
        <tbody >
            <?php
                $total = 0;
                $resultado = 0;
                $valor = 0;
                $total = 0;
                $valorTotal = 0;
                $quantidade = 0;
            ?>
            @foreach ($venda as $item)
            <?php
               $valor = ($item->produto[0]->valor / 100);
               $newValor = number_format($valor,2);
               $total = ($item->produto[0]->valor * $item->quantidade / 100);
               $newTotal = number_format($total,2);
               $resultado = ($item->produto[0]->valor * $item->quantidade)/100;
               $valorTotal = $valorTotal + $resultado;
               $quantidade = ($quantidade + $item->quantidade);
            ?>
            <tr class="b-bottom">
                <th>{{$item->referencia}}</th>
                <th>{{$item->nome}}</th>
                <th>{{'R$ '.str_replace(',', '.', $newValor)}}</th>
                <th>{{$item->quantidade}}</th>
                @if ($item->produto[0]->valor == null)
                    <th>R$: 0.00</th> 
                @else
                    <th>{{'R$ '.str_replace(',', '.', $newTotal)}}</th>    
                @endif
               
               
            </tr>
        </tbody>
        @endforeach
    </table><br>

    <table>
        <thead class="b-top">
            <tr class="b-bottom" style="width: 200px;">
                <td style="width: 460px;">
                    Quantidade Total</td>
                <td>{{$quantidade}}</td>
            </tr>
            <tr style="b-bottom">
                <td style="width: 585px">
                    Total
                </td>
                <td>
                    <p>{{'R$ '.number_format(str_replace(',', '.',$valorTotal),2)}}</p>
                </td>
            </tr>
        </thead>
        <tbody class="b-bottom">
            
        </tbody>
    </table>
</body>

</html>