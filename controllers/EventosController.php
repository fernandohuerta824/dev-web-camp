<?php

namespace Controller;

use MVC\Router;

class EventosController {
    private static function auth() {
        session_start();

        if(!isset($_SESSION['id']) || $_SESSION['admin'] === 0) {
            header('Location: /');
            exit;
        }
    }

    public static function index(Router $router) {
        static::auth();
        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops'
        ]);
    }
}