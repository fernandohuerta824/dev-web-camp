<?php

namespace Controller;

use Exception;
use Model\Paquete;
use Model\Registro;
use MVC\Router;

class RegistroController {
    private static function auth() {
        session_start();

        if(!isset($_SESSION['id'])) {
            header('Location: /');
            exit;
        } 

        $registroExistente = Registro::where('usuario_id', $_SESSION['id']);

        if($registroExistente) {
            header('Location: /boleto?id=' . $registroExistente->token);
            exit;
        }
    }

    public static function crear(Router $router) {
        static::auth();
        
        $router->render('registro/crear', [
            'titulo' => 'Finalizar Registro'
        ]);
    }

    public static function gratis() {
        static::auth();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = substr(md5(uniqid(rand(), true)), 0, 8);
    
            $datos = [
                'paquete_id' => 3,
                'pago_id' => '',
                'token' => $token,
                'usuario_id' => $_SESSION['id']
            ];

            $registro = new Registro($datos);

            try {
                $registro->guardar();
                header('Location: /boleto?id=' . urldecode($registro->token));

            } catch(Exception $e) {
                header('Location: /');
            }
        }
    }


    public static function presencial() {
        static::auth();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = substr(md5(uniqid(rand(), true)), 0, 8);
    
            $datos = [
                'paquete_id' => 1,
                'pago_id' => $_POST['pago_id'],
                'token' => $token,
                'usuario_id' => $_SESSION['id']
            ];

            $registro = new Registro($datos);

            try {
                $registro->guardar();
                http_response_code(201);
                echo json_encode(['token' => $token], JSON_UNESCAPED_UNICODE);
                exit;
            } catch(Exception $e) {
                http_response_code(500);
                echo json_encode(['message' => 'Internal Error'], JSON_UNESCAPED_UNICODE);
                exit;
            }
        }
    }

    public static function virtual() {
        static::auth();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = substr(md5(uniqid(rand(), true)), 0, 8);
    
            $datos = [
                'paquete_id' => 2,
                'pago_id' => $_POST['pago_id'],
                'token' => $token,
                'usuario_id' => $_SESSION['id']
            ];

            $registro = new Registro($datos);

            try {
                $registro->guardar();
                http_response_code(201);
                echo json_encode(['token' => $token], JSON_UNESCAPED_UNICODE);
                exit;
            } catch(Exception $e) {
                http_response_code(500);
                echo json_encode(['message' => 'Internal Error'], JSON_UNESCAPED_UNICODE);
                exit;
            }
        }
    }

    public static function boleto(Router $router) {
        session_start();

        if(!isset($_SESSION['id'])) {
            header('Location: /');
            exit;
        } 

        $token = s($_GET['id']);
        $registro = Registro::where('token', $token);

        if(!$registro) {
            header('Location: /finalizar-registro');
            exit;
        }


        $registro->usuario = $_SESSION;
        $registro->paquete = Paquete::encontrarPorID($registro->paquete_id);

        $router->render('registro/boleto', [
            'titulo' => 'Boleto de ' . $_SESSION['nombre'],
            'registro' => $registro
        ]);
    }
}