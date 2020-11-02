@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Projetos</h1>
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
<a href="{{ URL::route('projetos.create') }}">Iniciar Novo Projeto</a>

<table class="table-striped" width="100%">
    <thead>
        <th width="10%">#</th>
        <th width="25%">Nome</th>
        <th width="25%">Descrição</th>
        <th width="20%">Status</th>
        <th width="20%">Ações</th>
    </thead>
    <tbody>
            @foreach ($projetos as $projeto)
            <tr>
                <td>{{ $projeto->id }}</td>
                <td>{{ $projeto->nome }}</td>
                <td>{{ $projeto->descricao }}</td>
                <td>{{ $projeto->status }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('projetos.edit', $projeto->id) }}">Editar</a>
                    <form action="{{ route('projetos.destroy', $projeto->id) }}" method="POST" onsubmit="if (!confirm('Deseja realmente excluir?')) return false;">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button class="btn btn-dark" type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach   
    </tbody>
</table>
@stop
