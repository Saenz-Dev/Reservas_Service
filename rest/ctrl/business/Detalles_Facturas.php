<?php

/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona los detalles de las facturas
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Detalles_Facturas extends Request
{
    /**
     * Datos de la tabla "detalle_factura"
     *
     * @var string
     */
    const NAME_TABLE = "detalle_factura";

    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$querySelect = SELECT_DETALLE_FACTURA;
        parent::$queryInsert = INSERT_DETALLE_FACTURA;
        parent::$queryUpdate = UPDATE_DETALLE_FACTURA;
        parent::$queryDelete = DELETE_DETALLE_FACTURA;
    }

    public function selectParameter($object, $statement)
    {
        $statement->bindParam(1, $object->id);
    }

    public function insertParameter($object, $statement)
    {
        $statement->bindParam(1, $object->descripcion);
        $statement->bindParam(2, $object->cantidad);
        $statement->bindParam(3, $object->precio_unitario);
        $statement->bindParam(4, $object->subtotal);
        $statement->bindParam(5, $object->id_factura);
        $statement->bindParam(6, $object->iva_unitario);
        $statement->bindParam(7, $object->total);
        $statement->bindParam(8, $object->iva_subtotal);
    }

    public function updateParameter($object, $statement, $id)
    {
        $statement->bindParam(1, $object->descripcion);
        $statement->bindParam(2, $object->cantidad);
        $statement->bindParam(3, $object->precio_unitario);
        $statement->bindParam(4, $object->subtotal);
        $statement->bindParam(5, $object->id_factura);
        $statement->bindParam(6, $object->iva_unitario);
        $statement->bindParam(7, $object->total);
        $statement->bindParam(8, $object->iva_subtotal);
        $statement->bindParam(9, $id);
    }

    public function deleteParameter($statement, $object)
    {
        $statement->bindParam(1, $object->id);
    }
}