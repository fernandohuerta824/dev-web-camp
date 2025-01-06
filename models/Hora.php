<?php 

namespace Model;

class Hora extends ActiveRecord {
    protected static string $tabla = 'horas';

    protected static array $columnas = ['hora'];

    public string $hora;

    public function __construct(array $args = []) {
        $this->id = $args['id'] ?? 0;
        $this->hora = $args['hora'] ?? '';
    }
}