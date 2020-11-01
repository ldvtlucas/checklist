<?php

namespace App\Http\Controllers;

use App\Models\Processos;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index() 
    {
        $processos = Processos::get();
        $data = [
            'processos'     =>  $processos
        ];
        return view('menu')->with($data);
    }
}
