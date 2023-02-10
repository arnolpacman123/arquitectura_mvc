<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
</head>
<body>

<header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container py-3">
            <nav class="nav nav-pills flex-column flex-sm-row">
                <a class="flex-sm-fill text-sm-center nav-link text-white {{ request()->is('categorias') ? 'active' : '' }}"
                   href="{{ route('categorias.listar') }}">Categorías</a>
                <a class="flex-sm-fill text-sm-center nav-link text-white {{ request()->is('productos') ? 'active' : '' }}"
                   href="{{ route('productos.listar') }}">Productos</a>
                <a class="flex-sm-fill text-sm-center nav-link text-white {{ request()->is('facturas') ? 'active' : '' }}"
                   href="{{ route('facturas.listar') }}">Facturas</a>
            </nav>
        </div>
    </div>
</header>

<main>
    <section class="py-5 container">
        <div class="row">
            <div class="col-lg-8 col-md-8 mx-auto">
                <h1 class="fw-light text-center">Registrar Nueva Factura</h1>
                <form action="{{ route('facturas.guardar') }}" method="POST" class="my-4">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="fecha" class="form-label">Fecha de la factura</label>
                            <input name="fecha" type="text" class="form-control" id="fecha"
                                   placeholder="Ingrese la fecha de la factura" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="nit" class="form-label">Nit de la factura</label>
                            <input name="nit" type="text" class="form-control" id="nit"
                                   placeholder="Ingrese el nit de la factura" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="nombre_cliente" class="form-label">Nombre del cliente</label>
                            <input name="nombre_cliente" type="text" class="form-control" id="nombre_cliente"
                                   placeholder="Ingrese el nombre del cliente" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="monto" class="form-label">Monto total (se genera automáticamente)</label>
                            <input name="monto" type="number" class="form-control" id="monto"
                                   placeholder="El monto se generará de manera automática" readonly>
                        </div>
                        <div class="col-12">
                            <h3 class="fw-light text-center">Nuevo Detalle</h3>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="producto" class="form-label">Producto</label>
                            <select class="form-select" name="producto" id="producto">
                                <option selected>Seleccione un producto</option>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id }}">{{ $producto->nombre }}
                                        - {{ $producto->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="cantidad" class="form-label">Cantidad del producto</label>
                            <input name="cantidad" type="number" class="form-control" id="cantidad"
                                   placeholder="Ingrese la cantidad del producto" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="precio" class="form-label">Precio vendido</label>
                            <input name="precio" type="number" class="form-control" id="precio"
                                   placeholder="Ingrese el precio vendido" required>
                        </div>

                    </div>
                    <div id="nuevosDetalles">
                    </div>
                    <div class="d-grid mt-3">
                        <button id="agregarProducto" type="submit" class="btn btn-success">Agregar Producto</button>
                    </div>
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-primary">Guardar la factura con sus detalles</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="fw-light text-center">Lista de Facturas</h1>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Nit</th>
                                <th scope="col">Nombre del cliente</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($facturas as $factura)
                                <tr>
                                    <td>{{ $factura->fecha }}</td>
                                    <td>{{ $factura->nit }}</td>
                                    <td>{{ $factura->nombre_cliente }}</td>
                                    <td>{{ $factura->monto }}</td>
                                    <td>
                                        <a href="{{ route('facturas.editar', $factura->id) }}"
                                           class="btn btn-warning">Editar</a>
                                        <a href="{{ route('facturas.eliminar', $factura->id) }}"
                                           class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
</main>

<script>
    let id = 0;
    let divNuevosDetalles = document.getElementById('nuevosDetalles');
    let divRow = document.createElement('div');
    divRow.classList.add('row');
    document.getElementById('agregarProducto').addEventListener('click', function (e) {
        e.preventDefault();
        id++;
        if (id === 1) {
            let h1 = document.createElement('h1');
            h1.classList.add('fw-light');
            h1.classList.add('text-center');
            h1.innerHTML = 'Detalles de la factura';
            divNuevosDetalles.appendChild(h1);
        }
        // agregar el nuevo detalle al div de detalles con los inputs:
        // producto, precio, cantidad
        let divColProducto = document.createElement('div');
        divColProducto.classList.add('col-4');
        divColProducto.classList.add('mb-3');
        let labelProducto = document.createElement('label');
        labelProducto.classList.add('form-label');
        labelProducto.innerHTML = 'ID del producto';
        let inputProducto = document.createElement('input');
        inputProducto.classList.add('form-control');
        inputProducto.setAttribute('type', 'text');
        inputProducto.setAttribute('name', 'productos_ids[]');
        inputProducto.setAttribute('id', document.getElementById('producto').options[document.getElementById('producto').selectedIndex].value);
        inputProducto.setAttribute('value', document.getElementById('producto').options[document.getElementById('producto').selectedIndex].value);
        divColProducto.appendChild(labelProducto);
        divColProducto.appendChild(inputProducto);
        divRow.appendChild(divColProducto);

        let divColPrecio = document.createElement('div');
        divColPrecio.classList.add('col-4');
        divColPrecio.classList.add('mb-3');
        let labelPrecio = document.createElement('label');
        labelPrecio.classList.add('form-label');
        labelPrecio.innerHTML = 'Precio';
        let inputPrecio = document.createElement('input');
        inputPrecio.classList.add('form-control');
        inputPrecio.setAttribute('type', 'number');
        inputPrecio.setAttribute('name', 'precios[]');
        inputPrecio.setAttribute('id', document.getElementById('precio').value);
        inputPrecio.setAttribute('value', document.getElementById('precio').value);
        divColPrecio.appendChild(labelPrecio);
        divColPrecio.appendChild(inputPrecio);
        divRow.appendChild(divColPrecio);

        let divColCantidad = document.createElement('div');
        divColCantidad.classList.add('col-4');
        divColCantidad.classList.add('mb-3');
        let labelCantidad = document.createElement('label');
        labelCantidad.classList.add('form-label');
        labelCantidad.innerHTML = 'Cantidad';
        let inputCantidad = document.createElement('input');
        inputCantidad.classList.add('form-control');
        inputCantidad.setAttribute('type', 'number');
        inputCantidad.setAttribute('name', 'cantidades[]');
        inputCantidad.setAttribute('id', document.getElementById('cantidad').value);
        inputCantidad.setAttribute('value', document.getElementById('cantidad').value);
        divColCantidad.appendChild(labelCantidad);
        divColCantidad.appendChild(inputCantidad);
        divRow.appendChild(divColCantidad);

        let divider = document.createElement('hr');
        divRow.appendChild(divider);
        divNuevosDetalles.appendChild(divRow);

        // actualizar el monto total de la factura
        let monto = document.getElementById('monto');
        if (monto.value === '') {
            monto.value = parseInt(document.getElementById('precio').value) * parseInt(document.getElementById('cantidad').value);
        } else {
            monto.value = parseInt(monto.value) + parseInt(document.getElementById('precio').value) * parseInt(document.getElementById('cantidad').value);
        }
    });
</script>
</body>
</html>
