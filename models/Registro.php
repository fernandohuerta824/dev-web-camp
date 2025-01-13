<?php 

namespace Model;

class Registro extends ActiveRecord {
    protected static string $tabla = 'registros';

    protected static array $columnas = ['paquete_id', 'pago_id', 'token', 'usuario_id'];

    public int $paquete_id;
    public string $pago_id;
    public string $token;
    public int $usuario_id;

    public function __construct(array $args = []) {
        $this->id = $args['id'] ?? 0;
        $this->paquete_id = $args['paquete_id'] ?? 0;
        $this->pago_id = $args['pago_id'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->usuario_id = $args['usuario_id'] ?? 0;
    }

}