@extends('adminlte::page')

@section('title', 'Lojas')

@section('content_header')
    <div class="container d-flex justify-content-between">
            <h1 class="m-0 text-dark">Gerenciamento de Lojas</h1>
            <a href="{{ URL::route('lojas.create') }}" class="btn btn-success">Adicionar</a>
    </div>
    
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th width="3%">#</th>
                            <th width="30%">Nome</th>
                            <th width="20%">Cidade</th>
                            <th width="20%">Telefone</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            @isset($lojas)
                                @foreach ($lojas as $loja)
                                <tr>
                                    <td>{{ $loja->id }}</td>
                                    <td>{{ $loja->nome }}</td>
                                    <td>{{ $loja->cidade.' - '.$loja->estado }}</td>
                                    <td>{{ $loja->telefone }}</td>
                                    <td></td>
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