<?php

/**
 * <b>Descripcion:</b> Clase que <br/> modela un usuario en la aplicación
 * <b>Caso de Uso:</b> PANTHER-Seguridad <br/>
 *
 * @author Miguel Angel Saenz Tibambre <a href = "mailto:miguel.saenz02@gmail.com">miguel.saenz02@gmail.com</a>
 */
class Usuario
{
    /**
     * Identificador de la clase 
     * 
     * @var int Id
     */
    public $id_usuario;

    /**
     * Nombre de usuario
     * 
     * @var string nombres
     */
    public $nombres;

    /**
     * Apellidos de usuario
     * 
     * @var string apellidos
     */
    public $apellidos;

    /**
     * Tipo de documento del usuario
     * 
     * @var string tipo documento
     */
    public $tipo_documento;

    /**
     * Numero de documento de usuario
     * 
     * @var string numero de documento
     */
    public $numero_documento;

    /**
     * telefono de usuario
     * 
     * @var string telefono
     */
    public $telefono;

    /**
     * dirección de usuario
     * 
     * @var string direccion
     */
    public $direccion;

    /**
     * ciudad de usuario
     * 
     * @var string ciudad
     */
    public $ciudad;

    /**
     * fecha_nacimiento de usuario
     * 
     * @var string fecha_nacimiento
     */
    public $fecha_nacimiento;

    /**
     * estado de usuario
     * 
     * @var Estado|null
     */
    public $estado;

    /**
     * Rol de usuario
     * 
     * @var string rol
     */
    public $id_rol;

    /**
     * Obtiene el ID del usuario
     * 
     * @return int|null
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * Obtiene los nombres del usuario
     * 
     * @return string|null
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Obtiene los apellidos del usuario
     * 
     * @return string|null
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Obtiene el tipo de documento
     * 
     * @return string|null
     */
    public function getTipoDocumento()
    {
        return $this->tipo_documento;
    }

    /**
     * Obtiene el número de documento
     * 
     * @return string|null
     */
    public function getNumeroDocumento()
    {
        return $this->numero_documento;
    }

    /**
     * Obtiene el teléfono del usuario
     * 
     * @return string|null
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Obtiene la dirección del usuario
     * 
     * @return string|null
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Obtiene la ciudad del usuario
     * 
     * @return string|null
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Obtiene la fecha de nacimiento del usuario
     * 
     * @return string|null
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Obtiene el estado del usuario
     * 
     * @return Estado|null
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Obtiene el ID del rol del usuario
     * 
     * @return int|string|null
     */
    public function getIdRol()
    {
        return $this->id_rol;
    }

    /**
     * Establece el ID del usuario
     * 
     * @param int $id_usuario
     * @return void
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * Establece los nombres del usuario
     * 
     * @param string $nombres
     * @return void
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    /**
     * Establece los apellidos del usuario
     * 
     * @param string $apellidos
     * @return void
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * Establece el tipo de documento
     * 
     * @param string $tipo_documento
     * @return void
     */
    public function setTipoDocumento($tipo_documento)
    {
        $this->tipo_documento = $tipo_documento;
    }

    /**
     * Establece el número de documento
     * 
     * @param string $numero_documento
     * @return void
     */
    public function setNumeroDocumento($numero_documento)
    {
        $this->numero_documento = $numero_documento;
    }

    /**
     * Establece el teléfono del usuario
     * 
     * @param string $telefono
     * @return void
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * Establece la dirección del usuario
     * 
     * @param string $direccion
     * @return void
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * Establece la ciudad del usuario
     * 
     * @param string $ciudad
     * @return void
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }

    /**
     * Establece la fecha de nacimiento del usuario
     * 
     * @param string $fecha_nacimiento
     * @return void
     */
    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    /**
     * Establece el estado del usuario
     * 
     * @param Estado $estado
     * @return void
     */
    public function setEstado(Estado $estado)
    {
        $this->estado = $estado;
    }

    /**
     * Establece el ID del rol del usuario
     * 
     * @param int|string $id_rol
     * @return void
     */
    public function setIdRol($id_rol)
    {
        $this->id_rol = $id_rol;
    }
}