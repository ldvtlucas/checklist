<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\Complexidade;
use App\Models\NaoConformidade;
use App\Models\Projetos;
use Illuminate\Http\Request;

class NaoConformidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ncs = NaoConformidade::all();
        foreach ($ncs as $nc) {
            $nc->cplx = Complexidade::find($nc->cplx_id);
            $nc->pj = Projetos::find($nc->pj_id);
            $nc->cl = Checklist::find($nc->cl_id);
        }
        $data = [
            'ncs'   => $ncs
        ];
        return view('franqueado.nao-conformidades.index')->with($data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projetos = Projetos::all();
        $complexidades = Complexidade::all();
        $checklists = Checklist::all();
        $data = [
            'projetos' => $projetos,
            'complexidades' => $complexidades,
            'checklists'     => $checklists
        ];
        return view('franqueado.nao-conformidades.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nc = new NaoConformidade();
        $nc->causa = request('causa');
        $nc->tratativa = request('tratativa');
        $nc->cplx_id = request('complexidade');
        $nc->pj_id = request('projeto');
        $nc->cl_id = request('checklist');
        $nc->responsavel = request('responsavel');
        $nc->data_inicio = request('data_inicio');
        $nc->save();
        return redirect(route('nao-conformidades.index'));
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
        $nc = NaoConformidade::find($id);
        $nc->cplx = Complexidade::find($nc->cplx_id);
        $nc->pj = Projetos::find($nc->pj_id);
        $nc->cl = Checklist::find($nc->cl_id);

        $projetos = Projetos::all();
        $complexidades = Complexidade::all();
        $checklists = Checklist::all();

        $data = [
            'nc'    => $nc,
            'projetos' => $projetos,
            'complexidades' => $complexidades,
            'checklists'     => $checklists
        ];
        return view('vendor.adminlte.nao-conformidades.edit')->with($data);
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
        $nc = NaoConformidade::find($id);
        $nc->causa = request('causa');
        $nc->tratativa = request('tratativa');
        $nc->cplx_id = request('complexidade');
        $nc->pj_id = request('projeto');
        $nc->cl_id = request('checklist');
        $nc->escalonada = request('escalonada');
        $nc->responsavel = request('responsavel');
        $nc->data_inicio = request('data_inicio');
        $nc->data_fim = request('data_fim');
        $nc->status = request('status');
        $nc->save();
        return redirect(route('nao-conformidades.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('destroy');
    }
}
