<?php

namespace Controller;

use MVC\Router;

class AuthController {
    public static function login(Router $router) {
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión'
        ]);
    }

    public static function registro(Router $router) {
        $router->render('auth/registro', [
            'titulo' => 'Crear Cuenta'
        ]);
    }

    public static function olvide(Router $router) {
        $router->render('auth/olvide', [
            'titulo' => 'Restablecer Contraseña'
        ]);
    }
}