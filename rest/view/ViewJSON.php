<?php

/**<b>Descripcion:</b> Clase que <br/> imprime la salida con respuestas con formato JSON
 * @author Miguel Angel Saenz Tibambre <a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class ViewJSON extends ViewAPI
{

    /**
     * Imprime el cuerpo de la respuesta y asigna el código de respuesta
     *
     * @param mixed $body
     *            de la respuesta a enviar
     */
    public function viewPrint($body)
    {
        http_response_code($body->getCode());
        header('Content-Type: application/json; charset=utf8');
        echo json_encode($body, JSON_PRETTY_PRINT);
        exit();
    }
}
?>