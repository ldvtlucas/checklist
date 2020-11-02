
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Controle de não conformidades</h1>
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
<form action="{{ URL::route('nao-conformidades.index') }}" method='POST'>
        @csrf
        Causa
        <input class="form-control" type="text" name="causa"><br>
        Tratativa
        <input class="form-control" type="text" name="tratativa"><br>
        Complexidade
        <select class="form-control" name="complexidade" id="">
            @foreach ($complexidades as $cplx)
                <option value="{{ $cplx->id }}">{{ $cplx->id.' - '.$cplx->nome }}</option>
            @endforeach
        </select><br>
        Projeto
        <select class="form-control" name="projeto" id="">
            @foreach ($projetos as $pj)
                <option value="{{ $pj->id }}">{{ $pj->id.' - '.$pj->nome }}</option>
            @endforeach
        </select><br>
        Checklist
        <select class="form-control" name="checklist" id="">
            <option value="-1">opcoes</option>
        </select><br>
        Responsavel
        <input class="form-control" type="text" name="responsavel"><br>
        Prazo
        <input class="form-control" type="text" value="{{ $cplx->prazo." dias" }}" disabled><br>
        Data de inicio
        <input class="form-control" type="date" name="data" id="data_inicio">
    </form>
@stop