<?php

namespace App\Http\Controllers;

use App\Models\Vendas;
use Illuminate\Http\Request;
use App\Models\Joias;
use App\Models\Clientes;
use App\Charts\VendasQtdChart;

class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Vendas::all();
        $joias = Joias::all();
        $clientes = Clientes::all();

        return view("vendas.list", 
        [
            "dados" => $dados,
            'joias'=>$joias, 
            'clientes'=>$clientes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $joias = Joias::all();
        $clientes = Clientes::all();

        return view("vendas.form",
        [
            'joias'=>$joias, 
            'clientes'=>$clientes 
        ]);
    }


    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'clientes_id' => "required|max:100",
            'joia_id' => "required|max:100",
            'data' => "required",
            'quantidade' => "required",
            'preco_tot' => "required",
        ], [
            'clientes_id.required' => "O :attribute é obrigatório",
            'joia_id.max' => "Só é permitido 100 caracteres",
            'data.required' => "O :attribute é obrigatório",
            'quantidade.required' => "O :attribute é obrigatório",
            'preco_tot.required' => "O :attribute é obrigatório",
            
        ]); 

        $data = $request->all();
        Vendas::create($data);
            
        return redirect('vendas');
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Vendas  
     * @return \Illuminate\Http\Response
     */
    public function show(Vendas $vendas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Joias  
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $dado = Vendas::findOrFail($id);
        $joias = Joias::all();
        $clientes = Clientes::all();

        return view("vendas.form", [
            'dado' => $dado,
            'joias' => $joias,
            'clientes' => $clientes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendas  
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, Vendas $vendas)
    {
         $request->validate([
            'clientes_id' => "required|max:100",
            'joia_id' => "required|max:100",
            'data' => "required",
            'quantidade' => "required",
            'preco_tot' => "required",
             ], [
            'clientes_id.required' => "O :attribute é obrigatório",
            'joia_id.max' => "Só é permitido 100 caracteres",
            'data.required' => "O :attribute é obrigatório",
            'quantidade.required' => "O :attribute é obrigatório",
            'preco_tot.required' => "O :attribute é obrigatório",
            ]);
             

            $data = $request->all();
            Vendas::updateOrCreate(
                ['id' => $request->id],
                $data
            );
            
                
        return redirect('vendas');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Vendas
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $id)
    {
        $dado = Vendas::findOrFail($id); //busca um registro com o ID fornecido
        $dado->delete();
        return redirect('vendas'); 
    }

    //campo de busca
    public function search(Request $request)
    {
        if (!empty($request->cliente_id)) { //'!empty' verifica se uma variável está vazia ou não
            $dados = Vendas::where(
                "cliente_id",
                "like",
                "%" . $request->cliente_id . "%" //% é um caractere curinga em consultas SQL que indica que pode haver qualquer coisa antes ou depois do valor de nome
            )->get(); //executa a cosulta
        } else {
            $dados = Vendas::all(); 
        }

        return view("vendas.list", ["dados" => $dados]);
    }

    public function chart(VendasQtdChart $VendasChart)
    {
        return view("vendas.chart", ["vendasChart" => $VendasChart->build()]);
    }
}
