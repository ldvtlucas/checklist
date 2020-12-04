<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loja extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome', 'r_social', 'cnpj', 'cep', 'estado', 
                            'cidade', 'bairro', 'rua', 'numero', 'complemento',
                            'telefone', 'email', 'responsavel', 'data_contrato'];

    public static $rules = [
        'nome'          => 'required|min:3|max:100',
        'r_social'      => 'required|min:4|max:200',
        'cnpj'          => 'required|min:18|max:18|cnpj',
        'cep'           => 'required|min:9|max:9',
        'estado'        => 'required|min:2|max:2',
        'cidade'        => 'required|min:3|max:60',
        'bairro'        => 'required|min:3|max:60',
        'rua'           => 'required|min:4|max:100',
        'numero'        => 'required',
        'complemento'   => 'max:200',
        'telefone'      => 'nullable|min:14|max:15',
        'email'         => 'nullable|min:7|max:100',
        'responsavel'   => 'nullable|max:100',
        'data_contrato' => 'nullable|date',

    ];

    public static $correct_names = [
        'nome'          => 'Nome',
        'r_social'      => 'Razão social',
        'cnpj'          => 'CNPJ',
        'cep'           => 'CEP',
        'estado'        => 'Estado',
        'cidade'        => 'Cidade',
        'bairro'        => 'Bairro',
        'rua'           => 'Rua',
        'numero'        => 'Número',
        'complemento'   => 'Complemento',
        'telefone'      => 'Telefone',
        'email'         => 'E-Mail',
        'responsavel'   => 'Responsável',
        'data_contrato' => 'Data do contrato',
    ];
}
