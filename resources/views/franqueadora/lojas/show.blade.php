@extends('adminlte::page')

@section('title', 'Lojas')

@section('content_header')
    <div class="container d-flex justify-content-between">
            <h1 class="m-0 text-dark">{{ $loja->nome }}</h1>
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
                    <div class="data-container">
                        <div class="d-flex justify-content-center">
                            <div class="w-50">
                                <table class="table table-borderless border-right">
                                    <tr>
                                        <td><label for="">Nome:</label> </td>
                                        <td>{{ $loja->nome }}</td>
                                    </tr>
                                    <tr>
                                        <td><label for="">CNPJ:</label> </td>
                                        <td>{{ $loja->cnpj }}</td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Cidade:</label> </td>
                                        <td>{{ $loja->cidade }}</td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Bairro:</label> </td>
                                        <td>{{ $loja->bairro }}</td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Numero:</label> </td>
                                        <td>{{ $loja->numero }}</td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Telefone de contato:</label> </td>
                                        <td>{{ $loja->telefone }}</td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Responsável:</label> </td>
                                        <td>{{ $loja->responsavel }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="w-50">
                                <table class="table table-borderless border-left ml-2">
                                    <tr>
                                        <td><label for="">Razão social:</label> </td>
                                        <td>{{ $loja->r_social }}</td>
                                    </tr>
                                    <tr>
                                        <td><label for="">CEP:</label> </td>
                                        <td>{{ $loja->cep }}</td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Estado:</label> </td>
                                        <td>{{ $loja->estado }}</td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Rua:</label> </td>
                                        <td>{{ $loja->rua }}</td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Complemento:</label> </td>
                                        <td>{{ $loja->complemento }}</td>
                                    </tr>
                                    <tr>
                                        <td><label for="">E-mail de contato:</label> </td>
                                        <td>{{ $loja->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Data do contrato:</label> </td>
                                        <td>{{ date('d/m/Y', strtotime($loja->data_contrato)) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop