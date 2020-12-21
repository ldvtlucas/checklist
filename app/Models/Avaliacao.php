<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Avaliacao extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['loja', 'checklist', 'respostas'];
    
    public static function respostasToJson($request) {
        $request = $request->all();
        $respostas = array();

        $keys = array_keys($request);
        foreach ($keys as $key) {
            if (strpos($key, 'resposta_') > -1) {
                $id = str_replace('resposta_', '', $key);
                $value = $request[$key];
                $respostas[$id] = $value;
            }
        }
        return json_encode($respostas);
    }
}
