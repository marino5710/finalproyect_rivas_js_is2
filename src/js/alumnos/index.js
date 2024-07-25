const btnGuardar = document.getElementById('btnGuardar')
const btnModificar = document.getElementById('btnModificar')
const btnEliminar = document.getElementById('btnEliminar')
const btnBuscar = document.getElementById('btnBuscar')
const btnCancelar = document.getElementById('btnCancelar')
const btnLimpiar = document.getElementById('btnLimpiar')
const tablaAlumnos = document.getElementById('tablaAlumnos')
const formulario = document.querySelector('form')

btnModificar.parentElement.style.display = 'none'
btnCancelar.parentElement.style.display = 'none'

const getAlumnos = async () => {
    const nombre1 = formulario.alumno_nombre1.value.trim()
    const nombre2 = formulario.alumno_nombre2.value.trim()
    const apellido1 = formulario.alumno_apellido1.value.trim()
    const apellido2 = formulario.alumno_apellido2.value.trim()
    const grado = formulario.alumno_grado.value.trim()
    const alumno_arma_o_servicio = formulario.alumno_arma_o_servicio.value.trim()
    const nacionalidad = formulario.alumno_nacionalidad.value.trim()
    const url = `/proyecto_final_rivas_is1/controllers/alumnos/index.php?alumno_nombre1=${nombre1}&alumno_nombre2=${nombre2}&alumno_apellido1=${apellido1}&alumno_apellido2=${apellido2}&alumno_grado=${grado}&alumno_arma_o_servicio=${alumno_arma_o_servicio}&alumno_nacionalida=${nacionalidad}`
    const config = {
        method: 'GET'
    }

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log(data);

        tablaAlumnos.tBodies[0].innerHTML = ''
        const fragment = document.createDocumentFragment()
        let contador = 1;

        if (respuesta.status == 200) {
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "success",
                title: 'Alumnos Encontrados',
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();

            if (data.length > 0) {
                data.forEach(alumno => {
                    const tr = document.createElement('tr')
                    const celda1 = document.createElement('td')
                    const celda2 = document.createElement('td')
                    const celda3 = document.createElement('td')
                    const celda4 = document.createElement('td')
                    const celda5 = document.createElement('td')
                    const celda6 = document.createElement('td')
                    const celda7 = document.createElement('td')
                    const celda8 = document.createElement('td')
                    const celda9 = document.createElement('td')
                    const celda10 = document.createElement('td')
                    const buttonModificar = document.createElement('button')
                    const buttonEliminar = document.createElement('button')

                    celda1.innerText = contador;
                    celda2.innerText = alumno.alumno_nombre1;
                    celda3.innerText = alumno.alumno_nombre2;
                    celda4.innerText = alumno.alumno_apellido1;
                    celda5.innerText = alumno.alumno_apellido2;
                    celda6.innerText = alumno.alumno_grado;
                    celda7.innerText = alumno.alumno_arma_o_servicio;
                    celda8.innerText = alumno.alumno_nacionalidad;

                    buttonModificar.textContent = 'Modificar'
                    buttonModificar.classList.add('btn', 'btn-warning', 'w-100')
                    buttonModificar.addEventListener('click', () => llenardatos(alumno))


                    buttonEliminar.textContent = 'Eliminar';
                    buttonEliminar.classList.add('btn', 'btn-danger', 'w-100');
                    buttonEliminar.addEventListener('click', () => eliminarAlumno(alumno.alumno_id));

                    celda9.appendChild(buttonModificar)
                    celda10.appendChild(buttonEliminar)

                    tr.appendChild(celda1)
                    tr.appendChild(celda2)
                    tr.appendChild(celda3)
                    tr.appendChild(celda4)
                    tr.appendChild(celda5)
                    tr.appendChild(celda6)
                    tr.appendChild(celda7)
                    tr.appendChild(celda8)
                    tr.appendChild(celda9)
                    tr.appendChild(celda10)
                    fragment.appendChild(tr);

                    contador++
                });

            } else {
                const tr = document.createElement('tr')
                const td = document.createElement('td')
                td.innerText = 'No hay Alumnos Disponibles'
                td.colSpan = 5;

                tr.appendChild(td)
                fragment.appendChild(tr)
            }
        } else {
            console.log('hola');
        }

        tablaAlumnos.tBodies[0].appendChild(fragment)
    } catch (error) {
        console.log(error);
    }
}

// getClientes();


const guardarAlumno = async (e) => {
    e.preventDefault();
    btnGuardar.disabled = true;
    const url = '/proyecto_final_rivas_is1/controllers/alumnos/index.php'
    const formData = new FormData(formulario)
    formData.append('tipo', 1)
    formData.delete('alumno_id')
    const config = {
        method: 'POST',
        body: formData
    }

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { mensaje, codigo, detalle } = data
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "success",
            title: mensaje,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire();
        // alert(mensaje)

        if (codigo == 1 && respuesta.status == 200) {
            getAlumnos();
            formulario.reset();
        } else {
            console.log(detalle);
        }

    } catch (error) {
        console.log(error);
    }
    btnGuardar.disabled = false;
}

const llenardatos = (alumno) => {
    formulario.alumno_id.value = alumno.alumno_id
    formulario.alumno_nombre1.value = alumno.alumno_nombre1
    formulario.alumno_nombre2.value = alumno.alumno_nombre2
    formulario.alumno_apellido1.value = alumno.alumno_apellido1
    formulario.alumno_apellido2.value = alumno.alumno_apellido2
    formulario.alumno_arma_o_servicio.value = alumno.alumno_arma_o_servicio
    formulario.alumno_nacionalidad.value = alumno.alumno_nacionalidad
    btnGuardar.parentElement.style.display = 'none'
    btnBuscar.parentElement.style.display = 'none'
    btnLimpiar.parentElement.style.display = 'none'
    btnModificar.parentElement.style.display = ''
    btnCancelar.parentElement.style.display = ''
}

const cancelar = (alumno) => {
    formulario.alumno_id.value = alumno.alumno_id
    formulario.alumno_nombre1.value = alumno.alumno_nombre1
    formulario.alumno_nombre2.value = alumno.alumno_nombre2
    formulario.alumno_apellido1.value = alumno.alumno_apellido1
    formulario.alumno_apellido2.value = alumno.alumno_apellido2
    formulario.alumno_arma_o_servicio.value = alumno.alumno_arma_o_servicio
    formulario.alumno_nacionalidad.value = alumno.alumno_nacionalidad
    btnGuardar.parentElement.style.display = ''
    btnBuscar.parentElement.style.display = ''
    btnLimpiar.parentElement.style.display = ''
    btnModificar.parentElement.style.display = 'none'
    btnCancelar.parentElement.style.display = 'none'
}

    const modificar = async (e) => {
    e.preventDefault();
    btnModificar.disabled = true;
    const url = '/proyecto_final_rivas_is1/controllers/alumnos/index.php';
    const formData = new FormData(formulario);
    formData.append('tipo', 2);
    formData.append('alumno_id', formulario.alumno_id.value);
    const config = {
        method: 'POST',
        body: formData
    };

    try {
        console.log('Enviando datos:', ...formData.entries());
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log('Respuesta recibida:', data);
        const { mensaje, codigo, detalle } = data;
        if (respuesta.ok && codigo === 1) {
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "success",
                title: mensaje,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();
            formulario.reset()
            getAlumnos();
            btnBuscar.parentElement.style.display = ''
            btnGuardar.parentElement.style.display = ''
            btnLimpiar.parentElement.style.display = ''
            btnModificar.parentElement.style.display = 'none'
            btnCancelar.parentElement.style.display = 'none'

        } else {
            console.log('Error:', detalle);
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "error",
                title: 'Error al guardar',
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();
        }
    } catch (error) {
        console.log('Error de conexión:', error);
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "error",
            title: 'Error de conexión',
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire();
    }

    btnModificar.disabled = false;
    btnCancelar.disabled = false;


}


const eliminarAlumno = async (alumno_id) => {
    
    const url = '/proyecto_final_rivas_is1/controllers/alumnos/index.php';
    const formData = new FormData();
    formData.append('alumno_id', alumno_id);
    formData.append('tipo', 3);
    const config = {
        method: 'POST',
        body: formData
    };

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log('Respuesta recibida:', data);
        const { mensaje, codigo } = data;
        if (respuesta.ok && codigo === 1) {
            getClientes();
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "success",
                title: mensaje,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();
            // getclientes();
        } else {
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "error",
                title: 'Error al eliminar',
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();
        }
    } catch (error) {
        console.log('Error de conexión:', error);
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "error",
            title: 'Error de conexión',
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire();
    }
}


    

formulario.addEventListener('submit', guardarAlumno)
btnBuscar.addEventListener('click', getAlumnos)
btnModificar.addEventListener('click', modificar)
btnCancelar.addEventListener('click', cancelar)
