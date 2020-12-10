@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 ml-3 text-dark">Seja Bem-Vindo <b>{{ Auth::user()->name }}</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h3>Home</h3>
                    
                </div>
            </div>
        </div>
    </div>
@stop
