@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <div class="container">
        <div class="d-flex justify-content-start">
            <h1 class="m-0 text-dark">Cadastro de Categoria</h1>
            <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        </div>
    </div>
    
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
                    <a href="{{ URL::to(route('categorias.index')) }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
                    <form action="{{ URL::route('categorias.store') }}" method="POST">
                        @csrf
                        @include('franqueadora.categorias.form')
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <script>
        $(document).ready(function() {

            // alterar tamanho do textarea dinamicamente
            $('form').on('keydown', '.textarea-to-input', function(e){
                if(e.which == 13) {e.preventDefault();}
            }).on('input', '.textarea-to-input', function(){
                $(this).height(1);
                var totalHeight = $(this).prop('scrollHeight') - parseInt($(this).css('padding-top')) - parseInt($(this).css('padding-bottom'));
                $(this).height(totalHeight);
            });

        });
    </script>
@stop