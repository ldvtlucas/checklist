@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Gerenciamento de complexidades</h1>
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
<form action="{{ URL::route('complexidades.update', $complexidade->id) }}" method="post">
        @csrf
        <input class="form-control" type="hidden" name="_method" value="PUT">
        Número:
        <input class="form-control" type="number" name="id" value="{{ $complexidade->id }}">
        <br>
        Nome:
        <input class="form-control" type="text" name="nome" value="{{ $complexidade->nome }}">
        <br>
        Prazo em dias:
        <input class="form-control" type="number" name="prazo" value="{{ $complexidade->prazo }}">
        <br>

        <button class="btn btn-success" type="submit">Salvar</button>
    </form>
@stop
