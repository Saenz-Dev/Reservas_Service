<?php
// include 'Conexion.php';

// $pdo = new Conexion();

// if($_SERVER['REQUEST_METHOD'] == 'GET') {
//     $sql = $pdo->prepare("SELECT * FROM usuarios");
//     $sql->execute();
//     $sql->setFetchMode(PDO::FETCH_ASSOC);
//     header("HTTP/1.1 200 OK");
//     echo json_encode($sql->fetchAll());
//     exit;
// }

/** * <b>Descripcion:</b> Clase que <br/> Realiza la administración de las peticiones de usuario
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
/**
 * *Importa los resources necesarios para el funcionamiento de la clase
 */

// // Require de JWT
// require_once 'libs/php-jwt/src/BeforeValidException.php';
// require_once 'libs/php-jwt/src/ExpiredException.php';
// require_once 'libs/php-jwt/src/SignatureInvalidException.php';
// require_once 'libs/php-jwt/src/JWT.php';
// require_once 'libs/php-jwt/src/Key.php';

// use \Firebase\JWT\JWT;
// use \Firebase\JWT\Key;

require 'ctrl/core/util/UtilAuth.php';
require 'ctrl/core/auth/Authenticator.php';
require 'cxn/Connection.php';
require 'ctrl/core/commun/Request.php';
require 'ctrl/core/commun/IRequest.php';
require 'ctrl/business/Usuarios.php';
require 'ctrl/business/Cabanias.php';
require 'ctrl/core/segurity/Cuentas.php';
require 'ctrl/business/Mesas.php';
require 'ctrl/business/Reservas.php';
require 'ctrl/business/Reservas_Cabania.php';
require 'ctrl/business/Reservas_Mesa.php';
require 'ctrl/business/Facturas.php';
require 'ctrl/business/Clientes.php';
require 'ctrl/business/Detalles_Facturas.php';
require 'ctrl/business/Pagos.php';
require 'ctrl/core/commun/RequestRegistrarCuenta.php';
require 'ctrl/core/segurity/Registrar_Cuenta.php';
require 'ctrl/core/commun/RequestUsuarioSinToken.php';
require 'ctrl/core/segurity/Usuario_Sin_Token.php';

//require de Tareas
require 'ctrl/tareas/business/Categorias.php';
require 'ctrl/tareas/business/Notificaciones.php';
require 'ctrl/tareas/business/Climas_Info.php';
require 'ctrl/tareas/business/Tareas.php';
require 'ctrl/tareas/core/security/Usuarios_Tareas.php';
require 'ctrl/core/commun/RequestFiltrosTareas.php';
require 'ctrl/tareas/business/Tareas_Usuario.php';
require 'ctrl/tareas/business/Filt_Tarea_Prioridad.php';

// Require de Email
require 'ctrl/core/commun/RequestCorreo.php';
require 'ctrl/core/mail/Email.php';

require 'ctrl/core/commun/RequestLogin.php';
require 'ctrl/core/segurity/Login.php';
require 'ctrl/core/segurity/Roles.php';
require 'view/ViewAPI.php';
require 'view/ViewXML.php';
require 'view/ViewJSON.php';
require 'util/ExcepcionAPI.php';
require 'util/Status.php';
require 'util/MessageUser.php';
require 'util/FormatType.php';
require 'util/ContentBody.php';
require 'util/ResourcesURL.php';
require 'util/JSONUtil.php';
// require 'model/core/segurity/User.php';
require 'querys/core/SegurityQuery.php';
require 'ctrl/core/segurity/ValidacionDatos.php';


//Business
// require 'ctrl/business/Persons.php';
// require 'model/business/Person.php';
// require 'ctrl/business/Pets.php';
// require 'model/business/Pet.php';
require 'model/core/security/Usuario.php';
require 'model/business/Cabania.php';
require 'querys/business/BusinessQuery.php';

// header("Access-Control-Allow-Origin: http://localhost:4200");
// header("Access-Control-Allow-Headers: Content-Type, Authorization");
// header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

// Allow the specific origin
header("Access-Control-Allow-Origin: http://localhost:4200");
// Allow the Content-Type header specifically
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
// Allow the HTTP methods you are using
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

// Handle the preflight OPTIONS request immediately
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}

// Preparar manejo de excepciones
/**
 * *Formatos permitidos enviados por parametro
 */
$format = isset($_GET[FORMAT]) ? $_GET[FORMAT] : JSON;

switch ($format) {
    case XML:
        $view = new ViewXML();
        break;
    case JSON:
    default:
        $view = new ViewJSON();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

/**
 * *Manejo de excepciones para el componente
 */
set_exception_handler(function ($exception) use ($view) {
    // Cuando se presente error Call to undefined method Error::getState()
    // comentar linea y descomentar siguiente
    // $bodyAnswer   = new ContentBody($exception->getState(), $exception->getCode(), $exception->getMessage());
    $bodyAnswer = new ContentBody(INTERNAL_SERVER_ERROR, ST500, $exception->getMessage());
    $view->viewPrint($bodyAnswer);
});

// Extraer segmento de la url
if (isset($_GET['PATH_INFO'])) {
    $request = explode('/', $_GET['PATH_INFO']);
    //Descomentariar para saber url
    // print_r($request);
} else {
    throw new ExcepcionAPI(BAD_REQUEST, ST400, error_url);
}

// Separación de resources de la url
$resource = $request[0];
// print_r($request);
// Recursos existentes para servicios rest
$resourcesExisting = RESOURCES_URL;

// Comprobar si existe el resource
if (!in_array($resource, $resourcesExisting)) {
    throw new ExcepcionAPI(NOT_FOUND, ST404, error_notExist);
}

$method = strtolower($_SERVER['REQUEST_METHOD']);
// if ($resource == "login")
//     $resource = "useraction";
// Filtrar método
switch ($method) {
    case 'get':
        // echo $resource . PHP_EOL . $method;
        if (method_exists($resource, $method)) {
            // echo $resource . PHP_EOL . $method;
            // Innvoca para inicializar nombre de tabla
            $instance = new $resource();
            call_user_func(array(
                $instance,
                INIT_TABLE
            ));
            $cuerpo = (isset($id)) ? $id : null;
            // echo $cuerpo;

            // Innvoca la funciones http
            $answer = call_user_func(array(
                $resource,
                $method
            ), $cuerpo);
            $view->viewPrint($answer);
            break;
        }
    case 'post':
        // echo "resource: $resource", PHP_EOL, "method: $method", PHP_EOL;
        if (method_exists($resource, $method)) {
            // if ($resource != "useraction") {
            $instance = new $resource();
            call_user_func(array(
                $instance,
                INIT_TABLE
            ));
            // }
            //$request = JSONUtil::decodeJSON();
            // Ejecuta la función post del recurso
            // echo "$resource\n$method\n\n";
            $answer = call_user_func(array(
                $resource,
                $method
            ), $request);
            $view->viewPrint($answer);
            break;
        }
    case 'put':
        if (method_exists($resource, $method)) {
            // if ($resource != "useraction") {
            $instance = new $resource;
            call_user_func(array(
                $instance,
                INIT_TABLE
            ));
            // }
            // $request = JSONUtil::decodeJSON();

            // Ejecuta la función post del recurso
            // echo "$resource\n$method\n\n";
            $answer = call_user_func(array(
                $resource,
                $method
            ), $request);
            $view->viewPrint($answer);
            break;
        }
    case 'delete': {
        if (method_exists($resource, $method)) {
            // Innvoca para inicializar nombre de tabla
            // if ($resource != "useraction") {
            $instance = new $resource;
            call_user_func(array(
                $instance,
                INIT_TABLE
            ));
            // $request = JSONUtil::decodeJSON();
            // }
            // Innvoca la funciones http
            $answer = call_user_func(array(
                $resource,
                $method
            ), $request);
            $view->viewPrint($answer);
            break;
        }
    }
    default: {
        // Método no aceptado
        $view->viewPrint($body);
        throw new ExcepcionAPI(BAD_REQUEST, ST400, error_url);
    }
}
?>