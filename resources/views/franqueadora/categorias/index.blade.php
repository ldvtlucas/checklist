@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <div class="container d-flex justify-content-between">
            <h1 class="m-0 text-dark">Gerenciamento de Categorias</h1>
            <a href="{{ URL::route('categorias.create') }}" class="btn btn-success"> <i class="fas fa-plus"></i> Adicionar</a>
    </div>
    
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped border">
                        <thead>
                            <th width="3%">#</th>
                            <th width="20%">Nome</th>
                            <th width="50%">Descrição</th>
                            <th width="27%">Ações</th>
                        </thead>
                        <tbody>
                            @isset($categorias)
                                @foreach ($categorias as $categoria)
                                <tr>
                                    <td>{{ $categoria->id }}</td>
                                    <td>{{ $categoria->nome }}</td>
                                    <td>{{ $categoria->descricao }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ URL::route('categorias.show', $categoria->id) }}" class="btn btn-info"><i class="far fa-eye"></i> Detalhes</a>
                                            <a href="{{ URL::route('categorias.edit', $categoria->id) }}" class="btn btn-primary ml-2"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ URL::route('categorias.destroy', $categoria->id) }}" method="POST" onsubmit="if (!confirm('Deseja realmente excluir?')) return false;">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger ml-2"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop