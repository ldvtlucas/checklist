@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <div class="d-flex flex-row justify-content-between">
        <h1 class="m-0 ml-3 text-dark">Checklists para Avaliar</h1>
        {{-- if user has role franqueadora --}}
        {{-- <a href="{{ URL::route('checklists.create') }}" class="btn btn-success"> <i class="fas fa-plus"></i> Adicionar</a> --}}
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
                            <th width="25%">Nome</th>
                            <th width="45%">Descrição</th>
                            <th width="27%">Ações</th>
                        </thead>
                        <tbody>
                            @if (isset($checklists))
                                @foreach ($checklists as $cl)
                                    <td>{{ $cl->id }}</td>
                                    <td>{{ $cl->nome }}</td>
                                    <td><div class="lines-2">{{ $cl->descricao }}</div></td>
                                    <td>
                                        <a href="{{ URL::to(route('avaliacao.show', $cl->id)) }}" class="btn btn-success"><i class="fas fa-check"></i> Avaliar</a>
                                        <button class="btn btn-info btn-showModal" data-toggle="modal" data-target="#showModal" 
                                            data-id="{{ $cl->id }}" data-nome="{{ $cl->nome }}" 
                                            data-descricao="{{ $cl->descricao }}" data-categoria="{{ $cl->categoria }}"><i class="far fa-eye"></i> Detalhes</button>
                                    </td>
                                @endforeach
                            @endif
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
                        <tr>
                            <td><label for="categoria">Categoria:</label></td>
                            <td id="modalCategoria"></td>
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
                    descricao = $(this).data("descricao"),
                    categoria = $(this).data("categoria");

                modal.find("#modalId").text(id);
                modal.find("#modalNome").text(nome);
                modal.find("#modalDescricao").text(descricao);
                modal.find("#modalCategoria").text(categoria);
            });  
        });
      </script>

@stop