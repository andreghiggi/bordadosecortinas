<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Send;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class SendController extends Controller
{
    public function list():View
    {
        
        return view('send.list',[
            'lancamento'  =>  Send::with('produto')->paginate(10)
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
        // dd($produto->id);
        if($produto == null || $data == null){
            return redirect('send/listar');
        }else {
            // $lancamento = Send::where('referencia',$data['referencia'])->first();
            // if($lancamento->referencia == $data['referencia']){
            //     // dd($data['quantidade']);
            //     $sum = DB::table('lancamento')
            //     ->update('quantidade')
            //     ->where('referencia', '=', $data['referencia'])
            //     ->sum($data['quantidade']);
            // }

            // Send::create([
            //     'nome'  => $data['produto'],
            //     'quantidade' => $data['quantidade']    
            // ]);
            $lancamento = Send::updateOrCreate(['referencia' => $data['referencia']], [
                'produto_id' => $produto->id, 
                'nome'  => $data['produto'],
                'quantidade' => DB::raw('quantidade + ' . $data['quantidade'])
            ]);

            return redirect('send/listar');
        }  
    }

    public function edit():View
    {
        return view('send.edit');
    }
 
    public function delete(int $id):RedirectResponse
    {
        Send::where('id',$id)->delete();
        return redirect('send/listar');
    }

    public function AutoCompleteHandle($id):JsonResponse
    {
        $data = Product::where('referencia', $id)->get();
        if(empty($data)){
            return response()->json(['error', 'data not found!'],500);
        }
        return response()->json([$data],200);
    }

    public function renderizarPdf()
    {
		$venda = Send::all();
		$public = getenv('SERVIDOR_WEB') ? 'public/' : '';
		$logo = $public . 'imgs/kaycon.jpg';
		
		
		$pdf = \PDF::loadView('send/pdf',compact('venda'));
		
		return $pdf->setPaper('a4')->stream('lista_lançamento.pdf');
	}
}
