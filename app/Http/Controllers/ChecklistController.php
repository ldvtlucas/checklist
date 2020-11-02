<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($projeto_id, $processo_id)
    {
        $checklist = Checklist::where('pj_id', '=', $projeto_id)
                                ->where('pcs_id', '=', $processo_id)
                                ->get();

        $data = [
            'checklist'  => $checklist,
            'pj_id'      => $projeto_id,
            'pcs_id'     => $processo_id
        ];

        return view('checklist.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($projeto_id, $processo_id)
    {
        $data = [
            'pj_id'      => $projeto_id,
            'pcs_id'     => $processo_id
        ];
        return view('checklist.create')->with($data);
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
    public function show($projeto_id, $processo_id, Checklist $checklist)
    {
        dd('show');
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

        return view('checklist.edit')->with($data);
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

    public function avaliar($projeto_id, $processo_id, Checklist $checklist) {
        dd('avaliar');
    }
}
