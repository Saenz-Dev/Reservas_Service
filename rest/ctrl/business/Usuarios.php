<?php

/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona las personas
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Usuarios extends Request
{
    /**
     * Datos de la tabla "usuario"
     *
     * @var string
     */
    const NAME_TABLE = "usuario";

    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$queryInsert = INSERT_USUARIO;
        parent::$queryUpdate = UPDATE_USUARIO;
        parent::$queryDelete = DELETE_USUARIO;
    }

    public function selectParameter($object, $statement)
    {
        $statement->bindParam(1, $object->id);
    }

    public function insertParameter($object, $statement)
    {
        $statement->bindParam(1, $object->nombres);
        $statement->bindParam(2, $object->apellidos);
        $statement->bindParam(3, $object->tipo_documento);
        $statement->bindParam(4, $object->numero_documento);
        $statement->bindParam(5, $object->telefono);
        $statement->bindParam(6, $object->direccion);
        $statement->bindParam(7, $object->ciudad);
        $statement->bindParam(8, $object->fecha_nacimiento);
        $statement->bindParam(9, $object->estado);
        $statement->bindParam(10, $object->id_rol);
        $statement->bindParam(11, $object->token);
    }

    public function updateParameter($object, $statement, $id)
    {
        $statement->bindParam(1, $object->nombres);
        $statement->bindParam(2, $object->apellidos);
        $statement->bindParam(3, $object->tipo_documento);
        $statement->bindParam(4, $object->numero_documento);
        $statement->bindParam(5, $object->telefono);
        $statement->bindParam(6, $object->direccion);
        $statement->bindParam(7, $object->ciudad);
        $statement->bindParam(8, $object->fecha_nacimiento);
        $statement->bindParam(9, $object->estado);
        $statement->bindParam(10, $object->id_rol);
        $statement->bindParam(11, $object->token);
        $statement->bindParam(12, $id);
    }

    public function deleteParameter($statement, $object)
    {
        $statement->bindParam(1, $object->id);
    }
}