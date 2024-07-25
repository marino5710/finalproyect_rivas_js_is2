<div id="navbar">
    <nav class="navbar fixed-top navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../vistas/alumnos/index.php"><img src="../../src/images/progra.png" alt="Logo" width="80" height="80"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">

            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../vistas/alumnos/index.php"><i class="bi bi-house-fill me-2"></i>INICIO</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-file-person me-2"></i> ALUMNOS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../../vistas/alumnos/index2.php"><i class="bi bi-person-plus-fill"></i></i> REGISTRAR ALUMNO</a></li>
                            <li><a class="dropdown-item" href="../../controladores/alumno/buscar.php"><i class="bi bi-person-lines-fill"></i></i> VER LISTADO DE ALUMNOS</a></li>
                            <li><a class="dropdown-item" href="../../vistas/alumnos/buscar.php"><i class="bi bi-search me-2"></i> BUSCAR ALUMNO</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-journals"></i></i> MATERIAS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../../vistas/materias/formulario.php"><i class="bi bi-journal-plus"></i></i> REGISTRAR MATERIA NUEVA</a></li>
                            <li><a class="dropdown-item" href="../../controladores/materias/buscar.php"><i class="bi bi-card-list"></i></i> VER LISTADO DE MATERIAS</a></li>
                            <li><a class="dropdown-item" href="../../vistas/materias/buscar.php"><i class="bi bi-search me-2"></i> BUSCAR MATERIA</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-mortarboard-fill"></i></i>NOTAS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../../controladores/notas/buscar.php"><i class="bi bi-info-square-fill"></i></i>    INFORMACION NOTAS</a></li>
                        </ul>
                    </li>
            </div>
        </div>
    </nav>
</div>