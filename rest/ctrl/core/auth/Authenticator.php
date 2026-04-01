<?php
class Authenticator {
    /**
     * Otorga los permisos a un usuario para que acceda a los recursos
     *
     * @return null o el id del usuario autorizado
     * @throws Exception
     */
    public static function authenticator()
    {
        $heads = apache_request_headers();
        // print_r($heads);
        if (isset($heads[AUTHORIZATION])) {
            $keyAPI = $heads[AUTHORIZATION];
            if (UtilAuth::validateKeyAPI($keyAPI)) {
                $bodyAnswer = new ContentBody(OK, 403, sucessful);
                return $bodyAnswer;
            } else {
                throw new ExcepcionApi(UNAUTHORIZED, ST401, error_KeyAPI);
            }
        } else {
            throw new ExcepcionApi(BAD_REQUEST, ST400, error_KeyAPI);
        }
    }
}
