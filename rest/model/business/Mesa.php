<?php
/**
 * Clase que modela una Mesa
 */
class Mesa {

    /**
     * @var int ID de la mesa
     */
    public $id_mesa;

    /**
     * @var string Nombre o número de la mesa
     */
    public $numero;

    /**
     * @var int Capacidad de personas
     */
    public $capacidad;

    /**
     * @var EstadoMesa Estado actual
     */
    public $estado;

    /**
     * 🔥 Relación muchos a muchos
     * @var Reserva[]
     */
    public $reservas = [];

    // 🔹 GETTERS

    /**
     * @return int|null
     */
    public function getIdMesa() {
        return $this->id_mesa;
    }

    /**
     * @return string|null
     */
    public function getNumero() {
        return $this->numero;
    }

    /**
     * @return int|null
     */
    public function getCapacidad() {
        return $this->capacidad;
    }

    /**
     * @return EstadoMesa|null
     */
    public function getEstado() {
        return $this->estado;
    }

    /**
     * @return Reserva[]
     */
    public function getReservas() {
        return $this->reservas;
    }

    // 🔹 SETTERS

    /**
     * @param int $id
     */
    public function setIdMesa($id) {
        $this->id_mesa = $id;
    }

    /**
     * @param string $numero
     */
    public function setNumero($numero) {
        $this->numero = $numero;
    }

    /**
     * @param int $capacidad
     */
    public function setCapacidad($capacidad) {
        $this->capacidad = $capacidad;
    }

    /**
     * @param EstadoMesa $estado
     */
    public function setEstado(EstadoMesa $estado) {
        $this->estado = $estado;
    }

    /**
     * @param Reserva[] $reservas
     */
    public function setReservas(array $reservas) {
        $this->reservas = $reservas;
    }

    /**
     * Agrega una reserva a la mesa
     * 
     * @param Reserva $reserva
     */
    public function addReserva(Reserva $reserva) {
        $this->reservas[] = $reserva;
    }
}