<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'lojas' => Loja::get()
        ];
        return view('franqueadora.lojas.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('franqueadora.lojas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loja = new Loja();
        $loja->nome = request('nome');
        $loja->r_social = request('r_social');
        $loja->cnpj = request('cnpj');
        $loja->cep = request('cep');
        $loja->cidade = request('cidade');
        $loja->estado = request('estado');
        $loja->bairro = request('bairro');
        $loja->rua = request('rua');
        $loja->numero = request('numero');
        $loja->complemento = request('complemento');
        $loja->telefone = request('telefone');
        $loja->email = request('email');
        $loja->responsavel = request('responsavel');
        $loja->data_contrato = request('data_contrato');
        $loja->save();
        return redirect(route('lojas.index'))->with('status', 'Loja criada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function show(Loja $loja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function edit(Loja $loja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loja $loja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loja $loja)
    {
        //
    }
}
