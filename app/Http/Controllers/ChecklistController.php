<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Checklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [ 'checklists' => Checklist::all() ];
        return view('franqueadora.checklists.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categorias' => Categoria::all(),
        ];
        return view('franqueadora.checklists.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($projeto_id, $processo_id, Request $request)
    {
        $cl = new Checklist();
        $cl->pj_id = $projeto_id;
        $cl->pcs_id = $processo_id;
        $cl->nome_artefato = request('nome');
        $cl->descricao = request('descricao');
        $cl->perguntas = Checklist::perguntaToJson($request);
        $cl->save();
        return redirect(route('checklist.index', [$projeto_id, $processo_id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function show($projeto_id, $processo_id, $id)
    {
        $checklist = Checklist::find($id);
        $checklist->perguntas = json_decode($checklist->perguntas);
        $checklist->respostas = json_decode($checklist->respostas);
        $repeticoes = array_count_values($checklist->respostas);
        if ( empty($repeticoes['naoAplica']) ) $repeticoes['naoAplica'] = 0;
        if ( empty($repeticoes['sim']) ) $repeticoes['sim'] = 0;
        if ( empty($repeticoes['nao']) ) $repeticoes['nao'] = 0;
        if ($repeticoes['nao'] == 0 and $repeticoes['naoAplica'] == 0){
            $checklist->aderencia = 100;
        } else {
            $checklist->aderencia = 100 * ($repeticoes['sim'] / (count($checklist->perguntas) - $repeticoes['naoAplica']));
        }
        

        
        $data = [
            'checklist'  => $checklist,
            'pj_id'      => $projeto_id,
            'pcs_id'     => $processo_id
        ];

        return view('vendor.adminlte.checklist.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function edit($projeto_id, $processo_id, $id)
    {
        $checklist = Checklist::find($id);
        $checklist->perguntas = json_decode($checklist->perguntas);

        $data = [
            'checklist'  => $checklist,
            'pj_id'      => $projeto_id,
            'pcs_id'     => $processo_id
        ];

        return view('vendor.adminlte.checklist.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function update($projeto_id, $processo_id, Request $request, $id)
    {
        $cl = Checklist::find($id);
        $cl->pj_id = $projeto_id;
        $cl->pcs_id = $processo_id;
        $cl->nome_artefato = request('nome');
        $cl->descricao = request('descricao');
        $cl->perguntas = Checklist::perguntaToJson($request);
        $cl->respostas = '[]';
        $cl->save();
        return redirect(route('checklist.index', [$projeto_id, $processo_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function destroy($projeto_id, $processo_id, $id)
    {
        Checklist::find($id)->delete();
        return redirect(route('checklist.index', [$projeto_id, $processo_id]));
    }

    public function avaliar($projeto_id, $processo_id, $id) {
        $checklist = Checklist::find($id);
        $checklist->perguntas = json_decode($checklist->perguntas);
        $data = [
            'checklist' => $checklist,
            'pj_id'      => $projeto_id,
            'pcs_id'     => $processo_id
        ];
        return view('vendor.adminlte.checklist.avaliar')->with($data);
    }

    public function avaliado($projeto_id, $processo_id, Request $request, $id) {
        $cl = Checklist::find($id);
        $cl->respostas = Checklist::respostaToJson($request);
        $cl->save();
        return redirect(route('checklist.index', [$projeto_id, $processo_id]));
    }
}
