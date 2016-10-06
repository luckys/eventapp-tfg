<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compra de Evento</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="view-email">
        <h3>Estimado usuario {{ $user['name'] }}</h3>
        <p>
            Gracias por haber realizado la compra de la entrada al evento.
            Podrá descargar su entrada haciendo click en el enlace siguiente.<br><br>

            <a class="btn btn-info" href="{{ url($user['url']) }}" role="button">
                Descargar Entrada
            </a>
            <br><br>
            Atentamente: <br>
            EventApp
        </p>
    </div>
</div>
</body>
</html>