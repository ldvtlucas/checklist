
@extends('adminlte::page')

@section('title', 'Checklists')

@section('content_header')
    <h1 class="m-0 ml-3 text-dark">Detalhes do checklists</h1>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ URL::to(route('checklists.index')) }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
                    <div class="d-flex flex-column mt-3">
                        <div class="d-flex flex-row">
                            <label for="nome">Nome:</label>
                            <span class="ml-2">{{ $checklist->nome }}</span>
                        </div>
                        <div class="d-flex flex-row">
                            <label for="descricao">Descrição:</label>
                            <span class="ml-2">{{ $checklist->descricao }}</span>
                        </div>
                        <div class="d-flex flex-row">
                            <label for="categoria">Categoria:</label>
                            <span class="ml-2">{{ $checklist->categoria->id.' - '.$checklist->categoria->nome }}</span>
                        </div>
                        <div class="d-flex flex-column">
                            <label for="perguntas">Perguntas:</label>
                            <div class="perguntas-wraper">
                                @php
                                    $i = 1;
                                    foreach ($checklist->perguntas as $pergunta) {
                                        echo '
                                            <div class="itemCard d-flex flex-column border p-3 mb-3 bg-light">
                                                <div class="d-flex flex-row align-items-start">
                                                    <nobr class="mt-2"><b class="lblNumero">'.$i.' - </b> </nobr>
                                                    <textarea disabled class="form-control textarea-to-input mx-2" name="pergunta_'.$i.'" rows="1">'.$pergunta->pergunta.'</textarea>
                                                    <button class="btn  btnRemove" type="button"><i class="fas fa-times"></i></button>
                                                </div>
                                                <div class="d-flex flex-row align-items-end mt-2">
                                                    <b class="ml-auto">Peso:</b>
                                                    <input type="text" disabled class="form-control ml-2 inPeso" value="'.$pergunta->peso.'"  name="peso_'.$i.'">
                                                </div>
                                            </div>';
                                        $i++;
                                    }
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('/js/jquery/dynamicTextarea.js') }}"></script>
@stop