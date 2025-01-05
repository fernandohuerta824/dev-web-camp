<?php

namespace Controller;

use Class\Paginacion;
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
        $registroPorPagina = 3;
        $totalRegistros = Ponente::totalDeRegistros();
        $paginaActual =  intval($_GET['page']);

        $paginacion = new Paginacion($paginaActual, $registroPorPagina, $totalRegistros);

        $ponentes = Ponente::paginar($paginacion->registroPorPagina, $paginacion->offset());
        
        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencista',
            'ponentes' => $ponentes,
            'paginacion' => $paginacion->paginacion()
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
                    $ponente->borrar();
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
    
    public static function editar(Router $router) {
        static::auth();
        $id = $_GET['id'] ?? 0;
        $ponente = Ponente::encontrarPorID($id);
        $alertas = [];
        if(!$ponente)
            return header('Location: /admin/ponentes');
        $imagenActual = $ponente->imagen;


        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagen = new PonenteImagen($_FILES['imagen']);
            $_POST['imagen'] = $imagen;
            $_POST['redes']  = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            $ponente->sincronizar($_POST);
            $alertas = $ponente->validar(true);

            if(!isset($alertas['error'])) {
                $isNewImage = $imagen->name ? true : false;
                
                try {
                    if($isNewImage) {
                        $ponente->imagen->guardar(800, 800, false, true, true, true);
                        $imagenActual->borrar();
                    } else {
                        $ponente->imagen = $imagenActual;
                    }
                    $ponente->guardar();
                    $alertas['exito'][] = 'Ponente actualizado correctamente';
                    $imagenActual = $ponente->imagen;
                } catch(\Exception $e) {
                    if($isNewImage) 
                        $ponente->imagen->borrar();
                    $alertas['error'][] = $e->getMessage();
                }
            }

            
        }
        $router->render('admin/ponentes/editar', [
            'titulo' => 'Editar informacion de ' . $ponente->nombre,
            'ponente' => $ponente,
            'alertas' => $alertas,
            'imagenActual' => $imagenActual
        ]);
    }

    public static function eliminar() {
        static::auth();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? 0;
            $ponente = Ponente::encontrarPorID($id);
            if(!$ponente)
                return header('Location: /admin/ponentes');
            
            $ponente->borrar();
            return header('Location: /admin/ponentes');
        }

    }
}