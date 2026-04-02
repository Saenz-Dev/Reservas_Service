<?php
/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona los usuarios de tareas
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Usuarios_Tareas extends Request
{
    const NAME_TABLE = "usuario";

    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$querySelect = SELECT_USUARIO_TAREA;
        parent::$queryInsert = INSERT_USUARIO_TAREA;
        parent::$queryUpdate = UPDATE_USUARIO_TAREA;
        parent::$queryDelete = DELETE_USUARIO_TAREA;
    }

    public function selectParameter($object, $statement)
    {
        $statement->bindParam(1, $object->id);
    }

    public function insertParameter($object, $statement)
    {
        $statement->bindParam(1, $object->nombre);
        $statement->bindParam(2, $object->password);
        $statement->bindParam(3, $object->fecha_registro);
        $statement->bindParam(4, $object->email);
    }

    public function updateParameter($object, $statement, $id)
    {
        $statement->bindParam(1, $object->nombre);
        $statement->bindParam(2, $object->password);
        $statement->bindParam(3, $object->fecha_registro);
        $statement->bindParam(4, $object->email);
        $statement->bindParam(5, $id);
    }

    public function deleteParameter($statement, $object)
    {
        $statement->bindParam(1, $object->id);
    }
}