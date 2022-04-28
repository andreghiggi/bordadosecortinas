<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Send;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class SendController extends Controller
{
    public function list():View
    {
        $lancamento = Send::all();
        return view('send.list',[
            'lancamento'  =>  $lancamento
        ]);
    }

    public function create():View
    {
        return view('send.create');
    }

    public function store(Request $request):RedirectResponse
    {
        // $request->validate([
        //     'referencia' => 'required',
        //     'nome'  => 'required|string',
        //     'data' => 'Date'
        // ]);
        $data = $request->all();
        // dd($data);
        $produto = Product::where('referencia', $data['referencia'])->first();
        if($produto == null){
            return redirect('send/listar');
        }else {
            Send::updateOrCreate(['referencia' => $data['referencia']], [ 
                'nome'  => $data['produto'],
                'quantidade' => $data['quantidade']
            ]);

            return redirect('send/listar');
        }  
    }

    public function edit():View
    {
        return view('send.edit');
    }

    // public function 
    // public function delete()
    // {
    //     return view('product.list');
    // }
}
