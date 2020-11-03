@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Você está logado! Selecione o projeto:</p>
                </div>
                <br>
                <br>
                <br>
                <select class="form-control"name="projeto" id="projeto">
                    <option value="">Selecione um projeto</option>
                    @foreach ($projetos as $pj)
                        <option value="{{ $pj->id }}">{{ $pj->id." - ".$pj->nome }}</option>
                    @endforeach
                </select>
                {{-- importa jquery --}}
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                {{-- exibe processos apenas apos selecionar o projeto --}}
                <script>
                    $(document).ready(function() {

                        $('#divProcessos').hide();

                        $('#projeto').change(function() {
                            if ($(this).val()) {
                                $('#divProcessos').show();
                            } else {
                                $('#divProcessos').hide();
                            }
                        });

                        $('.processo').click(function () {
                            $(this).attr('href', 'home/'+$('#projeto').val()+'/'+$(this).attr('id')+'/checklist');
                        });
                    });
                </script>
                <div id="divProcessos">
                    @foreach ($processos as $processo)
                        <br>
                        <a class="processo" id="{{ $processo->id }}" href="">{{ $processo->nome }}</a>
                    @endforeach
                </div>
    
            </div>
        </div>
    </div>
@stop
