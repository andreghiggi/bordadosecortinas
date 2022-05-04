<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Send;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
        $validated = $request->validate([
            'referencia' => 'required|unique:produto,referencia',
            'produto' =>    'required|string|unique:produto,nome',
            'valor' =>      'numeric'
        ]);

        // $data = $request->all();
        $value = str_replace(',','.',$validated['valor']);
        $newValue = ($value * 100);
        // dd($data['valor']);
        // $valor = str_replace(',','.',$data['valor']);
        Product::create([
            'referencia' => $validated['referencia'],
            'nome' => $validated['produto'],
            'valor' => $newValue
        ]);

        return redirect('produto/cadastro')->with('sucesso', 'Produto cadastrado com sucesso!');

    }

    public function edit(int $id):View
    {
        return view('product.edit',[
            'product' => Product::find($id)
        ]);
    }

    public function update(int $id, Request $request):RedirectResponse
    {
        $product = $request->all();
        $value = str_replace(',','.',$product['valor']);
        $newValue = ($value * 100);
        Product::where('id', $id)->update([
            'referencia' => $product['referencia'],
            'nome' => $product['produto'],
            'valor' => $newValue
        ]);
        
        return redirect('produto/cadastro');
    }

    public function delete(int $id):RedirectResponse
    {
        Send::with('produto')->where('produto_id', $id)->delete();
        Product::where('id',$id)->delete();
        return redirect('produto/cadastro');
    }
}
