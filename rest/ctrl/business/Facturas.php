<?php

/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona las facturas
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Facturas extends Request
{
    /**
     * Datos de la tabla "factura"
     *
     * @var string
     */
    const NAME_TABLE = "factura";

    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$querySelect = SELECT_FACTURA;
        parent::$queryInsert = INSERT_FACTURA;
        parent::$queryUpdate = UPDATE_FACTURA;
        parent::$queryDelete = DELETE_FACTURA;
    }

    public function selectParameter($object, $statement)
    {
        $statement->bindParam(1, $object->id);
    }

    public function insertParameter($object, $statement)
    {
        $statement->bindParam(1, $object->numero_factura);
        $statement->bindParam(2, $object->fecha_emision);
        $statement->bindParam(3, $object->subtotal);
        $statement->bindParam(4, $object->impuestos);
        $statement->bindParam(5, $object->estado);
        $statement->bindParam(6, $object->id_reserva);
        $statement->bindParam(7, $object->total);
    }

    public function updateParameter($object, $statement, $id)
    {
        $statement->bindParam(1, $object->numero_factura);
        $statement->bindParam(2, $object->fecha_emision);
        $statement->bindParam(3, $object->subtotal);
        $statement->bindParam(4, $object->impuestos);
        $statement->bindParam(5, $object->estado);
        $statement->bindParam(6, $object->total);
        $statement->bindParam(7, $id);
    }

    public function deleteParameter($statement, $object)
    {
        $statement->bindParam(1, $object->id);
    }
}