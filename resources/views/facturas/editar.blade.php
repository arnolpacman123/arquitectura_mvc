<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Producto</title>
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
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light text-center">Editar Factura</h1>
                <form action="{{ route('facturas.actualizar', $factura->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="fecha" class="form-label">Fecha de la factura</label>
                            <input name="fecha" type="text" class="form-control" id="fecha"
                                   placeholder="Ingrese la fecha del producto"
                                   value="{{ old('fecha', $factura->fecha) }}" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="monto" class="form-label">Monto de la factura</label>
                            <input name="monto" type="text" class="form-control" id="monto"
                                   placeholder="Ingrese el monto de la factura"
                                   value="{{ old('monto', $factura->monto) }}" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="nit" class="form-label">
                                NIT de la factura
                            </label>
                            <input name="nit" type="text" class="form-control" id="nit"
                                   placeholder="Ingrese el NIT de la factura" value="{{ old('nit', $factura->nit) }}"
                                   required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="nombre_cliente" class="form-label">
                                Nombre del Cliente
                            </label>
                            <input name="nombre_cliente" type="text" class="form-control" id="nombre_cliente"
                                   placeholder="Ingrese el nombre del cliente"
                                   value="{{ old('nombre_cliente', $factura->nombre_cliente) }}" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <h3 class="fw-light text-center">Detalles de la factura</h3>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($factura->detalles_facturas as $detalle)
                                    <tr>
                                        <td>{{ $detalle->producto->nombre }}</td>
                                        <td>{{ $detalle->cantidad }}</td>
                                        <td>{{ $detalle->precio }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
</body>
</html>
