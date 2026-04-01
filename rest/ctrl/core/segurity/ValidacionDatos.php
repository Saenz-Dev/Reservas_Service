<?php
/**
 * <b>Descripcion:</b> Clase que <br/>Valida los datos de las peticiones
 *
 * @author MIguel Angel Saenz Tibambre <a href = "mailto:saenzm963@gmail.com">saenzm963@gmail.com</a>
 */
class ValidacionDatos
{
    public static function validarNombreApellido($datos)
    {
        $regex = "/^(?=.{3,30}$)[a-zA-ZÁÉÍÓÚáéíóú\sÑñ]+(?:\s[a-zA-ZÁÉÍÓÚáéíóú\sÑñ]+)*$/";
        if (!preg_match($regex, $datos)) {
            throw new ExcepcionApi(BAD_REQUEST, ST400, error_Structure_data);
        }
    }
    public static function verificarDatoNoNumerico($datos)
    {
        $regex = "/\d/";
        if (preg_match($regex, $datos)) {
            throw new ExcepcionApi(BAD_REQUEST, ST400, error_numeric_data);
        }
    }
    public static function validarTelefono($datos)
    {
        $regex = "/^3\d{9}$/";
        if (!preg_match($regex, $datos)) {
            throw new ExcepcionApi(BAD_REQUEST, ST400, error_Structure_data);
        }
    }

    public static function validarDatoVacio($body)
    {
        if ($body->name == "" || $body->race == "" || $body->gender == "") {
            throw new ExcepcionApi(BAD_REQUEST, ST400, error_Structure_data);
        }
    }

    
    public static function validarDatos($request, $body)
    {
        if ($request[0] == "persons") {
            ValidacionDatos::validarNombreApellido($body->name);
            ValidacionDatos::validarNombreApellido($body->lastName);
            ValidacionDatos::validarTelefono($body->phone);
        } else if ($request[0] == "pets") {            
            ValidacionDatos::verificarDatoNoNumerico($body->name);
            ValidacionDatos::verificarDatoNoNumerico($body->race);
            ValidacionDatos::verificarDatoNoNumerico($body->gender);
            ValidacionDatos::validarNombreApellido($body->name);
            ValidacionDatos::validarNombreApellido($body->race);
            ValidacionDatos::validarNombreApellido($body->gender);
        }
    }
}
?>