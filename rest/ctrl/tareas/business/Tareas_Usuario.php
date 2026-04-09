<?php
/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona los usuarios de tareas
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Tareas_Usuario extends Request
{
    const NAME_TABLE = "tarea";

    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$querySelect = SELECT_TAREA_USUARIO;
        parent::$queryInsert = INSERT_USUARIO_TAREA;
        parent::$queryUpdate = UPDATE_TAREA_USUARIO;
        parent::$queryDelete = DELETE_TAREA_USUARIO;
    }

    public function selectParameter($object, $statement)
    {
        $statement->bindParam(1, $object);
    }

    public function insertParameter($object, $statement)
    {        
        $keyApi = UtilAuth::getKeyAPI();
        $statement->bindParam(1, $object->id);
        $statement->bindParam(2, $object->titulo);
        $statement->bindParam(3, $object->fecha_vencimiento);
        $statement->bindParam(4, $object->estado);
        $statement->bindParam(5, $object->id_usuario);
        $statement->bindParam(6, $object->id_categoria);
        $statement->bindParam(7, $object->prioridad);
    }

    public function updateParameter($object, $statement, $id)
    {
        $encryptPassword = UtilAuth::encrytPassword($object->contrasena);
        $statement->bindParam(1, $object->id);
        $statement->bindParam(2, $object->titulo);
        $statement->bindParam(3, $object->fecha_vencimiento);
        $statement->bindParam(4, $object->estado);
        
        $statement->bindParam(5, $object->id_usuario);
        $statement->bindParam(6, $object->id_categoria);
        $statement->bindParam(7, $object->prioridad);
        $statement->bindParam(8, $id);
    }

    public function deleteParameter($statement, $object)
    {
        $statement->bindParam(1, $object->id);
    }
}