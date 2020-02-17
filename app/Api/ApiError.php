<?php
namespace App\Api;

class ApiError {
    public static function erroMessage($mensagem, $status)
    {
        return [
            'data' => [
                'msg'    => $mensagem,
                'status' => $status
            ]
        ];
    }
}