
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Controle de não conformidades</h1>
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
<form action="{{ URL::route('nao-conformidades.update', $nc->id) }}" method='POST'>
        @csrf
        <input type="hidden" name="_method" value="PUT">
        Causa
        <input class="form-control" type="text" name="causa" value="{{ $nc->causa }}" required autofocus><br>

        Tratativa
        <input class="form-control" type="text" name="tratativa" value="{{ $nc->tratativa }}"><br>

        Complexidade
        <select class="form-control" name="complexidade" id="complexidade">
            <option value="{{ $nc->cplx_id }}">{{ $nc->cplx_id.' - '.$nc->cplx->nome }}</option>
            @foreach ($complexidades as $cplx)
                <option value="{{ $cplx->id }}" prazo="{{ $cplx->prazo }}">{{ $cplx->id.' - '.$cplx->nome }}</option>
            @endforeach
        </select><br>

        Projeto
        <select class="form-control" name="projeto" id="projeto" required autofocus>
            <option value="{{ $nc->pj_id }}">{{ $nc->pj->id.' - '.$nc->pj->nome }}</option>
            @foreach ($projetos as $pj)
                <option value="{{ $pj->id }}">{{ $pj->id.' - '.$pj->nome }}</option>
            @endforeach
        </select><br>

        Checklist
        <select class="form-control" name="checklist" id="checklist" required autofocus>
            <option value="{{ $nc->cl->id }}" projeto="{{ $nc->cl->pj_id }}">{{ $nc->cl->nome_artefato }}</option>
            @foreach ($checklists as $cl)
                <option value="{{ $cl->id }}" projeto="{{ $cl->pj_id }}" hidden>{{ $cl->nome_artefato }}</option>
            @endforeach 
        </select><br>

        Escalonada
        <input class="form-control" type="text" name="escalonada" value="{{ $nc->escalonada }}"><br>

        Responsavel
        <input class="form-control" type="text" name="responsavel" value="{{ $nc->responsavel }}"><br>

        Prazo
        <input class="form-control" type="text" id="prazo" value="{{ $nc->cplx->prazo }}" disabled><br>
        
        Data de inicio
        <input class="form-control" type="date" name="data_inicio" id="data_inicio" value="{{ date('Y-m-d', strtotime($nc->data_inicio)) }}">
        <br>
        Data do fim
        @if (isset($nc->data_fim))
            <input class="form-control" type="date" name="data_fim" id="data_fim" value="{{ date('Y-m-d', strtotime($nc->data_fim)) }}"><br>
        @else
            <input class="form-control" type="date" name="data_fim" id="data_fim"><br>
        @endif

        Status
        <input class="form-control" type="text" name="status" value="{{ $nc->status }}"><br>

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