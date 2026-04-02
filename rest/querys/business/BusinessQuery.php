<?php
/**
 * <b>Descripcion:</b> Clase que <br/> contiene las consultas de la aplicación

 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */

/**
 * Constante de consultas base de datos
 */
// define("INTSERT_PERSON", "INSERT INTO person(name, lastName, phone) VALUES (?,?,?);");
// define("UPDATE_PERSON", "UPDATE person SET name=?, lastName =? , phone=? WHERE id=? ;");

define("INTSERT_PET", "INSERT INTO pet(name, race, gender) VALUES (?,?,?);");
define("UPDATE_PET", "UPDATE pet SET name=?, race =? , gender=? WHERE id=? ;");

// Consutas para cabaña
define("INSERT_CABANIA", "INSERT INTO cabania (nombre, capacidad, precio_por_persona, estado) VALUES (?,?,?,?);");
define("UPDATE_CABANIA", "UPDATE cabania SET nombre=?, capacidad =?, precio_por_persona =?, estado =? WHERE id_cabania=? ;");
define("DELETE_CABANIA", "UPDATE cabania SET estado=0 WHERE id_cabania=?");


// Querys para cuenta
define("SELECT_CUENTA", "SELECT * FROM cuenta WHERE id_cuenta=?");
define("INSERT_CUENTA", "INSERT INTO cuenta (correo, contrasena, estado_sesion, id_usuario, token) VALUES (?,?,?,?,?);");
define("UPDATE_CUENTA", "UPDATE cuenta SET correo=?, contrasena =?, estado_sesion =?, id_usuario =?, token=? WHERE id_cuenta=? ;");
define("DELETE_CUENTA", "UPDATE cuenta SET estado_sesion=0 WHERE id_cuenta=?");


// Querys para mesas
define("SELECT_MESA", "SELECT * FROM mesa WHERE id_mesa=?");
define("INSERT_MESA", "INSERT INTO mesa (numero, capacidad, estado) VALUES (?,?,?);");
define("UPDATE_MESA", "UPDATE mesa SET numero=?, capacidad =?, estado =? WHERE id_mesa=? ;");
define("DELETE_MESA", "UPDATE mesa SET estado=0 WHERE id_mesa=?");

// Querys para reservas
define("SELECT_RESERVA", "SELECT * FROM reserva WHERE id_cliente=?");
define("INSERT_RESERVA", "INSERT INTO reserva (fecha_hora_inicio, fecha_hora_fin, id_cliente, estado, cantidad_personas) VALUES (?,?,?,?,?);");
define("UPDATE_RESERVA", "UPDATE reserva SET fecha_hora_inicio = ?, fecha_hora_fin=?, id_cliente=?, estado=?, cantidad_personas=? WHERE id_reserva=?;");
define("DELETE_RESERVA", "UPDATE reserva SET estado=0 WHERE id_reserva=?");

// Querys para reservas de cabañas
define("SELECT_RESERVA_CABANIA", "SELECT * FROM reserva_cabania WHERE id_reserva=? AND id_cabania=?;");
define("INSERT_RESERVA_CABANIA", "INSERT INTO reserva_cabania (id_reserva, id_cabania) VALUES (?,?);");
define("UPDATE_RESERVA_CABANIA", "UPDATE reserva_cabania SET id_reserva= ?, id_cabania=? WHERE id_reserva=? AND id_cabania=?;");
define("DELETE_RESERVA_CABANIA", "DELETE FROM reserva_cabania WHERE id_reserva=? AND id_cabania=?;");
// define("DELETE_RESERVA_CABANIA", "UPDATE reserva_cabania SET estado=0 WHERE id_reserva=?");

// Querys para reservas de mesas
define("SELECT_RESERVA_MESA", "SELECT * FROM reserva_mesa WHERE id_reserva=? AND id_mesa=?;");
define("INSERT_RESERVA_MESA", "INSERT INTO reserva_mesa (id_reserva, id_mesa) VALUES (?,?);");
define("UPDATE_RESERVA_MESA", "UPDATE reserva_mesa SET id_reserva= ?, id_mesa=? WHERE id_reserva=? AND id_mesa=?;");
define("DELETE_RESERVA_MESA", "DELETE FROM reserva_mesa WHERE id_reserva=? AND id_mesa=?;");

// Querys para facturas
define("SELECT_FACTURA", "SELECT * FROM factura WHERE id_reserva=?");
define("INSERT_FACTURA", "INSERT INTO factura (numero_factura, fecha_emision, subtotal, impuestos, estado, id_reserva, total) VALUES (?,?,?,?,?,?,?);");
define("UPDATE_FACTURA", "UPDATE factura SET numero_factura = ?, fecha_emision=?, subtotal=?, impuestos=?, estado=?, total=? WHERE id_factura=?;");
define("DELETE_FACTURA", "UPDATE factura SET estado='paga' WHERE id_factura=?");

// Querys para clientes
define("SELECT_CLIENTE", "SELECT * FROM cliente WHERE id_cliente=?");
define("INSERT_CLIENTE", "INSERT INTO cliente (id_usuario, fecha_registro, observaciones) VALUES (?,?,?);");
define("UPDATE_CLIENTE", "UPDATE cliente SET id_usuario = ?, fecha_registro=?, observaciones=? WHERE id_cliente=?;");
define("DELETE_CLIENTE", "UPDATE cliente SET estado='paga' WHERE id_factura=?");

// Querys para detalles de facturas
define("SELECT_DETALLE_FACTURA", "SELECT * FROM detalle_factura WHERE id_factura=?");
define("INSERT_DETALLE_FACTURA", "INSERT INTO detalle_factura (descripcion, cantidad, precio_unitario, subtotal, id_factura, iva_unitario, total, iva_subtotal) VALUES (?,?,?,?,?,?,?,?);");
define("UPDATE_DETALLE_FACTURA", "UPDATE detalle_factura SET descripcion = ?, cantidad=?, precio_unitario=?, subtotal=?, id_factura=?, iva_unitario=?, total=?, iva_subtotal=? WHERE id_detalle=?;");
define("DELETE_DETALLE_FACTURA", "DELETE FROM detalle_factura WHERE id_detalle=?");

// Querys para pago
define("SELECT_PAGO", "SELECT * FROM pago WHERE id_pago=?");
define("INSERT_PAGO", "INSERT INTO pago (fecha, monto, metodo, id_factura) VALUES (?,?,?,?);");
define("UPDATE_PAGO", "UPDATE pago SET fecha = ?, monto=?, metodo=?, id_factura=? WHERE id_pago=?;");
define("DELETE_PAGO", "DELETE FROM pago WHERE id_pago=?");

// --------------------PROGRAMA DE TAREAS
// Querys para usuarios tareas
define("SELECT_USUARIO_TAREA", "SELECT * FROM usuario WHERE id_usuario=?");
define("INSERT_USUARIO_TAREA", "INSERT INTO usuario (nombre, password, fecha_registro, email) VALUES (?,?,?,?);");
define("UPDATE_USUARIO_TAREA", "UPDATE usuario SET nombre = ?, password=?, fecha_registro=?, email=? WHERE id_usuario=?;");
define("DELETE_USUARIO_TAREA", "DELETE FROM usuario WHERE id_usuario=?");

// Querys para categorias
define("SELECT_CATEGORIA", "SELECT * FROM categoria WHERE id_categoria=?");
define("INSERT_CATEGORIA", "INSERT INTO categoria (nombre, descripcion) VALUES (?,?);");
define("UPDATE_CATEGORIA", "UPDATE categoria SET nombre=?, descripcion=? WHERE id_categoria=?;");
define("DELETE_CATEGORIA", "DELETE FROM categoria WHERE id_categoria=?");

// Querys para tareas
define("SELECT_TAREA", "SELECT * FROM tarea WHERE id_tarea=?");
define("INSERT_TAREA", "INSERT INTO tarea (titulo, descripcion, fecha_creacion, fecha_vencimiento, estado, id_usuario, id_categoria) VALUES (?,?,?,?,?,?,?);");
define("UPDATE_TAREA", "UPDATE tarea SET titulo=?, descripcion=?, fecha_creacion=?, fecha_vencimiento=?, estado=?, id_usuario=?, id_categoria=? WHERE id_tarea=?;");
define("DELETE_TAREA", "DELETE FROM tarea WHERE id_tarea=?");

// Querys para clima_info
define("SELECT_CLIMA", "SELECT * FROM clima_info WHERE id_clima=?");
define("INSERT_CLIMA", "INSERT INTO clima_info (descripcion, fecha, id_tarea) VALUES (?,?,?);");
define("UPDATE_CLIMA", "UPDATE clima_info SET descripcion=?, fecha=?, id_tarea=? WHERE id_clima=?;");
define("DELETE_CLIMA", "DELETE FROM clima_info WHERE id_clima=?");

// Querys para notificaciones
define("SELECT_NOTIFICACION", "SELECT * FROM notificacion WHERE id_notificacion=?");
define("INSERT_NOTIFICACION", "INSERT INTO notificacion (mensaje, fecha_envio, leida, id_usuario, id_tarea) VALUES (?,?,?,?,?);");
define("UPDATE_NOTIFICACION", "UPDATE notificacion SET mensaje=?, fecha_envio=?, leida=?, id_usuario=?, id_tarea=? WHERE id_notificacion=?;");
define("DELETE_NOTIFICACION", "DELETE FROM notificacion WHERE id_notificacion=?");
?>
