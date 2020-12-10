<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checklist extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['nome', 'descricao', 'categoria', 'perguntas'];

    public static $rules = [
        'nome' => 'required|max:100',
    ];

    public static $correct_names = [
        'nome' => 'Nome',
        'descricao' => 'Descrição',
        'categoria' => 'Categoria',
        'perguntas' => 'Perguntas',
    ];
    
    public static function perguntaToJson($request) {
        $result = array();
        $request = $request->all();
        $keys = array_keys($request);

        
        // adicionar cada item (pergunta, resposta e peso) ao array result
        $item = array();
        foreach ($keys as $key) {
            if (strpos($key, 'pergunta_') > -1) {
                $id = str_replace('pergunta_', '', $key);

                // injetar resposta para cada pergunta que já não tenha
                if (!isset($keys['resposta_'.$id])) {
                    array_push($keys, 'resposta_'.$id);
                    $request['resposta_'.$id] = 0;
                }

                // inserir valores em item
                $item['pergunta'] = $request['pergunta_'.$id];
                $item['resposta'] = $request['resposta_'.$id];
                $item['peso'] = $request['peso_'.$id];
                array_push($result, $item);
                $item = array();
            }
        }
        return json_encode($result);
    }

    public static function respostaToJson($request) {
        $result = array();
        $request = $request->all();
        $keys = array_keys($request);
        foreach ($keys as $key) {
            if (strpos($key, 'resposta_') > -1) {
                array_push($result, $request[$key]);
            }
        }
        return json_encode($result);
    }

}
