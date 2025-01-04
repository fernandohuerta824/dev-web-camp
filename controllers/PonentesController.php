<?php

namespace Controller;

use Exception;
use Model\Imagen;
use Model\Ponente;
use Model\PonenteImagen;
use MVC\Router;

class PonentesController {
    private static function auth() {
        session_start();

        if(!isset($_SESSION['id']) || $_SESSION['admin'] === 0) {
            header('Location: /');
            exit;
        }
    }

    public static function index(Router $router) {
        static::auth();
        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencista'
        ]);
    }

    public static function crear(Router $router) {
        static::auth();
        $alertas = [];
        
        $ponente = new Ponente();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagen = new PonenteImagen($_FILES['imagen']);
            $_POST['imagen'] = $imagen;
            $_POST['redes']  = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            $ponente->sincronizar($_POST);
            $alertas = $ponente->validar();
            if(!isset($alertas['error'])) {
                try {
                    $ponente->imagen->guardar(800, 800, false, true, true, true);
                    $ponente->guardar();
                    $ponente->resetar();
                    $alertas['exito'][] = 'Ponente guardado correctamente';
                } catch(\Exception $e) {
                    $ponente->imagen->borrar();
                    $alertas['error'][] = $e->getMessage();
                }

            }
        }
        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registrar ponentes',
            'ponente' => $ponente,
            'alertas' => $alertas
        ]);
    }
    
}