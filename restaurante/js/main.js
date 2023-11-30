document.addEventListener('DOMContentLoaded', function () {
    // Obtener elementos del formulario
    const cantidadInput = document.getElementById('cantidadDinero');
    const denominacionInputs = document.querySelectorAll('[id^="denom"]'); // Seleccionar todos los elementos que tienen un ID que comienza con 'denom'
    const sumaDenominacionesOutput = document.getElementById('sumaDenominaciones');

    // Agregar evento de cambio a cada casilla de denominación
    denominacionInputs.forEach(function (input) {
        input.addEventListener('input', actualizarSuma);
    });

    // Función para actualizar la suma de denominaciones
    function actualizarSuma() {
        // Calcular la suma de las denominaciones
        let sumaDenominaciones = Array.from(denominacionInputs).reduce(function (total, input) {
            return total + (parseInt(input.value) || 0);
        }, 0);

        // Obtener la cantidad ingresada
        const cantidadIngresada = parseInt(cantidadInput.value) || 0;

        // Actualizar el valor en el cuadro de suma de denominaciones
        sumaDenominacionesOutput.textContent = sumaDenominaciones.toFixed(2);

        // Validar si la suma de denominaciones es mayor que la cantidad ingresada
        if (sumaDenominaciones > cantidadIngresada) {
            // Mostrar un mensaje de error
            sumaDenominacionesOutput.style.color = 'red';
            sumaDenominacionesOutput.textContent = '¡Error! La suma de denominaciones excede la cantidad ingresada.';
        } else {
            // Restaurar el color del texto
            sumaDenominacionesOutput.style.color = 'black';
        }
    }

    // Llamar a la función al cargar la página para mostrar la suma inicial
    actualizarSuma();
});
