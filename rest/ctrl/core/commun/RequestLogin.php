<?php
class RequestLogin implements IRequest {
    /**
     * Constante de metodo Login
     * 
     * @var string
     */
    const LOGIN = "login";


    /**
     * {@inheritdoc}
     * @see IRequest::init()
     */
    public function init()
    {
        $instance = new Users();
        $instance->init();
    }

    /**
     * {@inheritdoc}
     * @see IRequest::get()
     */
    public static function get()
    {
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
        if ($request[0] == self::LOGIN) {
            $instance = new Login();  
            return $instance->loguin();
        } else {
            throw new ExcepcionApi(NOT_FOUND, ST404, error_notExist);
        }
    }
}