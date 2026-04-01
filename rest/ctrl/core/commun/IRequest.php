<?php

/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona las solicitudes tipo CRUD de un elemento
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
interface IRequest
{
    /**
     * Método para inicializar variables requeridas
     */
    public function init();
    
    /**
     * Método para gestionar solicitudes tipo get
     */
    public static function get();
    
    /**
     * Método para gestionar solicitudes tipo post
     */
    public static function post($request);
    
    /**
     * Método para gestionar solicitudes tipo put
     */
    public static function put($request);
    
    /**
     * Método para gestionar solicitudes tipo delete
     */
    public static function delete();
    
   
}

