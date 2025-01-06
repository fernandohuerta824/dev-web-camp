<?php

namespace Controller;

use Exception;
use Model\EventoHorario;

class APIEventos {
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
        try {
            $dia_id = intval($_GET['dia_id']);
            $categoria_id = intval($_GET['categoria_id']);
            if($dia_id < 1 || $categoria_id < 1) 
                static::setResponse('Bad Request: Datos no validos', [], 400);
                
            $eventos = EventoHorario::whereArray(['dia_id' => $dia_id, 'categoria_id' => $categoria_id]);

            static::setResponse('Todo salio bien', $eventos, 200);
        } catch (Exception $e) {
            static::setResponse('Algo salio mal', [], 500);
        }
    }
}