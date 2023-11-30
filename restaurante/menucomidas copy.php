<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Comida</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Establece un tamaño fijo para las imágenes */
        #opciones-menu img {
            width: 300px; /* Ajusta el tamaño según tus necesidades */
            height: 300px;
            margin-right: 5px; /* Añade un espacio entre la imagen y el texto */
        }

        /* Estilo para el carrusel */
        #carrusel-container {
            overflow: hidden;
        }

        #carrusel {
            display: flex;
            transition: transform 1s ease-in-out; /* Ajusta la duración según tus necesidades */
            white-space: nowrap;
        }

        .opcion-menu {
            display: inline-block;
        }

        #factura {
            display: none;
            margin-top: 20px;
        }
        .opciones-menu {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            }
    </style>
	
</head>
<body>

    <h2>Menú de Comida</h2>

     <div id="opciones-menu">
        <!-- Aquí se mostrarán las opciones del menú -->
        <div id="carrusel-container">
            <div id="carrusel">
                <div class="opcion-menu" data-value="P1" data-nombre="Plato 1" data-precio="$10.00">
                    <img src="img/comida1.jpg" alt="comida1"> 
                    <p>P1 - Plato 1 - $10.00</p>
                </div>
                <div class="opcion-menu" data-value="P2" data-nombre="Plato 2" data-precio="$12.00">
                    <img src="img/comida2.jpg" alt="comida2"> 
                    <p>P2 - Plato 2 - $12.00</p>
                </div>
                <div class="opcion-menu" data-value="P3" data-nombre="Plato 3" data-precio="$17.00">
                    <img src="img/comida3.jpg" alt="comida3"> 
                    <p>P3 - Plato 3 - $17.00</p>
                </div>
                <div class="opcion-menu" data-value="P4" data-nombre="Plato 4" data-precio="$21.00">
                    <img src="img/comida4.jpg" alt="comida4"> 
                    <p>P4 - Plato 4 - $21.00</p>
                </div>
                <div class="opcion-menu" data-value="P5" data-nombre="Plato 5" data-precio="$23.00">
                    <img src="img/comida5.jpg" alt="comida5"> 
                    <p>P5 - Plato 5 - $23.00</p>
                </div>
                <div class="opcion-menu" data-value="P6" data-nombre="Plato 6" data-precio="$13.00">
                    <img src="img/comida6.jpg" alt="comida6"> 
                    <p>P6 - Plato 6 - $13.00</p>
                </div>
                <div class="opcion-menu" data-value="P7" data-nombre="Plato 7" data-precio="$28.00">
                    <img src="img/comida7.jpg" alt="comida7"> 
                    <p>P7 - Plato 7 - $28.00</p>
                </div>
            </div>
        </div>
        <!-- Agrega las opciones para los demás platos -->
    </div>

    <form action="registrarventa.php" method="post">
        <label for="cliente">Cliente:</label>
        <input type="text" name="cliente" required>

        <!-- Selector para elegir un plato -->
        <label for="plato">Seleccione un plato:</label>
        <select name="plato" id="plato" required>
            <!-- Agrega un elemento "img" para cada plato -->
            <option value="P1" data-nombre="Plato 1" data-precio="$10.00">
                <img src="img/comida1.jpg" alt="Plato 1">
                Plato 1 - $10.00
            </option>
			<option value="P2" data-nombre="Plato 2" data-precio="$12.00">
                <img src="img/comida2.jpg" alt="Plato 2">
                Plato 2 - $12.00
            </option>
            <option value="P3" data-nombre="Plato 3" data-precio="$17.00">
                <img src="img/comida3.jpg" alt="Plato 3">
                Plato 3 - $17.00
            </option>
            <option value="P4" data-nombre="Plato 4" data-precio="$21.00">
                <img src="img/comida4.jpg" alt="Plato 4">
                Plato 4 - $21.00
            </option>
            <option value="P5" data-nombre="Plato 5" data-precio="$23.00">
                <img src="img/comida5.jpg" alt="Plato 5">
                Plato 5 - $23.00
            </option>
            <option value="P6" data-nombre="Plato 6" data-precio="$13.00">
                <img src="img/comida6.jpg" alt="Plato 6">
                Plato 6 - $13.00
            </option>
            <option value="P7" data-nombre="Plato 7" data-precio="$28.00">
                <img src="img/comida7.jpg" alt="Plato 7">
                Plato 7 - $28.00
            </option>
            <!-- Agrega las demás opciones -->
        </select>

        <!-- Checkbox para indicar si el cliente es jubilado -->
        <label for="jubilado">¿Es jubilado?</label>
        <input type="checkbox" name="jubilado" id="jubilado">

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" min="1" required>
		<button type="button" id="cerrar-turno">Cerrar Turno</button>


        <button type="submit">Agregar a la Orden</button>
		
    </form>

    <!-- Lista de platos seleccionados -->
    <h3>Orden Actual:</h3>
    <ul id="orden">
        <!-- Aquí se mostrarán las selecciones del cliente -->
    </ul>

    <!-- Detalles de la factura -->
    <div id="factura">
        <h3>Detalles de la Factura</h3>
        <ul id="detalles-factura">
            <!-- Aquí se mostrarán los detalles de la factura -->
        </ul>
        <p>Total a Pagar: $<span id="total-pagar">0.00</span></p>
        <p>Descuento Jubilado (20%): $<span id="descuento">0.00</span></p>
        <p>Total con Descuento: $<span id="total-con-descuento">0.00</span></p>
    </div>

    <!-- Enlace para ir a la factura -->
    <p><a href="#" id="ver-factura">Ver Factura</a></p>

    <!-- Script para manejar la orden del cliente -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const formulario = document.querySelector('form');
            const listaOrden = document.getElementById('orden');
            const opcionesMenu = document.getElementById('opciones-menu');
            const carrusel = document.getElementById('carrusel');
            const factura = document.getElementById('factura');
            const detallesFactura = document.getElementById('detalles-factura');
            const totalPagar = document.getElementById('total-pagar');
            const descuento = document.getElementById('descuento');
            const totalConDescuento = document.getElementById('total-con-descuento');
            const verFactura = document.getElementById('ver-factura');

            formulario.addEventListener('submit', function (event) {
                event.preventDefault();

                // Obtener los valores seleccionados
                const plato = formulario.plato.value;
                const cantidad = formulario.cantidad.value;
                const esJubilado = formulario.jubilado.checked;

                // Agregar a la lista de orden
                const nuevoItem = document.createElement('li');
                nuevoItem.textContent = `Plato: ${plato}, Cantidad: ${cantidad}`;
                listaOrden.appendChild(nuevoItem);

                // Mostrar detalles en la factura
                const detalleFactura = document.createElement('li');
                detalleFactura.textContent = `${plato} x ${cantidad}`;
                detallesFactura.appendChild(detalleFactura);

                // Calcular total a pagar
                const precioPlato = parseFloat(formulario.plato.options[formulario.plato.selectedIndex].getAttribute('data-precio').replace('$', ''));
                const total = parseFloat(totalPagar.textContent) + (precioPlato * cantidad);
                totalPagar.textContent = total.toFixed(2);

                // Calcular descuento jubilado
                const descuentoJubilado = esJubilado ? total * 0.2 : 0;
                descuento.textContent = descuentoJubilado.toFixed(2);

                // Calcular total con descuento
                const totalConDescuentoValor = total - descuentoJubilado;
                totalConDescuento.textContent = totalConDescuentoValor.toFixed(2);

                // Limpiar campos del formulario
                formulario.plato.value = '';
                formulario.cantidad.value = '1';
                formulario.jubilado.checked = false;

                // Mostrar factura
                factura.style.display = 'block';
            });

            // Mostrar las opciones del menú
            opcionesMenu.style.display = 'block';

            // Configurar el movimiento automático del carrusel
            let position = 0;
            setInterval(function () {
                position -= 300; // Ancho de la imagen
                if (position < -(carrusel.scrollWidth - carrusel.clientWidth)) {
                    position = 0;
                }
                carrusel.style.transform = `translateX(${position}px)`;
            }, 3000); // Cambia la duración según tus necesidades

            // Mostrar la factura al hacer clic en el enlace
            verFactura.addEventListener('click', function (event) {
                event.preventDefault();
                factura.style.display = 'block';
            });
        });
		// Botón para cerrar turno y redireccionar
const cerrarTurnoBtn = document.getElementById('cerrar-turno');

cerrarTurnoBtn.addEventListener('click', function () {
    // Obtén detalles de la factura antes de cerrar turno
    const detallesFacturaItems = Array.from(detallesFactura.children);
    const ventasRealizadas = detallesFacturaItems.map(item => item.textContent);

    // Realiza una solicitud al servidor para registrar las ventas y detalles
    // Esto podría hacerse mediante una petición AJAX a un archivo PHP o cualquier backend que estés utilizando
    // Ejemplo (usando fetch y POST):
    fetch('registrarventas.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ ventas: ventasRealizadas }),
    })
    .then(response => response.json())
    .then(data => {
        // Redirecciona a la página de cierre de turno
        window.location.href = `cerrarturno.php?totalVentas=${data.totalVentas}&descuentosAplicados=${data.descuentosAplicados}`;
    })
    .catch(error => {
        console.error('Error al registrar ventas:', error);
        // Manejar el error según tus necesidades
    });
});
    </script>
</body>
</html>


