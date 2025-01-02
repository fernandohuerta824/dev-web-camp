<?php

namespace Controller;

use Class\Email;
use Exception;
use Model\Usuario;
use MVC\Router;

class AuthController {
    private static function auth() {
        session_start();

        if(isset($_SESSION['id'])) {
            header('Location: /');
            exit;
        }     
    }


    public static function login(Router $router) {
        static::auth();
        $alertas = [];
        $email = '';
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario([
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ]);

            $email = $usuario->email;

            $alertas = $usuario->validarLogin();

            if(!isset($alertas['error'])) {
                $auth = Usuario::where('email', $email);

                if(!$auth || !password_verify($usuario->password, $auth->password) || $auth->confirmado === 0) {
                    $alertas['error'][] = 'Email o contraseña incorrectas, o cuenta no confirmada';
                } else {
                    session_start();
                    $_SESSION['id'] = $auth->id;
                    $_SESSION['nombre'] = $auth->nombre;
                    $_SESSION['apellido'] = $auth->apellido;
                    $_SESSION['admin'] = $auth->admin;
                    
                    if($auth->admin === 1)
                        return header('Location: /admin/dashboard');
                    
                    header('Location: /finalizar-registro');

                }

            }
        }

        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión',
            'alertas' => $alertas,
            'email' => $email
        ]);
    }

    public static function registro(Router $router) {
        static::auth();
        
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
        static::auth();

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
        static::auth();

        $router->render('auth/mensaje', [
            'titulo' => 'Confirma tu cuenta'
        ]);
    }

    public static function confirmar(Router $router) {
        static::auth();

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
        static::auth();

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