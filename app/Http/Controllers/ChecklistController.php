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
        dd($request);
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
    public function edit($projeto_id, $processo_id, Checklist $checklist)
    {
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function update($projeto_id, $processo_id, Request $request, Checklist $checklist)
    {
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function destroy($projeto_id, $processo_id, Checklist $checklist)
    {
        dd('destroy');
    }

    public function avaliar($projeto_id, $processo_id, Checklist $checklist) {
        dd('avaliar');
    }
}
