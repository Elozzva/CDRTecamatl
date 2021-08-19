<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>
                        Busqueda de Autos
                        {{ Form::open(['route' => 'cars', 'method' => 'get', 'class' => 'form-inline pull-right', ]) }}
                            <div class="form-group">
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Auto']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::text('model', null, ['class' => 'form-control', 'placeholder' => 'Modelo']) }}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </div>
                        {{ Form::close()}}
                    </h1>
                </div>
                <div class = "col-md-8">
                    <table class = "table table-hover table-striped">
                        <tbody>
                            @foreach ($cars as $car)

                            <tr onclick="searchProduct()">

                                <td id="CarYear" value="{{ $car['id'] }}">{{ $car->name }}</td>
                                <td value="{{ $car['id'] }}">{{ $car->model }}</td>

                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    {{ $cars->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        function searchProduct() {
            var x = document.getElementById('CarYear').value;
            alert(x);
            window.open("/searchByCar/" + x, "_self");
        }
    </script>

</body>
</html>
