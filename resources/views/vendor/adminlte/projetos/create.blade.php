@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Projetos</h1>
@stop

@section('content')
<a class="btn btn-info" href="javascript:history.back()">Voltar</a>
<br>
<br>


<form action="{{ URL::route('projetos.index') }}" method="POST">
        @csrf
        Nome:
        <input class="form-control" type="text" name="nome">
        <br>
        Descrição:
        <textarea class="form-control" name="descricao" id="" cols="30" rows="10"></textarea>
        <br>
        Status:
        <input class="form-control" type="text" name="status">
        
        <br>
        <button class="btn btn-success" type="submit">Salvar</button>
    </form>
@stop