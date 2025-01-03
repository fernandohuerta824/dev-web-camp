<?php

namespace Controller;

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
        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registrar ponentes'
        ]);
    }
}