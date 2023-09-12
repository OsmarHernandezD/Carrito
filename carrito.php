<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        #carrito {
            border: 1px solid #ccc;
            padding: 10px;
            width: 300px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h1>Carrito de Compras</h1>
    
    <div id="carrito">
        <h2>Mi Carrito</h2>
        <ul id="lista-carrito"></ul>
        <p>Total: <span id="total">0</span> productos</p>
        <button onclick="vaciarCarrito()">Vaciar Carrito</button>
    </div>

    <h2>Productos</h2>
    <ul id="lista-productos">
        <li>Manzana <button onclick="agregarProducto('Manzana')">Agregar</button></li>
        <li>Pera <button onclick="agregarProducto('Pera')">Agregar</button></li>
        <li>Piña <button onclick="agregarProducto('Piña')">Agregar</button></li>
        <li>Durazno <button onclick="agregarProducto('Durazno')">Agregar</button></li>
    </ul>

    <script>
        const carrito = document.getElementById('lista-carrito');
        const totalSpan = document.getElementById('total');
        const productosEnCarrito = {};

        function agregarProducto(nombre) {
            if (productosEnCarrito[nombre]) {
                productosEnCarrito[nombre]++;
            } else {
                productosEnCarrito[nombre] = 1;
            }
            actualizarCarrito();
        }

        function vaciarCarrito() {
            for (const producto in productosEnCarrito) {
                delete productosEnCarrito[producto];
            }
            actualizarCarrito();
        }

        function actualizarCarrito() {
            const listaCarrito = document.getElementById('lista-carrito');
            listaCarrito.innerHTML = '';
            for (const producto in productosEnCarrito) {
                const li = document.createElement('li');
                li.textContent = `${producto} ${productosEnCarrito[producto]}`;
                const botonEliminar = document.createElement('button');
                botonEliminar.textContent = 'Eliminar';
                botonEliminar.onclick = function() {
                    productosEnCarrito[producto]--;
                    if (productosEnCarrito[producto] === 0) {
                        delete productosEnCarrito[producto];
                    }
                    actualizarCarrito();
                };
                li.appendChild(botonEliminar);
                listaCarrito.appendChild(li);
            }
            actualizarTotal();
        }

        function actualizarTotal() {
            let totalProductos = 0;
            for (const producto in productosEnCarrito) {
                totalProductos += productosEnCarrito[producto];
            }
            totalSpan.textContent = totalProductos;
        }
    </script>
</body>
</html>