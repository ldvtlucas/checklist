<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validate = Validator::make($request->all(), Loja::$rules);
        // altera nome das variaveis  na mensagem de erro para melhorar a UX
        $validate->setAttributeNames(Loja::$correct_names);
        //
        if ($validate->fails()) {
            return redirect()->route('lojas.create')
                             ->withErrors($validate)
                             ->withInput();
        }

        Loja::create($request->all());

        return redirect(route('lojas.index'))->with('status', 'Loja criada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function show($loja)
    {
        $data = [
            'loja' => Loja::find($loja),
        ];
        return view('franqueadora.lojas.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function edit($loja)
    {
        
        $data = [
            'loja' => Loja::find($loja),
        ]; 
        return view('franqueadora.lojas.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $loja)
    {
        $validate = Validator::make($request->all(), Loja::$rules);
        // altera nome das variaveis na mensagem de erro para melhorar a UX
        $validate->setAttributeNames(Loja::$correct_names);
        //
        if ($validate->fails()) {
            return redirect()->route('lojas.edit', $loja)
                             ->withErrors($validate)
                             ->withInput();
        }

        
        $loja = Loja::find($loja);
        $loja->update($request->all());
        return redirect(route('lojas.index'))->with('status', 'Loja editada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function destroy($loja)
    {
        Loja::find($loja)->delete();
        return redirect(route('lojas.index'))->with('status', 'Loja excluida!');
    }
}
