<?php

namespace Model;

class Usuario extends ActiveRecord {
    protected static string $tabla = 'usuarios';

    protected static array $columnas = ['nombre', 'apellido', 'email', 'password', 'confirmado', 'token', 'admin'];

    public string $nombre;
    public string $apellido;
    public string $email;
    public string $password;
    public string $password2;
    public int $confirmado;
    public string $token;
    public int $admin;

    public function __construct(array $args = []) {
        $this->id = $args['id'] ?? 0;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->token = $args['token'] ?? '';
        $this->admin = $args['admin'] ?? 0;
    }

    public function validarRegistro(): array {
        if(strlen($this->nombre) < 5)
            self::$alertas['error'][] = 'El nombre debe tener minimo 5 caracteres';
            
        if(strlen($this->apellido) < 5)
            self::$alertas['error'][] = 'El apellido debe tener minimo 5 caracteres';
        
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
            self::$alertas['error'][] = 'Ingrese un email valido';

        if(strlen($this->password) < 8)
            self::$alertas['error'][] = 'La contraseña debe tener minimo 8 caracteres';
        else if($this->password !== $this->password2)
            self::$alertas['error'][] = 'La contraseñas deben ser iguales';


        return self::$alertas;
    }

    public function validarEmail(): array {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
            self::$alertas['error'][] = 'Ingrese un email valido';

        return self::$alertas;
    }

    public function validarPasswords(): array {
        if(strlen($this->password) < 8)
            self::$alertas['error'][] = 'La contraseña debe tener minimo 8 caracteres';
        else if($this->password !== $this->password2)
            self::$alertas['error'][] = 'La contraseñas deben ser iguales';

        return self::$alertas;
    }

    public function validarLogin(): array {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
            self::$alertas['error'][] = 'Ingrese un email valido';

        if(strlen($this->password) < 8)
            self::$alertas['error'][] = 'La contraseña debe tener minimo 8 caracteres';

        return self::$alertas;
    }

    public function hashearPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }


    public function crearToken() {
        $this->token = uniqid(rand());
    }

}