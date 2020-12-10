<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Checklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function store(Request $request)
    {
        // valida os dados recebidos
        $validate = Validator::make($request->all(), Checklist::$rules);
        // altera nome das variaveis  na mensagem de erro para melhorar a UX
        $validate = $validate->setAttributeNames(Checklist::$correct_names);

        if ($validate->fails()) {
            return redirect()->route('checklists.create')
                             ->withErrors($validate)
                             ->withInput();
        }

        
        $checklist = $request->all();
        $perguntas = Checklist::perguntaToJson($request);
        $checklist['perguntas'] = $perguntas;
        
        Checklist::create($checklist);

        return redirect(route('checklists.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function show($projeto_id, $processo_id, $id)
    {
        
        // $data = [
        //     'checklist'  => $checklist,
            
        // ];

        // return view('vendor.adminlte.checklist.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $checklist = Checklist::find($id);
        $checklist->perguntas = json_decode($checklist->perguntas);

        $data = [
            'checklist'  => $checklist,
            'categorias' => Categoria::all(),
        ];

        return view('franqueadora.checklists.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // valida os dados recebidos
        $validate = Validator::make($request->all(), Checklist::$rules);
        // altera nome das variaveis  na mensagem de erro para melhorar a UX
        $validate = $validate->setAttributeNames(Checklist::$correct_names);

        if ($validate->fails()) {
            return redirect()->route('checklists.create')
                             ->withErrors($validate)
                             ->withInput();
        }
        
        $checklist = $request->all();
        $checklist['perguntas'] = Checklist::perguntaToJson($request);
        
        Checklist::find($id)->update($checklist);

        return redirect(route('checklists.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Checklist::find($id)->delete();
        return redirect(route('checklists.index'))->with(['status' => 'Deletado com sucesso!']);
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
