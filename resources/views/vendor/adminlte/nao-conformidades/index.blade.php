
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Controle de não conformidades</h1>
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
<br>
    <div>
        <a style="text-align: left;" class="btn btn-success" href="{{ URL::route('nao-conformidades.create') }}">Registrar nao conformidade</a>
        <a style="text-align: right;" class="btn btn-info" href="{{ URL::route('complexidades.index') }}">Gerenciar graus de complexidade</a>
    </div>
    <br>

    <table class="table table-striped" width='100%'>
        <thead>
            <th width='5%'>#</th>
            <th>Causa</th>
            <th>Tratativa</th>
            <th>Complexidade</th>
            <th>Projeto</th>
            <th>Checklist</th>
            <th>Escalonada?</th>
            <th>Responsável</th>
            <th>Prazo Resolução</th>
            <th>Data Inicial</th>
            <th>Data Final</th>
            <th>Status</th>
        </thead>
        <tbody>

        </tbody>
    </table>
@stop