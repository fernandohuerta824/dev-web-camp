<?php

namespace Controller;

use Class\Paginacion;
use Exception;
use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use Model\Ponente;
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
        $registroPorPagina = 10;
        $totalRegistros = Evento::totalDeRegistros();
        $paginaActual =  intval($_GET['page']);

        $paginacion = new Paginacion($paginaActual, $registroPorPagina, $totalRegistros);

        $eventos = Evento::paginar($paginacion->registroPorPagina, $paginacion->offset());
    
        foreach($eventos as $e) {
            $e->categoria = Categoria::encontrarPorID($e->categoria_id);
            $e->hora = Hora::encontrarPorID($e->hora_id);
            $e->dia = Dia::encontrarPorID($e->dia_id);
            $e->ponente = Ponente::encontrarPorID($e->ponente_id);
        }
        
        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops',
            'eventos' => $eventos,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router) {
        static::auth();
        $alertas = [];
        $categorias = Categoria::todos();
        $dias = Dia::todos();
        $horas = Hora::todos();

        $evento = new Evento();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $evento->sincronizar($_POST);

            $alertas = $evento->validar();
            $evento->ponente = Ponente::encontrarPorID($evento->ponente_id);
            if(!isset($alertas['error'])) {
                try {
                    $evento->guardar();
                    $alertas['exito'][] = 'Evento Guardado';
                    $evento->resetar();
                } catch(Exception $e) {
                    $alertas['error'][] = $e->getMessage();
                }
            }
        }

        $router->render('admin/eventos/crear', [
            'titulo' => 'Crear nuevo evento',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }

    public static function editar(Router $router) {
        static::auth();
        $id = intval($_GET['id']);
        $evento = Evento::encontrarPorID($id);
       
        $hora_id = $evento->hora_id;

        $alertas = [];
        $categorias = Categoria::todos();
        $dias = Dia::todos();
        $horas = Hora::todos();
        $evento->ponente = Ponente::encontrarPorID($evento->ponente_id);
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $evento->sincronizar($_POST);
            
            $evento->hora_id = !intval($_POST['hora_id']) ? $hora_id : $_POST['hora_id'];

            $alertas = $evento->validar();
            if(!isset($alertas['error'])) {
                try {
                    $evento->guardar();
                    $alertas['exito'][] = 'Evento Actualizado';

                    $evento->ponente = Ponente::encontrarPorID($evento->ponente_id);
                } catch(Exception $e) {
                    $alertas['error'][] = $e->getMessage();
                }
            }
        }

        $router->render('admin/eventos/editar', [
            'titulo' => 'Editar evento',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }

    public static function eliminar() {
        static::auth();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? 0;
            $evento = Evento::encontrarPorID($id);
            if(!$evento)
                return header('Location: /admin/eventos');
            
            $evento->borrar();
            return header('Location: /admin/eventos');
        }

    }
}