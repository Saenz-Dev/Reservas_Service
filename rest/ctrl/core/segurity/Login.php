<?php
/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona la seguridad de un usuario
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */

// require_once 'libs/php-jwt/src/BeforeValidException.php';
// require_once 'libs/php-jwt/src/ExpiredException.php';
// require_once 'libs/php-jwt/src/SignatureInvalidException.php';
// require_once 'libs/php-jwt/src/JWT.php';
// require_once 'libs/php-jwt/src/Key.php';

// require_once __DIR__ . '/../../../vendor/firebase/php-jwt/src/BeforeValidException.php';
// require_once __DIR__ . '/../../../vendor/firebase/php-jwt/src/JWTExceptionWithPayloadInterface.php';
// require_once __DIR__ . '/../../../vendor/firebase/php-jwt/src/ExpiredException.php';
// require_once __DIR__ . '/../../../vendor/firebase/php-jwt/src/SignatureInvalidException.php';
// require_once __DIR__ . '/../../../vendor/firebase/php-jwt/src/JWT.php';
// require_once __DIR__ . '/../../../vendor/firebase/php-jwt/src/Key.php';
require_once __DIR__ . '/../../../model/core/security/Cuenta.php';
require_once __DIR__ . '/../../../model/business/Usuario_Tareas.php';
require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../../../config.php';


use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

class Login extends RequestLogin
{
    /**
     * Verifica en base de datos si las credenciales son correctas
     *
     * @throws ExcepcionApi Lanza una excepcion si encuetra un error
     * @return ContentBody Respesta de la solicitud
     */
    public function loguin()
    {
        try {
            $userLogin = JSONUtil::decodeJSON();
            $userBD = self::authenticate($userLogin->correo, $userLogin->contrasena);

            // echo "Llega al login";
            if ($userBD != NULL) {
                $cuenta = new Cuenta();
                $cuenta->correo = $userBD['correo'];
                $cuenta->estado_sesion = 1;
                $cuenta->id_usuario = $userBD['id_usuario'];
                $cuenta->token = $userBD['token'];
                $cuenta->id_cuenta = $userBD['id_cuenta'];


                // $cuenta = new Usuario_Tareas();
                // $cuenta->correo = $userBD['correo'];
                // $cuenta->nombre = $userBD['nombre'];
                // $cuenta->token = $userBD['token'];
                // $cuenta->id_usuario = $userBD['id_usuario'];
                $bodyAnswer = new ContentBody(OK, ST200, $cuenta);
                return $bodyAnswer;
            } else {
                $bodyAnswer = new ContentBody(FORBIDDEN, ST403, noAutheticate);
                return $bodyAnswer;
            }
        } catch (Exception $e) {
            throw new ExcepcionApi(INTERNAL_SERVER_ERROR, ST500, $e->getMessage());
        }
    }

    /**
     * Verifica en base de datos si las credenciales son correctas
     *
     * @param unknown $userA
     *            Usuario a verificar
     * @param unknown $passwordPlain
     *            Contraseña Plana
     * @return mixed|NULL respuesta de la verificación
     */
    public function authenticate($userA, $passwordPlain)
    {
        $query = SELECT_USER;
        $statement = Connection::getInstance()->getConnection()->prepare($query);
        $statement->bindParam(1, $userA);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        // echo "Llega al post del login: ";

        if ($user == NULL) {
            return null;
        }
        // echo 'Llega a la autenticación';
        if (password_verify($passwordPlain, $user["contrasena"])) {
            //Aqui va la asignacion del token
            $user['token'] = $this->generarToken($user);
            return $user;
        } else {
            return null;
        }
    }
    function generarToken($usuario)
    {
        $issuedAt = time(); // Momento actual
        $expire = $issuedAt + 3600; // Expira en 1 hora

        $payload = [
            'iat' => $issuedAt,      // issued at
            'exp' => $expire,        // expiración
            'data' => [              // Datos del usuario
                'id_usuario' => $usuario['id_usuario'],
                'email' => $usuario['correo'],
                'contrasena' => $usuario['contrasena'],
                'id_cuenta' => $usuario['id_cuenta'],
                'estado_sesion' => $usuario['estado_sesion']


                // 'correo' => $usuario['correo'],
                // 'id' => $usuario['id_usuario']
            ]
        ];

        // Generar el token con HS256 y tu SECRET_KEY
        $jwt = JWT::encode($payload, SECRET_KEY, 'HS256');
        return $jwt;
    }
}

