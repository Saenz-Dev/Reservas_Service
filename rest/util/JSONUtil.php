<?php

/**<b>Descripcion:</b> Clase que <br/> que contiene los metodos utilitarios JSON
 
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class JSONUtil
{

    /**
     * Decodifica a objeto el JSON de la solicitud
     */
    public static function decodeJSON()
    {
        $body = file_get_contents('php://input');
        $object = json_decode($body);
        
        return $object;
    }
}

