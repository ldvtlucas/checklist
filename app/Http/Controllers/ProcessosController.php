<?php

namespace App\Http\Controllers;

use App\Models\Processos;
use Illuminate\Http\Request;


class ProcessosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processos = Processos::get();
        $data = ['processos' =>  $processos ];
        return view('franqueadora.processos.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('franqueadora.processos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $processo = new Processos();
        $processo->nome = request('nome');
        $processo->descricao = request('descricao');
        $processo->save();
        return redirect(route('processos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $processo = Processos::find($id);
        $data = ['processo' =>  $processo ];
        return view('franqueadora.processos.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $processo = Processos::find($id);
        $processo->nome = request('nome');
        $processo->descricao = request('descricao');
        $processo->save();
        return redirect(route('processos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Processos::where('id', $id)->delete();
        return redirect(route('processos.index'));
    }
}
