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
define("INSERT_USUARIO", "INSERT INTO usuario (nombres, apellidos, tipo_documento, numero_documento, telefono, direccion, ciudad, fecha_nacimiento, estado, id_rol, token) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ");
define("UPDATE_USUARIO", "UPDATE usuario SET  nombres = ?, apellidos = ?, tipo_documento = ? , numero_documento = ?, telefono = ?, direccion = ?, ciudad = ?, fecha_nacimiento = ?, estado = ?, id_rol = ?, token = ? WHERE id_usuario=? ;");
define("SELECT_USUARIO", "SELECT * FROM usuario WHERE id_usuario = ?");
define("DELETE_USUARIO", "UPDATE usuario SET estado=0 WHERE id_usuario=?");

// Consultas para roles 
define("INSERT_ROL", "INSERT INTO rol(nombre, description) VALUES (?,?);");
define("UPDATE_ROL", "UPDATE rol SET nombre=?, description =? WHERE id_rol=? ;");
define("DELETE_ROL", "UPDATE rol SET description='borrado' WHERE id_rol=?");


define("INTSERT_USUARIO", "INSERT INTO j4user(user,password,keyAPI,roles) VALUES(?,?,?,?);");
define("UPDATE_USER", "UPDATE j4user SET  password = ?, keyAPI = ?, roles = ? WHERE id=? ;");
define("SELECT_USER", "SELECT password,user,keyAPI,roles FROM j4user WHERE user like ?");
define("VERIFY_KEYAPI", "SELECT COUNT(user) FROM j4user WHERE keyAPI=?");


?>