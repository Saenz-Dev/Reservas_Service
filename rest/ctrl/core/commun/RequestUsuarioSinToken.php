<?php
class RequestUsuarioSinToken implements IRequest
{
    /**
     * Constante de metodo Usuario Sin Token
     * 
     * @var string
     */
    const USUARIO_SIN_TOKEN = "usuario_sin_token";


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
        $request = explode('/', $_GET['PATH_INFO']);
        $instance = new Usuario_Sin_Token();
        if ($request[0] == self::USUARIO_SIN_TOKEN && isset($_GET['id']) ) {
            return $instance->consultarUsuarios();
        } else if ($request[0] == self::USUARIO_SIN_TOKEN && isset($_GET['id']) && $_GET['id'] != NULL) {
            return $instance->consultarUsuario();
        } else if ($request[0] == self::USUARIO_SIN_TOKEN && isset($_GET['id_usuario']) && $_GET['id_usuario'] != NULL) {
            return $instance->consultarUsuarioId();
        } else {
            throw new ExcepcionApi(NOT_FOUND, ST404, error_notExist);
        }
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
     * Metodo de registro para un nuevo usuario
     *
     * @param  unknown $request
     *            Datos de la nueva cuenta
     * @throws ExcepcionApi Lanza una excepcion si no encuetra ek metodo
     * @return ContentBody Retorna una respuesta de la solicitud
     */
    public static function post($request)
    {
        $instance = new Usuario_Sin_Token();
        return $instance->registrar();
    }
}