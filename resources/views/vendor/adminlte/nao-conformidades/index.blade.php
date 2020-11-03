
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
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($ncs as $nc)
                <tr>
                    <td>{{ $nc->id }}</td>
                    <td>{{ $nc->causa }}</td>
                    <td>{{ $nc->tratativa }}</td>
                    <td>{{ $nc->cplx->nome }}</td>
                    <td>{{ $nc->pj->nome }}</td>
                    <td>{{ $nc->cl->nome_artefato }}</td>
                    <td>{{ $nc->escalonada }}</td>
                    <td>{{ $nc->responsavel }}</td>
                    <td>{{ $nc->cplx->prazo.' dias' }}</td>
                    <td>{{ $nc->data_inicio }}</td>
                    <td>{{ $nc->data_fim }}</td>
                    <td>{{ $nc->status }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ URL::route('nao-conformidades.edit', $nc->id) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop