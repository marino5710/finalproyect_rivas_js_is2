<?php
require_once 'Conexion.php';

class Armas extends Conexion
{
    public $arma_id;
    public $arma_nombre;
    public $arma_situacion;

    public function __construct($args = [])
    {
        $this->arma_id = $args['arma_id'] ?? null;
        $this->arma_nombre = $args['arma_nombre'] ?? '';
        $this->arma_situacion = $args['arma_situacion'] ?? null;
    }
    public function mostrarArmas(){
        $sql ="SELECT * FROM Armas where arma_situacion = 1";
        $resultado = self::servir($sql);
        return $resultado;
    }
}