@extends('adminlte::page')

@section('title', 'Checklists')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1 class="m-0 ml-3 text-dark">Gerenciamento de Checklists</h1>
        <a href="{{ URL::route('checklists.create') }}" class="btn btn-success"> <i class="fas fa-plus"></i> Adicionar</a>
    </div>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                        <th width="3%">#</th>
                        <th width="35%">Nome</th>
                        <th width="35%">Descrição</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>
                        @foreach ($checklists as $cl)
                            <tr>
                                <td>{{ $cl->id }}</td>
                                <td>{{ $cl->nome }}</td>
                                <td><div class="lines-2">{{ $cl->descricao }}</div></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ URL::route('checklists.show', $cl->id) }}" class="btn btn-info"><i class="far fa-eye"></i> Detalhes</a>
                                        <a href="{{ URL::route('checklists.edit', $cl->id) }}" class="btn btn-primary ml-2"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{ URL::route('checklists.destroy', $cl->id) }}" method="POST" onsubmit="if (!confirm('Deseja realmente excluir?')) return false;">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger ml-2"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td align="center" colspan="4"><a href="{{ URL::route('checklists.create') }}" class="btn text-secondary"><i class="fas fa-plus"></i> Adicionar</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    
@stop