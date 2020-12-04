@extends('adminlte::page')

@section('title', 'Lojas')

@section('content_header')
    <div class="container">
        <div class="d-flex justify-content-start">
            <h1 class="m-0 text-dark">Edição de Loja</h1>
        </div>
    </div>
    
    <link href ="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ URL::to(url()->previous()) }}" class="btn btn-primary">Voltar</a>
                    <form action="{{ URL::route('lojas.update', $loja->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group mt-2">
                            <div class="d-flex justify-content-center">
                                <div class="w-50">
                                    <label for="nome">Nome:</label>
                                    <br>
                                    <input type="text" name="nome" class="form-control" value="{{isset($loja->nome) ? $loja->nome : old('nome')}}" required autofocus>
                                </div>
                                <div class="ml-2 w-50">
                                    <label for="r_social">Razão social:</label>
                                    <br>
                                    <input type="text" name="r_social" class="form-control" value="{{ $loja->r_social }}">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-2">
                                <div class="w-25">
                                    <label for="cnpj">CNPJ:</label>
                                    <br>
                                    <input type="text" name="cnpj" class="form-control cnpj" value="{{ $loja->cnpj }}" required autofocus>
                                </div>
                                <div class="ml-2 w-25">
                                    <label for="cep">CEP:</label>
                                    <br>
                                    <input type="text" name="cep" id="cep" class="form-control cep" value="{{ $loja->cep }}">
                                </div>
                                <div class="ml-2 w-25">
                                    <label for="cidade">Cidade:</label>
                                    <br>
                                    <input type="text" name="cidade" id="cidade" class="form-control" value="{{ $loja->cidade }}" required autofocus>
                                </div>
                                <div class="ml-2 w-25">
                                    <label for="estado">Estado:</label>
                                    <br>
                                    <input type="text" name="estado" id="uf" class="form-control" value="{{ $loja->estado }}" required autofocus>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-2">
                                <div class="w-25">
                                    <label for="bairro">Bairro:</label>
                                    <br>
                                    <input type="text" name="bairro" id="bairro" class="form-control" value="{{ $loja->bairro }}" required autofocus>
                                </div>
                                <div class="ml-2 w-50">
                                    <label for="rua">Rua:</label>
                                    <br>
                                    <input type="text" name="rua" id="rua" class="form-control" value="{{ $loja->rua }}" required autofocus>
                                </div>
                                <div class="ml-2 w-25">
                                    <label for="numero">Número:</label>
                                    <br>
                                    <input type="text" name="numero" class="form-control" value="{{ $loja->numero }}" required autofocus>
                                </div>
                                
                            </div>
                            <div class="d-flex justify-content-center mt-2">
                                <div class="w-75">
                                    <label for="complemento">Complemento:</label>
                                    <br>
                                    <input type="text" name="complemento" class="form-control" value="{{ $loja->complemento }}">
                                </div>
                                <div class="ml-2 w-25">
                                    <label for="telefone">Telefone de contato:</label>
                                    <br>
                                    <input type="text" name="telefone" class="form-control telefone" value="{{ $loja->telefone }}">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-2">
                                <div class="w-50">
                                    <label for="email">E-mail de contato:</label>
                                    <br>
                                    <input type="text" name="email" class="form-control" value="{{ $loja->email }}">
                                </div>
                                <div class="ml-2 w-50">
                                    <label for="responsavel">Nome do responsável:</label>
                                    <br>
                                    <input type="text" name="responsavel" class="form-control" value="{{ $loja->responsavel }}">
                                </div>
                                <div class="ml-2">
                                    <label for="data_contrato">Data do contrato:</label>
                                    <br>
                                    <input type="date" name="data_contrato" class="form-control" value="{{ substr($loja->data_contrato, 0, 10) }}">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-success w-50">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

   <!-- Adicionando Javascript -->
   <script src="{{ asset('js/jquery/consultaCep.js') }}"></script>
   {{-- jQuery Mask --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
   <script>
       $(document).ready(function($){
           $('.cep').mask('00000-000');
           $('.cpf').mask('000.000.000-00', {reverse: true});
           $('.cnpj').mask('00.000.000/0000-000', {reverse: true});
           var maskBehavior = function (val) {
               return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
           },
           options = {onKeyPress: function(val, e, field, options) {
           field.mask(maskBehavior.apply({}, arguments), options);
           }};
           
           $('.telefone').mask(maskBehavior, options);
       });
   </script>
@stop