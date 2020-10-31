<?php

namespace App\Http\Controllers;

use App\Models\Projetos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjetosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projetos = Projetos::get();
        $data = ['projetos' =>  $projetos ];
        return view('projetos.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projetos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projeto = new Projetos();
        $projeto->nome = request('nome');
        $projeto->descricao = request('descricao');
        $projeto->status = request('status');
        $projeto->save();
        return redirect(route('projetos.index'));
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
        $projeto = Projetos::find($id);
        $data = ['projeto' =>  $projeto ];
        return view('projetos.edit')->with($data);
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
        $projeto = Projetos::find($id);
        $projeto->nome = request('nome');
        $projeto->descricao = request('descricao');
        $projeto->status = request('status');
        $projeto->save();
        return redirect(route('projetos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Projetos::where('id', $id)->delete();
        return redirect(route('projetos.index'));
    }
}
