
@extends('adminlte::page')

@section('title', 'Checklists')

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
                <a href="{{ URL::to(route('checklists.index')) }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
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
                                    <option value="" hidden>Selecione uma categoria</option>
                                    @foreach ($categorias as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->id.' - '.$cat->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start mt-2">
                            <div class="w-100">
                                <label for="categoria">Perguntas:</label>
                                <div class="pergutnas-wraper ">
                                    <div class="itemCard d-flex flex-column border p-3 bg-light">
                                        <div class="d-flex flex-row align-items-start">
                                            <nobr class="mt-2"><b>1 - </b> </nobr>
                                            <textarea class="form-control textarea-to-input mx-2" name="pergunta_1" rows="1"></textarea>
                                            <button class="btn  btnRemove" type="button"><i class="fas fa-times"></i></button>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mt-2">
                                            <b>Resposta:</b>
                                            <div class="radio-wraper m-2">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="resposta_1" id="resposta_1" value="Sim"> Sim
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="resposta_1" id="resposta_1" value="Não"> Não
                                                    </label>
                                                </div>
                                            </div>
                                            <b class="ml-auto">Peso:</b>
                                            <input type="text" class="form-control ml-2 inPeso" value="1" name="peso_1">
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-wraper d-flex justify-content-center mt-2">
                                    <button type="button" class="btn w-50 text-secondary" id="btnAdd"><i class="fas fa-plus"></i> Adicionar pergunta</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-success" type="submit">Salvar</button>
                    </div>
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
                contador_pergunta++;
                var newCard = `
                        <div class="itemCard d-flex flex-column border p-3 mt-3 bg-light">
                            <div class="d-flex flex-row align-items-start">
                                <nobr class="mt-2"><b>`+contador_pergunta+` - </b> </nobr>
                                <textarea class="form-control textarea-to-input mx-2" name="pergunta_`+contador_pergunta+`" rows="1"></textarea>
                                <button class="btn  btnRemove" type="button"><i class="fas fa-times"></i></button>
                            </div>
                            <div class="d-flex flex-row align-items-center mt-2">
                                <b>Resposta:</b>
                                <div class="radio-wraper m-2">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="resposta_`+contador_pergunta+`" id="resposta_`+contador_pergunta+`" value="Sim"> Sim
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="resposta_`+contador_pergunta+`" id="resposta_`+contador_pergunta+`" value="Não"> Não
                                        </label>
                                    </div>
                                </div>
                                <b class="ml-auto">Peso:</b>
                                <input type="text" class="form-control ml-2 inPeso" value="1" name="peso_`+contador_pergunta+`">
                            </div>
                        </div>`
                $('.itemCard').last().after(newCard);
                return false;
            });

            // remover perguntas
            $(document.body).on("click", ".btnRemove", function() {
                // $(this).parent().parent().remove();
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