@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <div class="container d-flex justify-content-between">
        <h1 class="m-0 text-dark">Categoria {{ $categoria->id }}</h1>
    </div>
    
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ URL::to(route('categorias.index')) }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>Voltar</a>
                    <table class="table table-striped border mt-2">
                        <tbody>
                            <tr>
                                <td><label for="id">ID:</label></td>
                                <td>{{ $categoria->id }}</td>
                            </tr>
                            <tr>
                                <td><label for="nome">Nome:</label></td>
                                <td>{{ $categoria->nome }}</td>
                            </tr>
                            <tr>
                                <td><label for="descricao">Descrição:</label></td>
                                <td>{{ $categoria->descricao }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop