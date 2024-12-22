<?php

namespace Controller;

use MVC\Router;

class AuthController {
    public static function login(Router $router) {
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión'
        ]);
    }
}