<?php
namespace App\Api;

class ApiMessage {
    public static function message($mensagem, $status)
    {
        return [
            'data' => [
                'msg'    => $mensagem,
                'status' => $status
            ]
        ];
    }
}