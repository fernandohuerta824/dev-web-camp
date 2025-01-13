<?php 

namespace Model;

class Paquete extends ActiveRecord {
    protected static string $tabla = 'paquetes';

    protected static array $columnas = ['nombre'];

    public string $nombre;


    public function __construct(array $args = []) {
        $this->id = $args['id'] ?? 0;
        $this->nombre = $args['nombre'] ?? '';
    }

}