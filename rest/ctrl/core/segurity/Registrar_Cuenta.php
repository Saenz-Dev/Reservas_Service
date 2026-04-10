<?php
/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona los usuarios de tareas
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Registrar_Cuenta extends RequestRegistrarCuenta
{
    public function consultar()
    {
        try {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if ($id != NULL) {
                    $query = SELECT_CUENTA;
                    $statement = Connection::getInstance()->getConnection()->prepare($query);
                    $statement->bindParam(1, $id);
                    $statement->execute();
                    $cuenta = $statement->fetch(PDO::FETCH_ASSOC);
    
                    return $bodyAnswer = new ContentBody(OK, ST200, $cuenta);
                } else {
                    $bodyAnswer = new ContentBody(FORBIDDEN, ST403, noAutheticate);
                    return $bodyAnswer;
                }
            } else {
                 $query = 'SELECT * FROM cuenta';
                    $statement = Connection::getInstance()->getConnection()->prepare($query);
                    $statement->execute();
                    $cuentas = $statement->fetchAll(PDO::FETCH_ASSOC);
    
                    return $bodyAnswer = new ContentBody(OK, ST200, $cuentas);
                throw new ExcepcionApi(BAD_REQUEST, ST400, "El id es requerido");

            }

        } catch (Exception $e) {
            throw new ExcepcionApi(INTERNAL_SERVER_ERROR, ST500, $e->getMessage());
        }
    }

    public function registrar()
    {
        try {
            $body = JSONUtil::decodeJSON();
            $queryCuenta = INSERT_CUENTA;

            $classCuenta = new Cuentas();

            $statementCuenta = Connection::getInstance()->getConnection()->prepare($queryCuenta);

            $classCuenta->insertParameter($body, $statementCuenta);

            $statementCuenta->execute();
            return new ContentBody(CREATE, ST201, "Cuenta registrada exitosamente");
        } catch (Exception $e) {
            throw new ExcepcionApi(INTERNAL_SERVER_ERROR, ST500, $e->getMessage());
        }
    }
}