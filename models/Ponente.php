<?php 

namespace Model;

class Ponente extends ActiveRecord {
    protected static string $tabla = 'ponentes';

    protected static array $columnas = ['nombre', 'apellido', 'ciudad', 'pais', 'imagen', 'tags', 'redes'];

    public string $nombre;
    public string $apellido;
    public string $ciudad;
    public string $pais;
    public string $tags;
    public string $redes;

    public function __construct(array $args = []) {
        $this->id = $args['id'] ?? 0;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
        $this->pais = $args['pais'] ?? '';
        $this->imagen = $args['imagen'] ?? null;
        $this->tags = $args['tags'] ?? '';
        $this->redes = $args['redes'] ?? '';
    }


    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->apellido) {
            self::$alertas['error'][] = 'El Apellido es Obligatorio';
        }
        if(!$this->ciudad) {
            self::$alertas['error'][] = 'El Campo Ciudad es Obligatorio';
        }
        if(!$this->pais) {
            self::$alertas['error'][] = 'El Campo País es Obligatorio';
        }
        if(!$this->imagen->image) {
            self::$alertas['error'][] = 'La imagen es obligatoria';
        } else if(!$this->imagen->validarTamanio())
            self::$alertas['error'][] = 'La imagen es muy grande';

        if(!$this->tags) {
            self::$alertas['error'][] = 'El Campo áreas es obligatorio';
        }
    
        return self::$alertas;
    }
}