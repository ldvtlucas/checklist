@extends('adminlte::page')

@section('title', 'Checklists')

@section('content_header')
    <div class="container d-flex justify-content-between">
        <h1 class="m-0 text-dark">Gerenciamento de Checklists</h1>
        <a href="{{ URL::route('checklists.create') }}" class="btn btn-success"> <i class="fas fa-plus"></i> Adicionar</a>
    </div>
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table width="100%" class="table table-striped border">
                    <thead>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>
                        @foreach ($checklists as $cl)
                            <tr>
                                <td>{{ $cl->id }}</td>
                                <td>{{ $cl->nome_artefato }}</td>
                                <td>{{ $cl->descricao }}</td>
                                <td>
                                    @if (isset($cl->respostas) and $cl->respostas != '[]')
                                        <a class="btn btn-light" href="{{ URL::route('checklist.show', [$pj_id, $pcs_id, $cl->id]) }}">Visualizar avaliação</a>
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
                            <td align="center" colspan="4"><a href="{{ URL::route('checklists.create') }}" class="stretched-link text-secondary"><i class="fas fa-plus"></i> Adicionar</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    
@stop