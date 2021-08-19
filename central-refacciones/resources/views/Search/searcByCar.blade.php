<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Productos</title>
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="/">INICIO</a></li>
            /*<li><a href="/searchByYears">ATRAS</a>*/
            </li>
        </ul>
    </nav>
    <div class="container mydiv">
        <h1>{{ $Carro->shipowner->name }} - {{ $Carro->name }}  <small> {{ $Carro->model }}</small></h1>
        <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Clave</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Equivalencia</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($Productos as $Producto )
                    <tr>
                        <th scope="row">{{ $Producto->key_prod }}</th>
                        <td>{{ $Producto->mark->name }}</td>
                        <td>{{ $Producto->name }}</td>
                        <td>{{ $Producto->description }}</td>
                        <td>{{ $Producto->equivalence }}</td>
                      </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                No hay coincidencias
                            </td>
                        </tr>
                    @endforelse

                </tbody>
              </table>
        </div>
    </div>
</body>
</html>

