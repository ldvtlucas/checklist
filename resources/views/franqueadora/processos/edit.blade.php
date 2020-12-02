
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Gerenciamento de processos</h1>
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
<form action="{{ URL::route('processos.update', $processo->id) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        Nome:
        <input class="form-control" type="text" name="nome" value="{{ $processo->nome }}">
        <br>
        Descrição:
        <textarea class="form-control" name="descricao" id="" cols="30" rows="10">{{ $processo->descricao }}</textarea>
        <br>
    
        
        <br>
        <button class="btn btn-success" type="submit">Salvar</button>
    </form>
@stop
