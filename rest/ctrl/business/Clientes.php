<?php

/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona las clientes
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Clientes extends Request
{
    /**
     * Datos de la tabla "cliente"
     *
     * @var string
     */
    const NAME_TABLE = "cliente";

    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$querySelect = SELECT_CLIENTE;
        parent::$queryInsert = INSERT_CLIENTE;
        parent::$queryUpdate = UPDATE_CLIENTE;
        parent::$queryDelete = DELETE_CLIENTE;
    }

    public function selectParameter($object, $statement)
    {
        $statement->bindParam(1, $object->id);
    }

    public function insertParameter($object, $statement)
    {
        $statement->bindParam(1, $object->id_usuario);
        $statement->bindParam(2, $object->fecha_registro);
        $statement->bindParam(3, $object->observaciones);
    }

    public function updateParameter($object, $statement, $id)
    {
        $statement->bindParam(1, $object->id_usuario);
        $statement->bindParam(2, $object->fecha_registro);
        $statement->bindParam(3, $object->observaciones);
        $statement->bindParam(4, $id);
    }

    public function deleteParameter($statement, $object)
    {
        $statement->bindParam(1, $object->id);
    }
}