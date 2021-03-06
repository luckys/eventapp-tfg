<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Entrada a evento</title>
    <link rel="stylesheet" href="{{ asset('themes/admin/css/bootstrap.min.css') }}">

</head>
<body>

<div class="container">
    <div class="row">

        <h1 class="bg-primary text-right">EventApp</h1>
        <h1><u>Entrada al Evento</u></h1>

        <br>
        <strong>Cliente: </strong>{{ session()->get('name') }}
        <br><br>
        <strong>Correo: </strong>{{ session()->get('email') }}
        <br><br>
        <strong># Orden: </strong>{{ $product->id }}
        <br><br>
        <strong>Fecha de Comienzo: </strong>{{ $product->start_date }}
        <br><br>
        <strong>Fecha de Finalizacion: </strong>{{ $product->end_date }}
        <br><br>
        <strong>Dirección: </strong>{{ $product->address }}

    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <thead>
                <tr>
                    <th>Evento</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-info">
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }} €</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>Total: {{ $product->price }} €</strong></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>