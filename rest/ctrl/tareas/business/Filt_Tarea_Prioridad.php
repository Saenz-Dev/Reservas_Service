<?php
/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona los usuarios de tareas
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Filt_Tarea_Prioridad extends RequestFiltrosTareas
{

    public function filtrarTareasPorPrioridad($prioridad)
    {
        try {
            $id = $_GET['id'];
            $prioridad = $_GET['prioridad'];
            Authenticator::authenticator();

            if ($id != NULL || $prioridad != NULL) {
                $query = SELECT_TAREA_FILTRADA;
                $statement = Connection::getInstance()->getConnection()->prepare($query);
                $statement->bindParam(1, $id);
                $statement->bindParam(2, $prioridad);
                $statement->execute();
                $tareas = $statement->fetchAll(PDO::FETCH_ASSOC);
                
                return $bodyAnswer = new ContentBody(OK, ST200, $tareas);
            } else {
                $bodyAnswer = new ContentBody(FORBIDDEN, ST403, noAutheticate);
                return $bodyAnswer;
            }
        } catch (Exception $e) {
            throw new ExcepcionApi(INTERNAL_SERVER_ERROR, ST500, $e->getMessage());
        }
    }
}