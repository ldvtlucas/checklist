@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Gerenciamento de processos</h1>
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
    <a class="btn btn-success" href="{{ URL::route('processos.create') }}">Registrar novo processo</a>
    <table class="table table-striped" width="100%">
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </thead>
        <tbody>
                @foreach ($processos as $processo)
                <tr>
                    <td>{{ $processo->id }}</td>
                    <td>{{ $processo->nome }}</td>
                    <td>{{ $processo->descricao }}</td>
                    <td>
                        <a class="btn btn-info"href="{{ route('processos.edit', $processo->id) }}">Editar</a>
                        <form action="{{ route('processos.destroy', $processo->id) }}" method="POST" onsubmit="if (!confirm('Deseja realmente excluir?')) return false;">
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
