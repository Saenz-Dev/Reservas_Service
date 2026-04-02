<?php

/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona las mesas
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Reservas extends Request
{
    /**
     * Datos de la tabla "cabania"
     *
     * @var string
     */
    const NAME_TABLE = "reserva";

    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$querySelect = SELECT_RESERVA;
        parent::$queryInsert = INSERT_RESERVA;
        parent::$queryUpdate = UPDATE_RESERVA;
        parent::$queryDelete = DELETE_RESERVA;
    }

    public function selectParameter($object, $statement)
    {
        $statement->bindParam(1, $object->id);
    }


    public function insertParameter($object, $statement)
    {
        $statement->bindParam(1, $object->fecha_hora_inicio);
        $statement->bindParam(2, $object->fecha_hora_fin);
        $statement->bindParam(3, $object->id_cliente);
        $statement->bindParam(4, $object->estado);
        $statement->bindParam(5, $object->cantidad_personas);
    }

    public function updateParameter($object, $statement, $id)
    {
        $statement->bindParam(1, $object->fecha_hora_inicio);
        $statement->bindParam(2, $object->fecha_hora_fin);
        $statement->bindParam(3, $object->id_cliente);
        $statement->bindParam(4, $object->estado);
        $statement->bindParam(5, $object->cantidad_personas);
        $statement->bindParam(6, $id);
    }

    public function deleteParameter($statement, $object)
    {
        $statement->bindParam(1, $object->id);
    }
}