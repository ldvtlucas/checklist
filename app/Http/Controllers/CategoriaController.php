<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'categorias' => Categoria::all(),
        ];
        
        return view('franqueadora.categorias.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('franqueadora.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), Categoria::$rules);
        // altera nome das variaveis  na mensagem de erro para melhorar a UX
        $validate->setAttributeNames(Categoria::$correct_names);
        //
        if ($validate->fails()) {
            return redirect()->route('categorias.create')
                             ->withErrors($validate)
                             ->withInput();
        }

        Categoria::create($request->all());

        return redirect(route('categorias.index'))->with('status', 'Categoria criada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($categoria)
    {
        $data = [
            'categoria' => Categoria::find($categoria),
        ];
        return view('franqueadora.categorias.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($categoria)
    {
        $data = [
            'categoria' => Categoria::find($categoria),
        ];
        return view('franqueadora.categorias.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoria)
    {
        $validate = Validator::make($request->all(), Categoria::$rules);
        // altera nome das variaveis  na mensagem de erro para melhorar a UX
        $validate->setAttributeNames(Categoria::$correct_names);
        //
        if ($validate->fails()) {
            return redirect()->route('categorias.edit', $categoria)
                             ->withErrors($validate)
                             ->withInput();
        }

        $categoria = Categoria::find($categoria);
        $categoria->update($request->all());

        return redirect(route('categorias.index'))->with('status', 'Categoria atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoria)
    {
        Categoria::find($categoria)->delete();
        return redirect(route('categorias.index'))->with('status', 'Categoria removida!');
    }
}
