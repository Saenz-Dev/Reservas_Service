<?php
/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona las de tareas
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Tareas extends Request
{
    const NAME_TABLE = "tarea";

    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$querySelect = SELECT_TAREA;
        parent::$queryInsert = INSERT_TAREA;
        parent::$queryUpdate = UPDATE_TAREA;
        parent::$queryDelete = DELETE_TAREA;
    }

    public function selectParameter($object, $statement)
    {
        $statement->bindParam(1, $object->id);
    }

    public function insertParameter($object, $statement)
    {
        $statement->bindParam(1, $object->titulo);
        $statement->bindParam(2, $object->descripcion);
        $statement->bindParam(3, $object->fecha_creacion);
        $statement->bindParam(4, $object->fecha_vencimiento);
        $statement->bindParam(5, $object->estado);
        $statement->bindParam(6, $object->id_usuario);
        $statement->bindParam(7, $object->id_categoria);
    }

    public function updateParameter($object, $statement, $id)
    {
        $statement->bindParam(1, $object->titulo);
        $statement->bindParam(2, $object->descripcion);
        $statement->bindParam(3, $object->fecha_creacion);
        $statement->bindParam(4, $object->fecha_vencimiento);
        $statement->bindParam(5, $object->estado);
        $statement->bindParam(6, $object->id_usuario);
        $statement->bindParam(7, $object->id_categoria);
        $statement->bindParam(8, $id);
    }

    public function deleteParameter($statement, $object)
    {
        $statement->bindParam(1, $object->id);
    }
}