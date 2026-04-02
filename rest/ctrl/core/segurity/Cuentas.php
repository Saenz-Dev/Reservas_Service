<?php

/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona las cuentas
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Cuentas extends Request
{
    /**
     * Datos de la tabla "cabania"
     *
     * @var string
     */
    const NAME_TABLE = "cuenta";

    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$querySelect = SELECT_CUENTA;
        parent::$queryInsert = INSERT_CUENTA;
        parent::$queryUpdate = UPDATE_CUENTA;
        parent::$queryDelete = DELETE_CUENTA;
    }

    public function selectParameter($object, $statement) {
        $statement->bindParam(1, $object->id);
    }


    public function insertParameter($object, $statement)
    {
        $statement->bindParam(1, $object->correo);
        $statement->bindParam(2, $object->contrasena);
        $statement->bindParam(3, $object->estado_sesion);
        $statement->bindParam(4, $object->id_usuario);
        $statement->bindParam(5, $object->token);
    }

    public function updateParameter($object, $statement, $id)
    {
        $statement->bindParam(1, $object->correo);
        $statement->bindParam(2, $object->contrasena);
        $statement->bindParam(3, $object->estado_sesion);
        $statement->bindParam(4, $object->id_usuario);
        $statement->bindParam(5, $object->token);
        $statement->bindParam(6, $id);
    }

    public function deleteParameter($statement, $object)
    {
        $statement->bindParam(1, $object->id);
    }
}