<?php

namespace Controller;

use Class\Email;
use Exception;
use Model\Usuario;
use MVC\Router;

class AuthController {
    public static function login(Router $router) {
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión'
        ]);
    }

    public static function registro(Router $router) {
        $alertas = [];
        $usuario = new Usuario();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar([
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'password2' => $_POST['password2'],
                
            ]);
            $alertas  = $usuario->validarRegistro();

            if(!isset($alertas['error'])) {
                $usuarioExistente = Usuario::where('email', $usuario->email);

                if($usuarioExistente)
                    $alertas['error'][] = 'El email ya esta registrado, ingrese otro';
                else {
                    $usuario->hashearPassword();
                    $usuario->crearToken();
                    try {
                        $usuario->guardar();
                        $email = new Email([
                            'nombre' => $usuario->nombre . ' ' . $usuario->apellido,
                            'email' => $usuario->email,
                            'token' => $usuario->token
                        ]);
                        $email->enviarConfirmacion();
                        return header('Location: /mensaje');
                    } catch(Exception $e) {
                        $alertas['error'][] = $e->getMessage();
                    }
                }
            }
        }

        $router->render('auth/registro', [
            'titulo' => 'Crear Cuenta',
            'alertas' => $alertas,
            'usuario' => $usuario
        ]);
    }

    public static function olvide(Router $router) {
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario(['email' => $_POST['email']]);
            $alertas =$usuario->validarEmail();
            if(!isset($alertas['error'])) {
                $usuario = Usuario::where('email', $_POST['email']);
    
                if($usuario && $usuario->confirmado === 1) {
                    $usuario->crearToken();
                    $email = new Email([
                        'nombre' => $usuario->nombre . $usuario->apellido,
                        'email' => $usuario->email,
                        'token' => $usuario->token
                    ]);
                    $email->enviarRestablecerPassword();
                    $usuario->guardar();
                }

                $alertas['exito'][] = 'Si el correo esta registrado te enviaremos las instrucciones a tu email';
            }
        }

        $router->render('auth/olvide', [
            'titulo' => 'Restablecer Contraseña',
            'alertas' => $alertas
        ]);
    }

    public static function mensaje(Router $router) {
        $router->render('auth/mensaje', [
            'titulo' => 'Confirma tu cuenta'
        ]);
    }

    public static function confirmar(Router $router) {
        $token = s($_GET['token']);
        
        if(!$token)
            return header('Location: /');

        $usuario = Usuario::where('token', $token);

        if(!$usuario || $usuario->confirmado === 1)
            return header('Location: /');

        $usuario->confirmado = 1;
        $usuario->token = '';
        $alertas = [];

        try {
            $usuario->guardar();
            $alertas['exito'][] = 'Tu cuenta ha sido confirmada';

        } catch(Exception $e) {
            $alertas['error'][] = $e->getMessage();
        }        

        $router->render('auth/confirmar', [
            'titulo' => 'Tu cuenta ha sido confirmada',
            'alertas' => $alertas
        ]);
    }

    public static function reestablecer(Router $router) {
        $token = s($_GET['token']);

        if(!$token)
            return header('Location: /');

        $usuario = Usuario::where('token', $token);
        if(!$usuario || $usuario->confirmado === 0)
            return header('Location: /');
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->password = $_POST['password'];
            $usuario->password2 = $_POST['password2'];

            $alertas = $usuario->validarPasswords();

            if(!isset($alertas['error'])) {
    
                $usuario->password = $_POST['password'];
                $usuario->hashearPassword();
                $usuario->token = '';
                $usuario->guardar();
                return header('Location: /');
            }

        }

        $router->render('auth/reestablecer', [
            'titulo' => 'Reestablecer contraseña',
            'alertas' => $alertas
        ]);
    }
}