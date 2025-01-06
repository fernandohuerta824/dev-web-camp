<?php 

namespace Model;

class Categoria extends ActiveRecord {
    protected static string $tabla = 'categorias';

    protected static array $columnas = ['nombre'];

    public string $nombre;

    public function __construct(array $args = []) {
        $this->id = $args['id'] ?? 0;
        $this->nombre = $args['nombre'] ?? '';

    }
}