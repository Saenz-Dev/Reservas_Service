<?php
/**
 * Clase que modela una Cuenta de usuario
 */
class Cuenta
{

    /** @var int */
    public $id_cuenta;

    /** @var string */
    public $correo;

    /** @var string */
    public $contrasena;

    /** @var Estado */
    public $estado_sesion;

    /** @var int */
    public $id_usuario;

    public $token;

    public function getIdCuenta()
    {
        return $this->id_cuenta;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    public function getContrasena()
    {
        return $this->contrasena;
    }
    public function getEstadoSesion()
    {
        return $this->estado_sesion;
    }
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }
    public function getToken()
    {
        return $this->token;
    }

    public function setIdCuenta($id)
    {
        $this->id_cuenta = $id;
    }
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }
    public function setEstadoSesion(Estado $estado)
    {
        $this->estado_sesion = $estado;
    }
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }
    public function setToken($token)
    {
        $this->token = $token;
    }
}