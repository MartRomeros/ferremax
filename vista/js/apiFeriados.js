// Función para formatear la fecha
function formatearFecha(fechaString) {
    const opciones = {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        timeZone: 'America/Santiago'
    };
    return new Date(fechaString).toLocaleDateString('es-CL', opciones);
}

// Función para mostrar los feriados en la tabla
function mostrarFeriados(feriados) {
    const cuerpoTabla = document.getElementById('cuerpoTabla');
    cuerpoTabla.innerHTML = '';

    if (feriados && feriados.length > 0) {
        feriados.forEach(feriado => {
            const fila = document.createElement('tr');

            fila.innerHTML = `
                        <td><strong>${formatearFecha(feriado.date)}</strong></td>
                        <td>${feriado.title}</td>
                        <td><span class="badge-type">${feriado.type}</span></td>
                        <td><span class="badge-inalienable">${feriado.inalienable ? 'Sí' : 'No'}</span></td>
                        <td>${feriado.extra || '-'}</td>
                    `;

            cuerpoTabla.appendChild(fila);
        });
    } else {
        cuerpoTabla.innerHTML = `
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <i class="far fa-calendar-times fa-2x mb-3"></i><br>
                            No se encontraron feriados registrados.
                        </td>
                    </tr>
                `;
    }
}

// Función para cargar los feriados desde la API
async function cargarFeriados() {
    const loader = document.getElementById('loader');
    loader.style.display = 'block';

    try {
        const response = await fetch('https://api.boostr.cl/holidays.json');

        if (!response.ok) {
            throw new Error('Error al obtener los datos de feriados');
        }

        const data = await response.json();
        mostrarFeriados(data.data);

    } catch (error) {
        console.error('Error:', error);
        document.getElementById('cuerpoTabla').innerHTML = `
                    <tr>
                        <td colspan="5" class="text-danger text-center py-4">
                            <i class="fas fa-exclamation-triangle fa-2x mb-3"></i><br>
                            No se pudieron cargar los feriados. Intente nuevamente más tarde.<br>
                            <small>${error.message}</small>
                        </td>
                    </tr>
                `;
    } finally {
        loader.style.display = 'none';
    }
}

// Eventos al cargar la página
document.addEventListener('DOMContentLoaded', function () {
    // Cargar feriados automáticamente al inicio
    cargarFeriados();

    // Asignar evento al botón de feriados
    document.getElementById('btnFeriados').addEventListener('click', cargarFeriados);

    // Botones adicionales
    document.getElementById('btnClima').addEventListener('click', function () {
        alert('Función de clima no implementada aún');
    });

    document.getElementById('btnGeografia').addEventListener('click', function () {
        alert('Función de geografía no implementada aún');
    });
});