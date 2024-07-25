<?php
require '../../models/Alumnos.php';
header('Content-Type: application/json; charset=UTF-8');

$metodo = $_SERVER['REQUEST_METHOD'];
$tipo = $_REQUEST['tipo'];

// echo json_encode($_GET);
// exit;
try {
    switch ($metodo) {
        case 'POST':
            $alumno = new Alumnos($_POST);
            switch ($tipo) {
                case '1':

                    $ejecucion = $alumno->guardar();
                    $mensaje = "Guardado correctamente";
                    break;

                case '2':

                    $ejecucion = $alumno->modificar();
                    $mensaje = "Modificado correctamente";
                    break;

                case '3':

                    $ejecucion = $alumno->eliminar();
                    $mensaje = "Eliminado correctamente";
                    break;

                default:

                    break;
            }

            http_response_code(200);
            echo json_encode([
                "mensaje" => $mensaje,
                "codigo" => 1,

            ]);
            break;

        case 'GET':
            http_response_code(200);
            $alumno = new Alumnos($_GET);
            $alumnos = $alumno->buscar();
            echo json_encode($alumnos);
            break;

        default:
            http_response_code(405);
            echo json_encode([
                "mensaje" => "Método no permitido",
                "codigo" => 9,
            ]);
            break;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "detalle" => $e->getMessage(),
        "mensaje" => "Error de ejecución",
        "codigo" => 0,
    ]);
}

exit;
