@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <div class="d-flex flex-row justify-content-between">
        <h1 class="m-0 ml-3 text-dark">Gerenciamento de Categorias</h1>
        <a href="{{ URL::route('categorias.create') }}" class="btn btn-success"> <i class="fas fa-plus"></i> Adicionar</a>
    </div>
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped border">
                        <thead>
                            <th width="3%">#</th>
                            <th width="20%">Nome</th>
                            <th width="50%">Descrição</th>
                            <th width="27%">Ações</th>
                        </thead>
                        <tbody>
                            @isset($categorias)
                                @foreach ($categorias as $categoria)
                                <tr>
                                    <td>{{ $categoria->id }}</td>
                                    <td>{{ $categoria->nome }}</td>
                                    <td><div class="lines-2">{{ $categoria->descricao }}</div></td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-info btn-showModal" data-toggle="modal" data-target="#showModal" data-id="{{ $categoria->id }}" data-nome="{{ $categoria->nome }}" data-descricao="{{ $categoria->descricao }}"><i class="far fa-eye"></i> Detalhes</button>
                                            <a href="{{ URL::route('categorias.edit', $categoria->id) }}" class="btn btn-primary ml-2"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ URL::route('categorias.destroy', $categoria->id) }}" method="POST" onsubmit="if (!confirm('Deseja realmente excluir?')) return false;">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger ml-2"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Show modal --}}
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="showModalLabel">Detalhes</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless ">
                    <tbody>
                        <tr>
                            <td><label for="id">ID:</label></td>
                            <td id="modalId"></td>
                        </tr>
                        <tr>
                            <td><label for="nome">Nome:</label></td>
                            <td id="modalNome"></td>
                        </tr>
                        <tr>
                            <td><label for="descricao">Descrição:</label></td>
                            <td id="modalDescricao"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script>
        $(document).ready(function () {
            $('.btn-showModal').on('click', function() {
                var modal     = $('div#showModal'),
                    id        = $(this).data("id"),
                    nome      = $(this).data("nome"),
                    descricao = $(this).data("descricao");

                modal.find("#modalId").text(id);
                modal.find("#modalNome").text(nome);
                modal.find("#modalDescricao").text(descricao);
            });  
        });
      </script>
@stop