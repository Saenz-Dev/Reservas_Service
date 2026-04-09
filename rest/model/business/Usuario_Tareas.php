<?php
/**
 * Clase que modela una Cabaña
 */
class Usuario_Tareas
{

    /**
     * @var int ID del usuario
     */
    public $id_usuario;

    /**
     * @var string Nombre del usuario
     */
    public $nombre;

    /**
     * @var string Contraseña del usuario
     */
    public $contrasena;

    /**
     * @var string Correo electrónico del usuario
     */
    public $correo;

    /**
     * @var string Fecha de registro del usuario
     */
    public $fecha_registro;

    public $token;
}