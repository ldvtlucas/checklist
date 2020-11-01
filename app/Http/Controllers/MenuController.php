<?php

namespace App\Http\Controllers;

use App\Models\Processos;
use App\Models\Projetos;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index() 
    {
        $processos = Processos::get();
        $projetos = Projetos::get();
        $data = [
            'processos'     =>  $processos,
            'projetos'     =>  $projetos
        ];
        return view('menu')->with($data);
    }
}
