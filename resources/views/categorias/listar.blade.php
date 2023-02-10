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
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light text-center">Registrar Nueva Categoría</h1>
                <form action="{{ route('categorias.guardar') }}" method="POST" class="my-4">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la categoría</label>
                        <input name="nombre" type="text" class="form-control" id="nombre"
                               placeholder="Escriba el nombre de la categoría" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Nombre de la categoría</label>
                        <textarea name="descripcion" class="form-control" id="descripcion" rows="3"
                                  placeholder="Escribe una descripción de la categoría" required></textarea>
                    </div>
                    <div class="d-grid mt-3">
                        <button class="btn btn-large btn-primary" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="fw-light text-center">Lista de Categorías</h1>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <th scope="row">{{ $categoria->id }}</th>
                                    <td>{{ $categoria->nombre }}</td>
                                    <td>{{ $categoria->descripcion }}</td>
                                    <td>
                                        <form action="{{ route('categorias.eliminar', $categoria->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('categorias.editar', $categoria->id) }}"
                                               class="btn btn-primary">Editar</a>
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
</html>
