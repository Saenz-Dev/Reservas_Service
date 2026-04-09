<?php
class RequestFiltrosTareas implements IRequest
{
    /**
     * Constante de metodo Login
     * 
     * @var string
     */
    const NAME_TABLE = "tareas";


    /**
     * {@inheritdoc}
     * @see IRequest::init()
     */
    public function init()
    {
        
        
    }

    /**
     * {@inheritdoc}
     * @see IRequest::get()
     */
    public static function get()
    {
        $cuerpo = JSONUtil::decodeJSON();
        $instance = new Filt_Tarea_Prioridad();
        return $instance->filtrarTareasPorPrioridad($cuerpo);
    }

    /**
     * {@inheritdoc}
     * @see IRequest::delete()
     */
    public static function delete()
    {
    }
    /**
     * {@inheritdoc}
     * @see IRequest::put()
     */
    public static function put($request)
    {
    }

    /**
     * Metodo de logueo para un usuario
     *
     * @param  unknown $request
     *            Datos de credenciales
     * @throws ExcepcionApi Lanza una excepcion si no encuetra ek metodo
     * @return ContentBody Retorna una respuesta de la solicitud
     */
    public static function post($request)
    {
    }
}