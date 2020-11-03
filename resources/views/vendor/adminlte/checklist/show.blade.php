
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Gerenciamento de checklists</h1>
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
<a href="{{ url()->previous() }}">Voltar</a>
    <br>
    @csrf
    Nome:
    <label class="form-control" for="nome">{{ $checklist->nome_artefato }}</label>
    <br>
    Descrição:
    <label class="form-control" for="nome">{{ $checklist->descricao }}</label>
    <br>
    Perguntas:
    <table class="table table-striped" id="tbPerguntas" width="70%">
        <thead>
            <th>Perguntas</th>
            <th>Respostas</th>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($checklist->perguntas); $i++)
                <tr>
                    <td>{{ $checklist->perguntas[$i] }}</td>
                    <td>{{ $checklist->respostas[$i] }}</td>
                </tr>
            @endfor
        </tbody>
    </table>
@stop