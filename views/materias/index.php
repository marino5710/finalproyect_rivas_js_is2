<?php include_once '../../includes/header.php' ?>


<h1 class="text-center">FORMULARIO DE REGISTRO DE MATERIAS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/materias/guardar.php" method="POST" class="border bg-light shadow rounded p-2">
        <div class="row p-4">
            <div class="col-4 p-5"></div>
            <div class="col-4">
                <label for="materia_nombre">NOMBRE DE LA MATERIA</label>
                <input type="text" name="materia_nombre" id="materia_nombre" class="form-control" required>
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
        </div>
    </form>
</div>
<div class="row justify-content-center">
    <div class="col-lg-12 table-responsive">
        <h2 class="text-center">Listado de Materias</h2>
        <table class="table table-bordered table-hover" id="tablaMaterias">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Materia</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5">No hay Materias disponibles</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
<script defer src="/proyecto_final_rivas_is1/src/js/funciones.js"></script>
<script defer src="/proyecto_final_rivas_is1/src/js/materias/index.js"></script>

<?php include_once '../../includes/footer.php' ?>