<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    
    public function create():View
    {
        $produto = Product::all();
        return view('product.create',[
            'produto' => $produto
        ]);
    }

    public function store(Request $request):RedirectResponse
    {
        $data = $request->all();
        Product::create([
            'referencia' => $data['referencia'],
            'nome' => $data['produto'],
            'valor' => ($data['valor']* 100)
        ]);

        return redirect('produto/cadastro')->with('sucesso', 'Produto cadastrado com sucesso!');

    }

    public function edit():View
    {
        return view('product.edit');
    }

    // public function delete()
    // {
    //     return view('product.list');
    // }
}
