const valoresHerramienta = document.querySelectorAll('.valor')


function mostrarValor() {
    const valor = document.querySelector('#valor').value
    switch (valor) {
        case 'dolar':
            mostrarValorConvertido('dolar')
            break;
        case 'euros':
            mostrarValorConvertido('euro')
            break;

        default:
            break;
    }
}

function mostrarValorConvertido(moneda) {
    fetch('https://mindicador.cl/api')
        .then(function (response) {
            return response.json();
        })
        .then(function (valor) {
            console.log(valor);
            const tasaCambio = valor[moneda].valor;

            document.querySelectorAll('.details').forEach((detail) => {
                // Eliminar cualquier <li> previo con la clase "precio-convertido" DENTRO de este detail
                const precioAnterior = detail.querySelector('.precio-convertido');
                if (precioAnterior) {
                    precioAnterior.remove();
                }

                // Obtener valor original desde el <li class="valor">
                const liValor = detail.querySelector('.valor');
                if (liValor) {
                    const texto = liValor.textContent;
                    const numero = parseFloat(texto.replace(/[^\d.]/g, ''));
                    const convertido = (numero / tasaCambio).toFixed(2);

                    // Crear nuevo <li> para mostrar valor convertido
                    const nuevoLi = document.createElement('li');
                    nuevoLi.className = 'precio-convertido';
                    nuevoLi.textContent = `Precio en ${moneda.toUpperCase()}: ${convertido}`;
                    detail.appendChild(nuevoLi);
                }
            });
        })
        .catch(function (error) {
            console.log('Request failed', error);
        });
}
