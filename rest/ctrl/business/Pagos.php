<?php

/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona las pagos
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Pagos extends Request
{
    /**
     * Datos de la tabla "pago"
     *
     * @var string
     */
    const NAME_TABLE = "pago";

    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$querySelect = SELECT_PAGO;
        parent::$queryInsert = INSERT_PAGO;
        parent::$queryUpdate = UPDATE_PAGO;
        parent::$queryDelete = DELETE_PAGO;
    }

    public function selectParameter($object, $statement)
    {
        $statement->bindParam(1, $object->id);
    }

    public function insertParameter($object, $statement)
    {
        $statement->bindParam(1, $object->fecha);
        $statement->bindParam(2, $object->monto);
        $statement->bindParam(3, $object->metodo);
        $statement->bindParam(4, $object->id_factura);
    }

    public function updateParameter($object, $statement, $id)
    {
        $statement->bindParam(1, $object->fecha);
        $statement->bindParam(2, $object->monto);
        $statement->bindParam(3, $object->metodo);
        $statement->bindParam(4, $object->id_factura);
        $statement->bindParam(5, $id);
    }

    public function deleteParameter($statement, $object)
    {
        $statement->bindParam(1, $object->id);
    }
}