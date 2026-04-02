<?php
/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona los notificacines de tareas
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Notificaciones extends Request
{
    const NAME_TABLE = "notificacion";

    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$querySelect = SELECT_NOTIFICACION;
        parent::$queryInsert = INSERT_NOTIFICACION;
        parent::$queryUpdate = UPDATE_NOTIFICACION;
        parent::$queryDelete = DELETE_NOTIFICACION;
    }

    public function selectParameter($object, $statement)
    {
        $statement->bindParam(1, $object->id);
    }

    public function insertParameter($object, $statement)
    {
        $statement->bindParam(1, $object->mensaje);
        $statement->bindParam(2, $object->fecha_envio);
        $statement->bindParam(3, $object->leida);
        $statement->bindParam(4, $object->id_usuario);
        $statement->bindParam(5, $object->id_tarea);
    }

    public function updateParameter($object, $statement, $id)
    {
        $statement->bindParam(1, $object->mensaje);
        $statement->bindParam(2, $object->fecha_envio);
        $statement->bindParam(3, $object->leida);
        $statement->bindParam(4, $object->id_usuario);
        $statement->bindParam(5, $object->id_tarea);
        $statement->bindParam(6, $id);
    }

    public function deleteParameter($statement, $object)
    {
        $statement->bindParam(1, $object->id);
    }
}