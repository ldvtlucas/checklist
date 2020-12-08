
@extends('adminlte::page')

@section('title', 'Checklists')

@section('content_header')
    <h1 class="m-0 text-dark">Gerenciamento de checklists</h1>
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
<form action="{{ URL::route('checklist.avaliado', [$pj_id, $pcs_id, $checklist->id]) }}" method="POST">
        @csrf
        <table class="table table-striped">
            <thead>
                <th>Perguntas</th>
                <th>Respostas</th>
            </thead>
            <tbody>
                @foreach ($checklist->perguntas as $pergunta)
                <tr>
                    <td>
                        <label class="form-control" for="pergunta">{{ $pergunta }}</label>
                    </td>
                    <td>
                        <select class="form-control resposta" id="resposta" name="resposta">
                            <option value="" hidden></option>
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                            <option value="naoAplica">Não se aplica</option>
                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
        <button class="btn btn-success" type="submit">Enviar</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            var contador_resposta = 0;

            $('select[name^="resposta"]').each(function() {
                $(this).attr('name', 'resposta_'+contador_resposta);
                contador_resposta++;
            });

        });
    </script>
@stop