<?php 

namespace Model;

class PonenteImagen extends Imagen  {
    protected static string $rutaParaGuardar = __DIR__ . '/../public/imagenes/ponentes/';
    protected static int $tamanioMaximo = 4;

    public function __construct(array $args = []){
        parent::__construct($args);
    }
}