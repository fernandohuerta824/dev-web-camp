<?php 

namespace Controller;
ini_set('memory_limit', '512M'); // Aumenta el límite a 256 MB o más

use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use Model\Ponente;
use MVC\Router;

class PaginasController {
    public static function index(Router $router) {
        $router->render('paginas/index', [
            'titulo' => 'Inicio'
        ]);
    }

    public static function evento(Router $router) {
        $router->render('paginas/devwebcamp', [
            'titulo' => 'Sobre DevWebCamp'
        ]);
    }

    public static function paquetes(Router $router) {
        $router->render('paginas/paquetes', [
            'titulo' => 'Paquetes DevWebCamp'
        ]);
    }

    public static function conferencias(Router $router) {
        $eventos = Evento::ordenar('hora_id');
        
        $eventosFormateados = [];
        foreach($eventos as $e) {
            $e->categoria = Categoria::encontrarPorID($e->categoria_id);
            $e->hora = Hora::encontrarPorID($e->hora_id);
            $e->dia = Dia::encontrarPorID($e->dia_id);
            $e->ponente = Ponente::encontrarPorID($e->ponente_id);
            $eventosFormateados["dia_$e->dia_id"]["categoria_$e->categoria_id"][] = $e;
        }
        $router->render('paginas/conferencias', [
            'titulo' => 'Conferencias & Workshops',
            'eventos' => $eventosFormateados
        ]);
    }
}