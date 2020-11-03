@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Gerenciamento de checklists</h1>
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
<a class="btn btn-success" href="{{ URL::route('checklist.create', [$pj_id, $pcs_id]) }}">+ Adicionar novo checklist</a>
<br>
<br>
    <table width="100%" class="table table-striped">
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($checklist as $cl)
                <tr>
                    <td>{{ $cl->id }}</td>
                    <td>{{ $cl->nome_artefato }}</td>
                    <td>{{ $cl->descricao }}</td>
                    <td>
                        @if (isset($cl->respostas))
                            <a class="btn btn-light" href="{{ URL::route('checklist.show', [$pj_id, $pcs_id, $cl->id]) }}">Visualizar avaliação |</a>
                        @endif
                        <a class="btn btn-success" href="{{ URL::route('checklist.avaliar', [$pj_id, $pcs_id, $cl->id]) }}">Avaliar</a>
                        <a class="btn btn-info" href="{{ URL::route('checklist.edit', [$pj_id, $pcs_id, $cl->id]) }}">Editar</a>
                        <form action="{{ URL::route('checklist.destroy', [$pj_id, $pcs_id, $cl->id]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-dark" type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td align="center" colspan="4"><a  class="btn btn-success" href="{{ URL::route('checklist.create', [$pj_id, $pcs_id]) }}">+ Adicionar novo checklist</a> </td>
            </tr>
        </tbody>
    </table>
@stop