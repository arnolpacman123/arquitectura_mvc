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
            </nav>
        </div>
    </div>
</header>

<main>
    <section class="py-5 container">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light text-center">Editar Producto</h1>
                <form action="{{ route('productos.actualizar', $producto->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="nombre" class="form-label">Nombre del producto</label>
                            <input name="nombre" type="text" class="form-control" id="nombre"
                                   placeholder="Ingrese el nombre del producto" value="{{ old('nombre', $producto->nombre) }}" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input name="precio" type="number" class="form-control" id="precio"
                                   placeholder="Ingrese el precio del producto" value="{{ old('precio', $producto->precio) }}" required>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea name="descripcion" class="form-control" id="descripcion" rows="3"
                                      placeholder="Ingrese la descripción del producto" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="categoria_id" class="form-label">Categoría</label>
                            <select name="categoria_id" class="form-select" id="categoria_id" required>
                                <option>Seleccione una categoría</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" @if($producto->categoria_id == $categoria->id) selected @endif>{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-grid mt-3">
                            <button class="btn btn-large btn-primary" type="submit">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
</body>
</html>
