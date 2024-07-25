<?php include_once '../../includes/header.php' ?>
<?php include_once '../../models/Armas.php' ?>
<?php include_once '../../models/Grados.php' ?>

<?php

$verArmas = new Armas();
$armas = $verArmas->mostrarArmas();

$verGrados = new Grados();
$grados = $verGrados->mostrarGrados();
?>


<h1 class="text-center">FORMULARIO DE REGISTRO DE ALUMNOS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/alumno/guardar.php" method="POST" class="border bg-light shadow rounded p-2">
        <div class="row">
            <div class="col-4">
                <label for="alumno_nombre1">PRIMER NOMBRE</label>
                <input type="text" name="alumno_nombre1" id="alumno_nombre1" class="form-control" required>
            </div>
            <div class="col-4">
                <label for="alumno_nombre2">SEGUNDO NOMBRE</label>
                <input type="text" name="alumno_nombre2" id="alumno_nombre2" class="form-control" required>
            </div>
            <div class="col-4">
                <label for="alumno_apellido1">PRIMER APELLIDO</label>
                <input type="text" name="alumno_apellido1" id="alumno_apellido1" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="alumno_apellido2">SEGUNDO APELLIDO</label>
                <input type="text" name="alumno_apellido2" id="alumno_apellido2" class="form-control" required>
            </div>
            <div class="col">
                <label for="alumno_grado">SELECCIONE SU GRADO</label>
                <br>
                <select id="alumno_grado" name="alumno_grado" class="form-control" required>
                    <option value="">SELECCIONE</option>
                    <?php foreach ($grados as $grado): ?>
                        <option value="<?= $grado['grado_id'] ?>">
                            <?= $grado['grado_nombre'] . "" ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <label for="alumno_arma_o_servicio">ARMA O SERVICIO</label>
                <br>
                <select id="alumno_arma_o_servicio" name="alumno_arma_o_servicio" class="form-control" required>
                    <option value="">SELECCIONE</option>
                    <?php foreach ($armas as $arma): ?>
                        <option value="<?= $arma['arma_id'] ?>">
                            <?= $arma['arma_nombre'] . "" ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row m-5">
            <div class="col"></div>
            <div class="col">
                <label for="alumno_nacionalidad">NACIONALIDAD</label>
                <input type="text" name="alumno_nacionalidad" id="alumno_nacionalidad" class="form-control" required>
            </div>
            <div class="col"></div>
        </div>
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
        </div>
    </form>
</div>
<div class="row justify-content-center">
    <div class="col-lg-12 table-responsive">
        <h2 class="text-center">Listado de Alumnos</h2>
        <table class="table table-bordered table-hover" id="tablaAlumnos">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Primer Nombre</th>
                    <th>Segundo Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Grado</th>
                    <th>Arma o Servicio</th>
                    <th>Nacionalidad</th>
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
<script defer src="/proyecto_final_rivas_is1/src/js/alumnos/index.js"></script>

<?php include_once '../../includes/footer.php' ?>