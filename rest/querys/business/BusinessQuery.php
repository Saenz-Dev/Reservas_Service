<?php
/**
 * <b>Descripcion:</b> Clase que <br/> contiene las consultas de la aplicación

 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */

/**
 * Constante de consultas base de datos
 */
define("INTSERT_PERSON", "INSERT INTO person(name, lastName, phone) VALUES (?,?,?);");
define("UPDATE_PERSON", "UPDATE person SET name=?, lastName =? , phone=? WHERE id=? ;");

define("INTSERT_PET", "INSERT INTO pet(name, race, gender) VALUES (?,?,?);");
define("UPDATE_PET", "UPDATE pet SET name=?, race =? , gender=? WHERE id=? ;");

// Constantes para querys de cabania


?>
