<?php
/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona los usuarios de reservas sin token de autenticación
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Usuario_Sin_Token extends RequestUsuarioSinToken
{
    public function consultarUsuario()
    {
        try {
            $id = $_GET['id'];
            if ($id != NULL) {
                $query = SELECT_USUARIO;
                $statement = Connection::getInstance()->getConnection()->prepare($query);
                $statement->bindParam(1, $id);
                $statement->execute();
                $usuario = $statement->fetch(PDO::FETCH_ASSOC);

                return $bodyAnswer = new ContentBody(OK, ST200, $usuario);
            } else {
                $bodyAnswer = new ContentBody(FORBIDDEN, ST403, noAutheticate);
                return $bodyAnswer;
            }
        } catch (Exception $e) {
            throw new ExcepcionApi(INTERNAL_SERVER_ERROR, ST500, $e->getMessage());
        }
    }

    public function consultarUsuarios()
    {
        try {
            $query = 'SELECT * FROM usuario';
            $statement = Connection::getInstance()->getConnection()->prepare($query);
            $statement->execute();
            $usuarios = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $bodyAnswer = new ContentBody(OK, ST200, $usuarios);
        } catch (Exception $e) {
            throw new ExcepcionApi(INTERNAL_SERVER_ERROR, ST500, $e->getMessage());
        }
    }

    public function consultarUsuarioId()
    {
        try {
            $id = $_GET['id_usuario'];
            
            if ($id != NULL) {
                $query = SELECT_USUARIO_ID;
                $statement = Connection::getInstance()->getConnection()->prepare($query);
                $statement->bindParam(1, $id);
                $statement->execute();
                $usuario = $statement->fetch(PDO::FETCH_ASSOC);

                return $bodyAnswer = new ContentBody(OK, ST200, $usuario);
            } else {
                $bodyAnswer = new ContentBody(FORBIDDEN, ST403, noAutheticate);
                return $bodyAnswer;
            }
        } catch (Exception $e) {
            throw new ExcepcionApi(INTERNAL_SERVER_ERROR, ST500, $e->getMessage());
        }
    }

        /**
        * Metodo de registro para un nuevo usuario
        *
        * @param  unknown $request
        *            Datos de la nueva cuenta
        * @throws ExcepcionApi Lanza una excepcion si no encuetra ek metodo
        * @return ContentBody Retorna una respuesta de la solicitud
        */
    public function registrar()
    {
        try {
            $body = JSONUtil::decodeJSON();
            $queryUsuario = INSERT_USUARIO;

            $classUsuario = new Usuarios();

            $statementUsuario = Connection::getInstance()->getConnection()->prepare($queryUsuario);

            $classUsuario->insertParameter($body, $statementUsuario);

            $statementUsuario->execute();
            return new ContentBody(CREATE, ST201, "Usuario registrado exitosamente");
        } catch (Exception $e) {
            throw new ExcepcionApi(INTERNAL_SERVER_ERROR, ST500, $e->getMessage());
        }
    }
}