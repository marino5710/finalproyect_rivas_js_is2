<?php include_once '../../includes/header.php' ?>
<?php include_once '../../models/Alumnos.php' ?>
<?php include_once '../../models/Materias.php' ?>



<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



$verAlumnos = new Alumnos();
$alumnos = $verAlumnos->mostrarAlumnos();

$verMaterias = new Materias();
$materias = $verMaterias->mostrarMaterias();
?>


<h1 class="text-center">ASIGNAR NOTA DEL ALUMNO</h1>
<div class="row justify-content-center">
    <form class="border bg-light shadow rounded p-4 col-lg-7">
        <div class="row mb-3">
            <div class="col-6 mb-3">
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
            <div class="col-6 mb-3">
                <label for="nota_materia_id">SELECCIONE MATERIA</label>
                <select id="nota_materia_id" name="nota_materia_id" class="form-control" required>
                    <option value="">SELECCIONE</option>
                    <?php foreach ($materias as $materia): ?>
                        <option value="<?= $materia['materia_id'] ?>">
                            <?= $materia['materia_nombre'] . "" ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-3"></div>
            <div class="col-6">
                <label for="nota">ASIGNE NOTA </label>
                <input type="number" name="nota" id="nota" class="form-control" required>
            </div>       
            <div class="col-3"></div>
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
</div>
<div class="row justify-content-center">
    <div class="col-lg-12 table-responsive">
        <h2 class="text-center">Listado de Alumnos</h2>
        <table class="table table-bordered table-hover" id="tablaNotas">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Materia</th>
                    <th>Nota</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5">No hay productos disponibles</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
<script defer src="/proyecto_final_rivas_is1/src/js/funciones.js"></script>
<script defer src="/proyecto_final_rivas_is1/src/js/notas/index.js"></script>

<?php include_once '../../includes/footer.php' ?>