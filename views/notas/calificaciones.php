<?php include_once '../../includes/header.php' ?>
<?php include_once '../../models/Alumnos.php' ?>
<?php include_once '../../models/Materias.php' ?>
<?php include_once '../../models/Notas.php' ?>




<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$verAlumnos = new Alumnos();
$alumnos = $verAlumnos->mostrarAlumnos();

$verMaterias = new Materias();
$materias = $verMaterias->mostrarMaterias();
?>


<h1 class="text-center">SELECCIONE AL ALUMNO</h1>
<div class="row justify-content-center">
    <form class="border bg-light shadow rounded p-4 col-lg-7">
        <div class="row mb-3">
            <div class="col mb-3">
                <label for="nota_alumno_id">SELECCIONE ALUMNO</label>
                <select id="nota_alumno_id" name="nota_alumno_id" class="form-control" required>
                    <option value="">SELECCIONE</option>
                    <?php foreach ($alumnos as $alumno): ?>
                        <option value="<?= $alumno['alumno_id'] ?>">
                            <?= $alumno['alumno_nombre1'] . "" ?>
                            <?= $alumno['alumno_nombre2'] . "" ?>
                            <?= $alumno['alumno_apellido1'] . "" ?>
                            <?= $alumno['alumno_apellido2'] . "" ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-4 p-3"></div>
        <div class="row justify-content-center mb-3">
            <div class="col">
                <button type="submit" id="btnGuardar" class="btn btn-primary w-100">Guardar</button>
            </div>
            <div class="col">
                <button type="button" id="btnBuscar" class="btn btn-info w-100">Buscar</button>
            </div>
            <div class="col">
                <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
            </div>
            <div class="col">
                <button type="button" id="btnCancelar" class="btn btn-secondary w-100">Cancelar</button>
            </div>
            <div class="col">
                <button type="reset" id="btnLimpiar" class="btn btn-secondary w-100">Limpiar</button>
            </div>
            <div class="col">
                <button type="button" id="btnImprimir" class="btn btn-success w-100">Imprimir</button>
            </div>
        </div>
    </form>
</div>
<div class="row justify-content-center">
    <div class="col-lg-12 table-responsive">
        <h2 class="text-center">Listado de Alumnos</h2>
        <table class="table table-bordered table-hover" id="tablaNotas">
            <thead>
                <tr>
                    <th>Primer Nombre</th>
                    <th>Segundo Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Grado</th>
                    <th>Arma o Servicio</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6">No hay alumnos</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th colspan="4">NOTAS OBTENIDAS</th>
        </tr>
        <tr>
            <th>No.</th>
            <th>Materia</th>
            <th>Punteo</th>
            <th>Ganó / Perdió</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th colspan="4">NO SE ENCONTRARON DATOS PARA MOSTRAR</th>
        </tr>
    </tbody>
</table>
<script defer src="/proyecto_final_rivas_is1/src/js/funciones.js"></script>
<script defer src="/proyecto_final_rivas_is1/src/js/notas/index.js"></script>

<?php include_once '../../includes/footer.php' ?>