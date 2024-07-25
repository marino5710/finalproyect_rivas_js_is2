<?php
require_once 'Conexion.php';

class Grados extends Conexion
{
    public $grado_id;
    public $grado_nombre;
    public $grado_situacion;

    public function __construct($args = [])
    {
        $this->grado_id = $args['grado_id'] ?? null;
        $this->grado_nombre = $args['grado_nombre'] ?? '';
        $this->grado_situacion = $args['grado_situacion'] ?? null;
    }
    public function mostrarGrados(){
        $sql ="SELECT * FROM Grados where grado_situacion = 1";
        $resultado = self::servir($sql);
        return $resultado;
    }
}
