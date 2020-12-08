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

        $pergunta = array();
        $resposta = array();
        $peso = array();
        $item = array();
        $keys = array_keys($request);
        foreach ($keys as $key) {
            
            if (strpos($key, 'pergunta_') > -1) { 
                $item['pergunta'] = $request[$key];
            } 
            else if (strpos($key, 'resposta_') > -1) {
                $item['resposta'] = $request[$key];
            } 
            else if (strpos($key, 'peso_') > -1) {
                $item['peso'] = $request[$key];
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
