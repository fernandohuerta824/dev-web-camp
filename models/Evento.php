<?php 

namespace Model;

class Evento extends ActiveRecord {
    protected static string $tabla = 'eventos';

    protected static array $columnas = ['nombre', 'descripcion', 'disponibles', 'categoria_id', 'dia_id', 'hora_id', 'ponente_id'];

    public string $nombre;
    public string $descripcion;
    public int $disponibles;
    public int $categoria_id;
    public int $dia_id;
    public int $hora_id;
    public int $ponente_id;

    public function __construct(array $args = []) {
        $this->id = $args['id'] ?? 0;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->disponibles = $args['disponibles'] ?? 0;
        $this->categoria_id = $args['categoria_id'] ?? 0;
        $this->dia_id = $args['dia_id'] ?? 0;
        $this->hora_id = $args['hora_id'] ?? 0;
        $this->ponente_id = $args['ponente_id'] ?? 0;
    }

    // Mensajes de validación para la creación de un evento
    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->descripcion) {
            self::$alertas['error'][] = 'La descripción es Obligatoria';
        }
        if(!$this->categoria_id  || !filter_var($this->categoria_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Elige una Categoría';
        }
        if(!$this->dia_id  || !filter_var($this->dia_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Elige el Día del evento';
        }
        if(!$this->hora_id  || !filter_var($this->hora_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Elige la hora del evento';
        }
        if(!$this->disponibles  || !filter_var($this->disponibles, FILTER_VALIDATE_INT) || $this->disponibles <= 0) {
            self::$alertas['error'][] = 'Añade una cantidad de Lugares Disponibles';
        }
        if(!$this->ponente_id || !filter_var($this->ponente_id, FILTER_VALIDATE_INT) ) {
            self::$alertas['error'][] = 'Selecciona la persona encargada del evento';
        }

        return self::$alertas;
    }
}