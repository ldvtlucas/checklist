
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Controle de não conformidades</h1>
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
<form action="{{ URL::route('nao-conformidades.index') }}" method='POST'>
        @csrf
        Causa
        <input class="form-control" type="text" name="causa" required autofocus><br>

        Tratativa
        <input class="form-control" type="text" name="tratativa"><br>

        Complexidade
        <select class="form-control" name="complexidade" id="complexidade">
            <option value="">Selecionar complexidade</option>
            @foreach ($complexidades as $cplx)
                <option value="{{ $cplx->id }}" prazo="{{ $cplx->prazo }}">{{ $cplx->nome.' ('.$cplx->prazo.' dias)' }}</option>
            @endforeach
        </select><br>

        Projeto
        <select class="form-control" name="projeto" id="projeto" required autofocus>
            <option value="">Selecionar projeto</option>
            @foreach ($projetos as $pj)
                <option value="{{ $pj->id }}">{{ $pj->id.' - '.$pj->nome }}</option>
            @endforeach
        </select><br>

        Checklist
        <select class="form-control" name="checklist" id="checklist" disabled required autofocus>
            <option value="">Selecionar checklist</option>
            @foreach ($checklists as $cl)
                <option value="{{ $cl->id }}" projeto="{{ $cl->pj_id }}" hidden>{{ $cl->nome_artefato }}</option>
            @endforeach 
        </select><br>

        Responsavel
        <input class="form-control" type="text" name="responsavel"><br>

        Prazo
        <input class="form-control" type="text" id="prazo" value="" disabled><br>

        Data de inicio
        <input class="form-control" type="date" name="data_inicio" id="data_inicio">

        <br>
        <div style="text-align: right;">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
        
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // altera prazo para a complexidade selecionada
            $('#complexidade').change(function() {
                if ($(this).val()) {
                    var prazo = $('option:selected', this).attr('prazo');
                    $('#prazo').val(prazo);
                }
            });
            // Altera opcoes de checklist com base no projeto
            $('#projeto').change(function() {
                if ($(this).val()) {
                    $('#checklist').prop('disabled', false);
                    $('option', '#checklist').each(function () {
                        if ($(this).attr('projeto') == $('#projeto').val()){
                            $(this).prop('hidden', false);
                        } else {
                            $(this).prop('hidden', true);
                        }
                    });
                } else {
                    $('#checklist').prop('disabled', true);
                }
            });
        });
    </script>
    </form>
@stop