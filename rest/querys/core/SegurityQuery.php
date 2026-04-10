<?php
/**
 * <b>Descripcion:</b> Clase que <br/> contiene las consultas de la aplicación
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */

/**
 * Constante de consultas base de datos
 */

// Consulta para usuarios
define("INSERT_USUARIO", "INSERT INTO usuario (nombres, apellidos, tipo_documento, numero_documento, telefono, ciudad, fecha_nacimiento, estado, id_rol) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?); ");
define("UPDATE_USUARIO", "UPDATE usuario SET  nombres = ?, apellidos = ?, tipo_documento = ? , numero_documento = ?, telefono = ?, ciudad = ?, fecha_nacimiento = ?, estado = ?, id_rol = ? WHERE id_usuario=? ;");
define("SELECT_USUARIO", "SELECT * FROM usuario WHERE numero_documento = ?");
define("DELETE_USUARIO", "UPDATE usuario SET estado=0 WHERE id_usuario=?");

define("SELECT_USUARIO_ID", "SELECT * FROM usuario WHERE id_usuario = ?");

// Consultas para roles 
define("INSERT_ROL", "INSERT INTO rol(nombre, description) VALUES (?,?);");
define("UPDATE_ROL", "UPDATE rol SET nombre=?, description =? WHERE id_rol=? ;");
define("DELETE_ROL", "UPDATE rol SET description='borrado' WHERE id_rol=?");


// define("INTSERT_USUARIO", "INSERT INTO j4user(user,password,keyAPI,roles) VALUES(?,?,?,?);");
// define("UPDATE_USER", "UPDATE j4user SET  password = ?, keyAPI = ?, roles = ? WHERE id=? ;");
define("SELECT_USER", "SELECT * FROM cuenta WHERE correo like ?");
define("VERIFY_KEYAPI", "SELECT COUNT(correo) FROM usuario WHERE token=?");


?>