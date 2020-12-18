@extends('adminlte::page')

@section('title', 'Avaliação')

@section('content_header')
    <div class="d-flex flex-row justify-content-between">
        <h1 class="m-0 text-dark ml-3">Avaliação</h1>
    </div>
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row justify-content-between">
                        <b>Etapa {{ $step.' - '.$step_desc }}</b>
                        @if ($step != 1)
                            <b>{{ $loja }}</b>
                        @endif
                        
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li> 
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($step == 1)
                        @include('franqueado.avaliacao.partials.step1')
                    @endif
                    @if ($step == 2)
                        @include('franqueado.avaliacao.partials.step2')
                    @endif
                    @if ($step == 3)
                        @include('franqueado.avaliacao.partials.step3')
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop