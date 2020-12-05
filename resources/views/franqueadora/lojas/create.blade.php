@extends('adminlte::page')

@section('title', 'Lojas')

@section('content_header')
    <div class="container">
        <div class="d-flex justify-content-start">
            <h1 class="m-0 text-dark">Cadastro de Lojas</h1>
        </div>
    </div>
    
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
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
                    <a href="{{ URL::to(route('lojas.index')) }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
                    <form action="{{ URL::route('lojas.store') }}" method="POST">
                        @csrf
                        @include('franqueadora.lojas.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
    
     <!-- Adicionando JQuery -->
     <script src="https://code.jquery.com/jquery-3.4.1.min.js"
     integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
     crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    {{-- Consulta CEP --}}
    <script src="{{ asset('js/jquery/consultaCep.js') }}"></script>
    {{-- jQuery Mask --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script>
        $(document).ready(function($){
            $('.cep').mask('00000-000');
            $('.cpf').mask('000.000.000-00', {reverse: true});
            $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
            var maskBehavior = function (val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            options = {onKeyPress: function(val, e, field, options) {
            field.mask(maskBehavior.apply({}, arguments), options);
            }};
            
            $('.telefone').mask(maskBehavior, options);
        });
    </script>
    
@stop