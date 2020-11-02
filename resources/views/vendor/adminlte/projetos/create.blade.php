@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Projetos</h1>
@stop

@section('content')
<form action="{{ URL::route('projetos.index') }}" method="POST">
        @csrf
        Nome:
        <input type="text" name="nome">
        <br>
        Descrição:
        <textarea name="descricao" id="" cols="30" rows="10"></textarea>
        <br>
        Status:
        <input type="text" name="status">
        
        <br>
        <button type="submit">Salvar</button>
    </form>
@stop