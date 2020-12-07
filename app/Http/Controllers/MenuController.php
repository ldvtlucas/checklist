<?php

namespace App\Http\Controllers;

use App\Models\Processos;
use App\Models\Projetos;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index() 
    {
        return view('home');
    }
}
