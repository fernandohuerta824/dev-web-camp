<?php 

namespace Model;

class EventoHorario extends ActiveRecord {
    protected static string $tabla = 'eventos';

    protected static array $columnas = ['categoria_id', 'dia_id', 'hora_id'];

    public int $categoria_id;
    public int $dia_id;
    public int $hora_id;


    public function __construct(array $args = []) {
        $this->id = $args['id'] ?? 0;
        $this->categoria_id = $args['categoria_id'] ?? 0;
        $this->dia_id = $args['dia_id'] ?? 0;
        $this->hora_id = $args['hora_id'] ?? 0;
    }
}