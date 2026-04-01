<?php

/**<b>Descripcion:</b> Clase que <br/> abtracta que imprime el contenido de la petición
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
abstract class ViewAPI
{

    /**
     * Método abtracto para implementar el cuerpo de respuesta del servicio
     *
     * @param string $body
     */
    public abstract function viewPrint($body);
}
?>
