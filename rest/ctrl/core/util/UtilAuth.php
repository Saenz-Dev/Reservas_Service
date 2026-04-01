<?php
/**
 * <b>Descripcion:</b> Clase <br/>Util para seguridad de contraseña y control de KeyAPI
 * <b>Caso de Uso:</b> PANTHER-Seguridad <br/>
 *
 * @author MIguel Angel Saenz Tibambre <a href = "mailto:saenzm963@gmail.com">saenzm963@gmail.com</a>
 */
class UtilAuth {
        /**
     * Protege la contraseña con un algoritmo de encriptado
     *
     * @param  $passwordPlain
     * @return string|NULL
     */
    public static function encrytPassword($passwordPlain)
    {
        if (!empty($passwordPlain))
            return password_hash($passwordPlain, PASSWORD_BCRYPT);
        else
            return null;
    }

    /**
     * Asigna de forma aleatoria una clave para la aplicación
     *
     * @return string
     */
    public static function getKeyAPI()
    {
        return md5(microtime() . rand());
    }

    /**
     * Comprueba la existencia de la clave para la api
     *
     * @param
     *            $keyAPI
     * @return bool true si existe o false en caso contrario
     */
    public static function validateKeyAPI($keyAPI)
    {
        $query = VERIFY_KEYAPI;
        $statement = Connection::getInstance()->getConnection()->prepare($query);
        $statement->bindParam(1, $keyAPI);
        $statement->execute();
        return $statement->fetchColumn(0) > 0;
    }
}
?>