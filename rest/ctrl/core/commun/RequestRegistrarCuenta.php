<?php
class RequestRegistrarCuenta implements IRequest {
    /**
     * Constante de metodo Registrar Cuenta
     * 
     * @var string
     */
    const REGISTRAR_CUENTA = "registrar_cuenta";


    /**
     * {@inheritdoc}
     * @see IRequest::init()
     */
    public function init()
    {
        $instance = new Cuentas();
        $instance->init();
    }

    /**
     * {@inheritdoc}
     * @see IRequest::get()
     */
    public static function get()
    {
        $request = explode("/", $_GET['PATH_INFO']);
        if ($request[0] == self::REGISTRAR_CUENTA) {
            $instance = new Registrar_Cuenta();
            return $instance->consultar();
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
     * Metodo de registro para una nueva cuenta
     *
     * @param  unknown $request
     *            Datos de la nueva cuenta
     * @throws ExcepcionApi Lanza una excepcion si no encuetra ek metodo
     * @return ContentBody Retorna una respuesta de la solicitud
     */
    public static function post($request)
    {
        $request = explode("/", $_GET['PATH_INFO']);
        if ($request[0] == self::REGISTRAR_CUENTA) {
            $instance = new Registrar_Cuenta();
            return $instance->registrar();
        } else {
            throw new ExcepcionApi(NOT_FOUND, ST404, error_notExist);
        }
    }
}