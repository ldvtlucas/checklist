@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Gerenciamento de complexidades</h1>
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
<a class="btn btn-success" href="{{ URL::route('complexidades.create') }}">Adicionar nível de complexidade</a>
<br>
<br>
    <table class="table table-striped" width='100%'>
        <thead>
            <th width='5%'>#</th>
            <th>Nome</th>
            <th>Prazo</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($complexidades as $cplx)
                <tr>
                    <td>{{ $cplx->id }}</td>
                    <td>{{ $cplx->nome }}</td>
                    <td>{{ $cplx->prazo." dias" }}</td>
                    <td>
                        <a class="btn btn-info "href="{{ route('complexidades.edit', $cplx->id) }}">Editar</a>
                        <form action="{{ route('complexidades.destroy', $cplx->id) }}" method="POST" onsubmit="if (!confirm('Deseja realmente excluir?')) return false;">
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
