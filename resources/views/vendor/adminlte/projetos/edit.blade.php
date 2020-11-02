@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Projetos</h1>
@stop

@section('content')
<form action="{{ URL::route('projetos.update', $projeto->id) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        Nome:
        <input type="text" name="nome" value="{{ $projeto->nome }}">
        <br>
        Descrição:
        <textarea name="descricao" id="" cols="30" rows="10">{{ $projeto->descricao }}</textarea>
        <br>
        Status:
        <input type="text" name="status" value="{{ $projeto->status }}">
        
        <br>
        <button type="submit">Salvar</button>
    </form>
@stop