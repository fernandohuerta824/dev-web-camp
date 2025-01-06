<?php

namespace Controller;


use Model\Ponente;

class APIPonentes {
    private static function setResponse(string $message, mixed $data, int $code = 200) {
        header('Content-Type: application/json');
        http_response_code($code);
        echo json_encode(['message' => $message, 'status' => $code, 'data' => $data], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        exit;
    }

    private static function auth() {
        session_start();
        
        if(!isset($_SESSION['id']) || $_SESSION['admin'] === 0) 
            static::setResponse('Not Authorized', [], 403); 
    }

    public static function index() {
        static::auth();
        $ponentes = Ponente::todos();
        static::setResponse('Todo bien', $ponentes);
    }
}