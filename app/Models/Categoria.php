<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome', 'descricao'];

    public static $rules = [
        'nome' => 'required|max:100',
        'descricao' => 'nullable',
    ];

    public static $correct_names = [
        'nome'      => 'Nome',
        'descricao' => 'Descrição',
    ];
}
