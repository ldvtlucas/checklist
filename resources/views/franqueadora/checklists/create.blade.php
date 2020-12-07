
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1 class="m-0 text-dark">Gerenciamento de checklists</h1>
    </div>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ URL::to(route('checklists.index')) }}" class="btn btn-primary">Voltar</a>
                <form action="{{ URL::route('checklists.store') }}" method="post">
                    @csrf
                    <div class="form-container">
                        <div class="d-flex justify-content-start">
                            <div class="w-100">
                                <label for="nome">Nome:</label>
                                <br>
                                <input class="form-control" type="text" name="nome">
                            </div>
                        </div>
                        <div class="d-flex justify-content-start mt-2">
                            <div class="w-100">
                                <label for="descricao">Descrição:</label>
                                <br>
                                <textarea class="form-control textarea-to-input" name="descricao" id="" cols="30" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start mt-2">
                            <div class="w-100">
                                <label for="categoria">Categoria:</label>
                                <br>
                                <select name="categoria" class="form-control">
                                    <option value="">Categoria</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start mt-2">
                            <div class="w-100">
                                <label for="categoria">Perguntas:</label>
                                <br>
                                <table class="table table-borderless w-100" id="tbPerguntas" >
                                    <tr class="only-padding-bottom">
                                        <td class="w-100 only-padding-bottom"><textarea class="form-control textarea-to-input" name="pergunta_1" rows="1"></textarea></td>
                                        <td class="only-padding-bottom"><button class="btn btn-light btnRemove" type="button"><i class="fas fa-times"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><button class="btn btn-link text-secondary w-50" type="button" id="btnAdd"><i class="fas fa-plus"></i> Adicionar</a></button></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success" type="submit">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
    
    <script>
        $(document).ready(function() {
            // adicionar perguntas
            var contador_pergunta = 1;
            $('#btnAdd').click(function() {
                if ($('#tbPerguntas').find('tr:last').prev().find('textarea:first').val()){
                    contador_pergunta++;
                    var newRow = '<tr class="only-padding-bottom"><td class="w-100 only-padding-bottom"><textarea class="form-control textarea-to-input" name="pergunta_'+contador_pergunta+'" rows="1"></textarea></td><td class="only-padding-bottom"><button class="btn btn-light btnRemove" type="button"><i class="fas fa-times"></i></button></td></tr>'
                    $('#tbPerguntas').find('tr:last').prev().after(newRow);
                }
                return false;
            });

            // remover perguntas
            $(document.body).on("click", ".btnRemove", function() {
                $(this).parent().parent().remove();
            });

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