<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    public static function perguntaToJson($request) {
        $result = array();
        $request = $request->all();
        $keys = array_keys($request);
        foreach ($keys as $key) {
            if (strpos($key, 'pergunta_') > -1) {
                array_push($result, $request[$key]);
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
