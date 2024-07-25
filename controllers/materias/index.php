<?php
require '../../models/Materias.php';
header('Content-Type: application/json; charset=UTF-8');

$metodo = $_SERVER['REQUEST_METHOD'];
$tipo = $_REQUEST['tipo'];

// echo json_encode($_GET);
// exit;
try {
    switch ($metodo) {
        case 'POST':
            $materia = new Materias($_POST);
            switch ($tipo) {
                case '1':

                    $ejecucion = $materia->guardar();
                    $mensaje = "Guardado correctamente";
                    break;

                case '2':

                    $ejecucion = $materia->modificar();
                    $mensaje = "Modificado correctamente";
                    break;

                case '3':

                    $ejecucion = $materia->eliminar();
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
            $materia = new Materias($_GET);
            $materias = $materia->buscar();
            echo json_encode($materias);
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
