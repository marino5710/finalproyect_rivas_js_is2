const btnGuardar = document.getElementById('btnGuardar')
const btnModificar = document.getElementById('btnModificar')
const btnEliminar = document.getElementById('btnEliminar')
const btnBuscar = document.getElementById('btnBuscar')
const btnCancelar = document.getElementById('btnCancelar')
const btnLimpiar = document.getElementById('btnLimpiar')
const tablaMaterias = document.getElementById('tablaMaterias')
const formulario = document.querySelector('form')


btnModificar.parentElement.style.display = 'none'
btnCancelar.parentElement.style.display = 'none'
btnImprimir.parentElement.style.display = 'none'

const getCalificaciones = async (alerta = 'si') => {
    const alumno = formulario.nota_alumno_id.value.trim()
    const materia = formulario.nota_materia_id.value.trim()
    const nota = formulario.nota.value.trim()
    const url = `/proyecto_final_rivas_is1/controllers/notas/index.php?nota_alumno_id=${alumno}&nota_materia_id=${materia}&nota=${nota}`
    const config = {
        method: 'GET'
    }
    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log(data);

        tablaNotas.tBodies[0].innerHTML = ''
        const fragment = document.createDocumentFragment()
        let contador = 1;

        if (respuesta.status == 200) {

            if (alerta == 'si') {


                Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: "success",
                    title: 'Notas Encontradas',
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                }).fire();
            }


            if (data.length > 0) {
                data.forEach(nota => {
                    const tr = document.createElement('tr')
                    const celda1 = document.createElement('td')
                    const celda2 = document.createElement('td')
                    const celda3 = document.createElement('td')
                    const celda4 = document.createElement('td')
                    const celda5 = document.createElement('td')
                    const celda6 = document.createElement('td')
                    const celda7 = document.createElement('td')
                    const buttonModificar = document.createElement('button')
                    const buttonEliminar = document.createElement('button')
                    const buttonImprimir = document.createElement('button')

                    celda1.innerText = contador;
                    celda2.innerText = nota.alumno_nombre1;
                    celda3.innerText = nota.alumno_apellido1;
                    celda4.innerText = nota.materia_nombre;
                    celda5.innerText = nota.nota;

                    buttonModificar.textContent = 'Modificar'
                    buttonModificar.classList.add('btn', 'btn-warning', 'w-100')
                    buttonModificar.addEventListener('click', () => llenardatos(materia))

                    buttonEliminar.textContent = 'Eliminar';
                    buttonEliminar.classList.add('btn', 'btn-danger', 'w-100');
                    buttonEliminar.addEventListener('click', () => eliminarNota(nota.nota_id));

                    buttonImprimir.textContent = 'Imprimir';
                    buttonImprimir.classList.add('btn', 'btn-success', 'w-100');
                    buttonImprimir.addEventListener('click', () => imprimirNota(nota.nota_id));

                    celda6.appendChild(buttonModificar)
                    celda7.appendChild(buttonEliminar)

                    tr.appendChild(celda1)
                    tr.appendChild(celda2)
                    tr.appendChild(celda3)
                    tr.appendChild(celda4)
                    tr.appendChild(celda5)
                    tr.appendChild(celda6)
                    tr.appendChild(celda7)
                    fragment.appendChild(tr);

                    contador++
                });

            } else {
                const tr = document.createElement('tr')
                const td = document.createElement('td')
                td.innerText = 'No hay Notas Disponibles'
                td.colSpan = 5;

                tr.appendChild(td)
                fragment.appendChild(tr)
            }
        } else {
            console.log('hola');
        }

        tablaNotas.tBodies[0].appendChild(fragment)
    } catch (error) {
        console.log(error);
    }
}



const guardarNota= async (e) => {
    e.preventDefault();
    btnGuardar.disabled = true;
    const url = '/proyecto_final_rivas_is1/controllers/notas/index.php'
    const formData = new FormData(formulario)
    formData.append('tipo', 1)
    formData.delete('nota_id')
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
            formulario.reset();
            getNotas(alerta = 'no');
        } else {
            console.log(detalle);
        }

    } catch (error) {
        console.log(error);
    }
    btnGuardar.disabled = false;
}

const llenardatos = (nota) => {
    formulario.nota_id = nota.nota_id
    formulario.nota_alumno_id.value = nota.nota_alumno_id
    formulario.nota_materia_id.value = nota.nota_materia_id
    btnGuardar.parentElement.style.display = 'none'
    btnBuscar.parentElement.style.display = 'none'
    btnLimpiar.parentElement.style.display = 'none'
    btnImprimir.parentElement.style.display = 'none'
    btnModificar.parentElement.style.display = ''
    btnCancelar.parentElement.style.display = ''
}

const cancelar = () => {
    formulario.nota_id.value = ''
    formulario.nota_alumno_id.value = ''
    formulario.nota_materia_id.value = ''
    btnGuardar.parentElement.style.display = ''
    btnBuscar.parentElement.style.display = ''
    btnLimpiar.parentElement.style.display = ''
    btnImprimir.parentElement.style.display = 'none'
    btnModificar.parentElement.style.display = 'none'
    btnCancelar.parentElement.style.display = 'none'
}

const modificar = async (e) => {
    e.preventDefault();
    btnModificar.disabled = true;
    const url = '/proyecto_final_rivas_is1/controllers/notas/index.php';
    const formData = new FormData(formulario);
    formData.append('tipo', 2);
    formData.append('nota_id', formulario.nota_id);
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
            getNotas(alerta = 'no');
            btnBuscar.parentElement.style.display = ''
            btnGuardar.parentElement.style.display = ''
            btnLimpiar.parentElement.style.display = ''
            btnImprimir.parentElement.style.display = 'none'
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


const eliminarNota = async (nota_id) => {

    const url = '/proyecto_final_rivas_is1/controllers/notas/index.php';
    const formData = new FormData();
    formData.append('nota_id', nota_id);
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
            Swal.mixin({
                toast: true,
                position: "top-start",
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
            getNotas(alerta = 'no');
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


formulario.addEventListener('submit', guardarNota)
btnBuscar.addEventListener('click', getNotas)
btnModificar.addEventListener('click', modificar)
btnCancelar.addEventListener('click', cancelar)
btnImprimir.addEventListener('click', imprimir)
