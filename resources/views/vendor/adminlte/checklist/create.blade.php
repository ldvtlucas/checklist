
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Gerenciamento de checklists</h1>
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
<form action="{{ URL::route('checklist.store', [$pj_id, $pcs_id]) }}" method="post">
        @csrf
        Nome:
        <input class="form-control" type="text" name="nome">
        <br>
        Descrição:
        <textarea class="form-control" name="descricao" id="" cols="30" rows="10"></textarea>
        <br>
        <br>
        Perguntas:
        <table class="table table-striped" id="tbPerguntas"  width="70%">
            <thead>
                <th>Pergunta</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <tr>
                    <td><input class="form-control" type="text" name="pergunta_1" id=""></td>
                    <td><button class="btnRemove btn btn-dark" type="button">X</button></td>
                </tr>
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
            var contador_pergunta = 1;
            $('#btnAdd').click(function() {
                if ($('#tbPerguntas').find('tr:last').prev().find('input:first').val()){
                    contador_pergunta++;
                    $('#tbPerguntas').find('tr:last').prev().after('<tr><td><input class="form-control" type="text" name="pergunta_'+contador_pergunta+'" id=""></td><td><button class="btnRemove btn btn-dark" type="button">X</button></td></tr>');
                }
                return false;
            });

            $(document.body).on("click", ".btnRemove", function() {
                $(this).parent().parent().remove();
            });
        });
    </script>
@stop