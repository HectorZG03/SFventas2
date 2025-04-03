<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #fff, #b3d4fc);
            color: #000;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative; /* Se añade para que el contenedor absoluto se posicione correctamente */
        }
        .navbar {
            background-color: #fff;
        }
        .navbar-brand {
            color: #b3d4fc;
        }
        .card {
            background-color: rgba(179, 212, 252, 0.8);
            border: none;
            margin-top: 2rem; /* Espacio adicional en la parte superior */
        }
        .card-title {
            color: #000;
        }
        .form-control {
            background-color: transparent;
            color: #000;
            border: 2px solid #b3d4fc;
        }
        .input-group-text {
            background-color: #fff;
            border: 1px solid #b3d4fc;
        }
        .btn {
            background-color: #b3d4fc;
            color: #000;
            border: none;
        }
        .btn:hover {
            background-color: #fff;
        }
        /* Estilo para el contenedor de la imagen */
        .image-container {
            position: absolute;
            top: 10px;
            left: 10px;
        }
        .image-container img {
            max-width: 200px; /* Se ajusta el tamaño máximo de la imagen */
            height: auto;
        }
    </style>
</head>
<body>
    <!-- Contenedor para la imagen PNG -->
    <div class="image-container">
        <img src="img/Logo.png" alt="Logotipo">
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Card de inicio de sesión -->
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Iniciar sesión</h3>
                        <form action="iniciar_sesion.php" method="post">
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" id="usuario" class="form-control" name="usuario" placeholder="Usuario">
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" id="password" class="form-control" name="password" placeholder="Contraseña">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="ingresar" class="btn btn-primary btn-block">Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
