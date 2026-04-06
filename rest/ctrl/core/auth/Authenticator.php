<?php
// Require de JWT
require_once __DIR__ . '/../../../vendor/autoload.php'; // Ajusta según la ruta

require_once __DIR__ . '/../../../vendor/firebase/php-jwt/src/BeforeValidException.php';
require_once __DIR__ . '/../../../vendor/firebase/php-jwt/src/JWTExceptionWithPayloadInterface.php';
require_once __DIR__ . '/../../../vendor/firebase/php-jwt/src/ExpiredException.php';
require_once __DIR__ . '/../../../vendor/firebase/php-jwt/src/SignatureInvalidException.php';
require_once __DIR__ . '/../../../vendor/firebase/php-jwt/src/JWT.php';
require_once __DIR__ . '/../../../vendor/firebase/php-jwt/src/Key.php';

require_once 'config.php'; // Contiene SECRET_KEY

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

class Authenticator
{

    /**
     * Valida el JWT enviado en el header Authorization
     *
     * @return object Decodificado del token
     * @throws Exception si el token es inválido o ha expirado
     */
    public static function authenticator()
    {
        // Obtener headers
        $headers = getallheaders();

        if (isset($headers['Authorization'])) {
            $authHeader = $headers['Authorization'];
            $token = str_replace('Bearer ', '', $authHeader);

            try {
                $decoded = JWT::decode($token, new Key(SECRET_KEY, 'HS256'));
                // Retorna el payload del token (info del usuario)
                return $decoded->data;
            } catch (\Firebase\JWT\ExpiredException $e) {
                throw new Exception("Token expirado", 401);
            } catch (\Exception $e) {
                throw new Exception("Token inválido", 401);
            }
        } else {
            throw new Exception("No se proporcionó token", 400);
        }
    }
}

// class Authenticator
// {
//     /**
//      * Otorga los permisos a un usuario para que acceda a los recursos
//      *
//      * @return null o el id del usuario autorizado
//      * @throws Exception
//      */
//     public static function authenticator()
//     {
//         $heads = apache_request_headers();
//         // print_r($heads);
//         if (isset($heads[AUTHORIZATION])) {
//             $keyAPI = $heads[AUTHORIZATION];
//             if (UtilAuth::validateKeyAPI($keyAPI)) {
//                 $bodyAnswer = new ContentBody(OK, 403, sucessful);
//                 return $bodyAnswer;
//             } else {
//                 throw new ExcepcionApi(UNAUTHORIZED, ST401, error_KeyAPI);
//             }
//         } else {
//             throw new ExcepcionApi(BAD_REQUEST, ST400, error_KeyAPI);
//         }
//     }
// }
