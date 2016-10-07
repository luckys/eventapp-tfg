<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enlace Cambiar Contraseña</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="view-email">
        <h3>Correo para realizar cambio de contraseña</h3>
        <p>
            Para cambiar la contraseña haga click en el siguiente enlace: <br><br>

            <a class="btn btn-info" href="{{ url('auth/password/reset/'.$data['token']) }}" role="button">
                Resetear Contraseña
            </a>
            <br><br>
            Atentamente: <br>
            EventApp
        </p>
    </div>
</div>
</body>
</html>