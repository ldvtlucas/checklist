@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 ml-3 text-dark">Gerenciamento de complexidades</h1>
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
<form action="{{ URL::route('complexidades.index') }}" method="post">
        @csrf

        Nome:
        <input class="form-control" type="text" name="nome">
        <br>
        Prazo em dias:
        <input class="form-control" type="number" name="prazo">
        <br>

        <button class="btn btn-success" type="submit">Salvar</button>
    </form>
@stop