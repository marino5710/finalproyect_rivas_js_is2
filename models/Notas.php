<?php
require_once 'Conexion.php';

class Notas extends Conexion
{
    public $nota_id;
    public $nota_alumno_id;
    public $nota_materia_id;
    public $nota;
    public $nota_situacion;


    public function __construct($args = [])
    {
        $this->nota_id = $args['nota_id'] ?? '';
        $this->nota_alumno_id = $args['nota_alumno_id'] ?? '';
        $this->nota_materia_id = $args['nota_materia_id'] ?? '';
        $this->nota = $args['nota'] ?? '';
        $this->nota_situacion = $args['nota_situacion'] ?? null;
    }

    // INSERTAR
    public function guardar()
    {
        $sql = "INSERT INTO Notas (nota_alumno_id, nota_materia_id, nota) values ('$this->nota_alumno_id', '$this->nota_materia_id', '$this->nota')";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }


    public function buscar()
    {
        $sql = "SELECT notas.*, alumnos.*, materias.* FROM notas INNER JOIN alumnos ON nota_alumno_id  = alumno_id INNER JOIN materias ON nota_materia_id  = materia_id WHERE alumno_situacion = 1";

        if ($this->nota != '') {
            $sql .= " AND nota like '%$this->nota%' ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }



    public function modificar()
    {
        $sql = "UPDATE notas SET nota = '$this->nota' WHERE nota_id = $this->nota_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    public function eliminar()
    {
        $sql = "UPDATE notas SET nota_situacion = 0 WHERE nota_id = $this->nota_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

}