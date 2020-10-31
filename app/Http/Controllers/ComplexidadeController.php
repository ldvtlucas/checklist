<?php

namespace App\Http\Controllers;

use App\Models\Complexidade;
use Illuminate\Http\Request;

class ComplexidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complexidades = Complexidade::all();
        $data = [
            'complexidades' => $complexidades
        ];
        return view('complexidades.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('complexidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $complexidade = new Complexidade();
        $complexidade->id = request('id');
        $complexidade->nome = request('nome');
        $complexidade->prazo = request('prazo');
        $complexidade->save();

        return redirect(route('complexidades.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complexidade  $complexidade
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complexidade  $complexidade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $complexidade = Complexidade::find($id);
        $data = [
            'complexidade'  =>  $complexidade
        ];
        return view('complexidades.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complexidade  $complexidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $complexidade = Complexidade::find($id);
        $complexidade->id = request('id');
        $complexidade->nome = request('nome');
        $complexidade->prazo = request('prazo');
        $complexidade->save();

        return redirect(route('complexidades.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complexidade  $complexidade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Complexidade::find($id)->delete();
        return redirect(route('complexidades.index'));
    }
}
