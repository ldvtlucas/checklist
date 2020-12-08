
@extends('adminlte::page')

@section('title', 'Checklists')

@section('content_header')
    <h1 class="m-0 text-dark">Gerenciamento de checklists</h1>
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')

<form action="{{ URL::route('checklist.update', [$pj_id, $pcs_id, $checklist->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        Nome:
        <input class="form-control" type="text" name="nome" value="{{ $checklist->nome_artefato }}">
        <br>
        Descrição:
        <textarea class="form-control" name="descricao" id="" cols="30" rows="10">{{ $checklist->descricao }}</textarea>
        <br>
        Perguntas:
        <table class="table table-striped" id="tbPerguntas" width="70%">
            <thead>
                <th>Pergunta</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach ($checklist->perguntas as $pergunta)
                    <tr>
                        <td>
                            <input class="form-control" type="text" name="pergunta_" value="{{ $pergunta }}">
                        </td>
                        <td><button class="btn btn-dark" type="button" class="btnRemove">X</button></td>
                    </tr>
                @endforeach
                <tr>
                    <td align="center"><button class="btn btn-success" type="button" id="btnAdd">+ Adicionar pergunta</button></td>
                </tr>
            </tbody>
        </table>
        <button class="btn btn-success" type="submit">Salvar</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            var contador_pergunta = 0;

            $('input[name^="pergunta_"]').each(function() {
                $(this).attr('name', 'pergunta_'+contador_pergunta);
                contador_pergunta++;
            });
            
            $('#btnAdd').click(function() {
                if ($('#tbPerguntas').find('tr:last').prev().find('input:first').val()){
                    contador_pergunta++;
                    $('#tbPerguntas').find('tr:last').prev().after('<tr><td><input class="form-control" type="text" name="pergunta_'+contador_pergunta+'" id=""></td><td><button class="btn btn-dark" type="button" class="btnRemove">X</button></td></tr>');
                }
                return false;
            });

            $(document.body).on("click", ".btnRemove", function() {
                $(this).parent().parent().remove();
            });
        });
    </script>
@stop