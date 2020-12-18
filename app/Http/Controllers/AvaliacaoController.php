<?php

namespace App\Http\Controllers;


use App\Models\Checklist;
use App\Models\Loja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AvaliacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::forget(['avaliacao']);
        $data = [
            'checklists' => Checklist::allComCategoria(),
        ];
        return view('franqueado.avaliacao.checklists')->with($data);
    }

    /**
     * Show the first step of the specific checklist to be applied.
     *
     * @param  int  $cl_id
     * @return \Illuminate\Http\Response
     */
    public function avaliarStep1($cl_id)
    {

        $lojaSelecionada = Session::has('avaliacao') ? Session::get('avaliacao')['loja'] : null;
        $data = [
            'cl_id' => $cl_id,
            'step'  => '1',
            'step_desc' => 'Loja a ser avaliada',
            'lojas' => Loja::all(),
            'loja'  => $lojaSelecionada,
        ];
        return view('franqueado.avaliacao.avaliacao')->with($data);
    }

    /**
     * Show the second step of the specific checklist to be applied.
     *
     * @param  int  $cl_id
     * @return \Illuminate\Http\Response
     */
    public function avaliarStep2($cl_id, Request $request)
    {
        // redireciona para etapa1 caso nenhuma loja tenha sido selecionada
        $validator = Validator::make($request->all(), ['loja' => 'required']);
        if ($validator->fails()) {
            return redirect(route('avaliacao.avaliar.s1', $cl_id))
                                    ->withErrors($validator)
                                    ->withInput();
        }

        $loja = request('loja');
        Session::put(['avaliacao' => ['loja' => $loja]]);
        $loja = Loja::find($loja);
        $checklist = Checklist::find($cl_id);
        $checklist->perguntas = json_decode($checklist->perguntas);

        $data = [
            'cl_id' => $cl_id,
            'step'  => '2',
            'step_desc' => 'Checklist: '.$checklist->nome,
            'loja' => $loja->nome.' ('.$loja->cidade.' - '.$loja->estado.')',
            'checklist' => $checklist,
        ];
        return view('franqueado.avaliacao.avaliacao')->with($data);
    }

    

    public function avaliarStep3($cl_id, Request $request) 
    {
        dd('step3');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
