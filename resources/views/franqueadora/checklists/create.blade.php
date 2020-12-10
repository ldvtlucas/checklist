
@extends('adminlte::page')

@section('title', 'Checklists')

@section('content_header')
    <h1 class="m-0 ml-3 text-dark">Criação de checklist</h1>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
@stop

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li> 
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ URL::to(route('checklists.index')) }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
                <form action="{{ URL::route('checklists.store') }}" method="post">
                    @csrf
                    @include('franqueadora.checklists.form')
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/jquery/checklist.js') }}"></script>
    <script src="{{ asset('/js/jquery/dynamicTextarea.js') }}"></script>
@stop