<?php

/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona las Reservas de las mesas
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Reservas_Mesa extends Request
{
    /**
     * Datos de la tabla "mesa"
     *
     * @var string
     */
    const NAME_TABLE = "reserva_mesa";

    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$querySelect = SELECT_RESERVA_MESA;
        parent::$queryInsert = INSERT_RESERVA_MESA;
        parent::$queryUpdate = UPDATE_RESERVA_MESA;
        parent::$queryDelete = DELETE_RESERVA_MESA;
    }

    public function selectParameter($object, $statement)
    {
        $statement->bindParam(1, $object->id);
        $statement->bindParam(2, $object->id_mesa);
    }

    public function insertParameter($object, $statement)
    {
        $statement->bindParam(1, $object->id_reserva);
        $statement->bindParam(2, $object->id_mesa);
    }

    public function updateParameter($object, $statement, $id)
    {
        $statement->bindParam(1, $object->id_reserva_nuevo);
        $statement->bindParam(2, $object->id_mesa_nuevo);
        $statement->bindParam(3, $id);
        $statement->bindParam(4, $object->id_mesa);
    }

    public function deleteParameter($statement, $object)
    {
        $statement->bindParam(1, $object->id);
        $statement->bindParam(2, $object->id_mesa);

    }
}