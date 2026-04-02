<?php

/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona las Reservas de las cabañas
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Reservas_Cabania extends Request
{
    /**
     * Datos de la tabla "cabania"
     *
     * @var string
     */
    const NAME_TABLE = "reserva_cabania";

    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$querySelect = SELECT_RESERVA_CABANIA;
        parent::$queryInsert = INSERT_RESERVA_CABANIA;
        parent::$queryUpdate = UPDATE_RESERVA_CABANIA;
        parent::$queryDelete = DELETE_RESERVA_CABANIA;
    }

    public function selectParameter($object, $statement)
    {
        $statement->bindParam(1, $object->id);
        $statement->bindParam(2, $object->id_cabania);
    }

    public function insertParameter($object, $statement)
    {
        $statement->bindParam(1, $object->id_reserva);
        $statement->bindParam(2, $object->id_cabania);
    }

    public function updateParameter($object, $statement, $id)
    {
        $statement->bindParam(1, $object->id_reserva_nuevo);
        $statement->bindParam(2, $object->id_cabania_nuevo);
        $statement->bindParam(3, $id);
        $statement->bindParam(4, $object->id_cabania);
    }

    public function deleteParameter($statement, $object)
    {
        $statement->bindParam(1, $object->id);
        $statement->bindParam(2, $object->id_cabania);

    }
}