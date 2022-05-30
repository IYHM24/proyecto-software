<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Cabin - Registro</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/registro.css">



    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>


<body>
    <div id="Contenedor">
        <form class="container-fluid rounded shadow bg-light w-50 mt-5 mb-5 p-5 wow fadeIn" action="registro.php" method="POST">
            <div class="text-center mx-auto mb-2 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3"><strong>Registro</strong></h1>
                <p>Bienvenido a la comunidad</p>
            </div>
            <div class="container text-center mt-5">
                <h4>Datos ingreso</h4>
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="email">Correo</label>
                <input type="email" id="email" name="email" class="form-control" />
            </div>
            <!-- usuario input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="user">Usuario</label>
                <input type="text" id="user" name="user" class="form-control" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="pwd">contraseña</label>
                <input type="password" id="pwd" name="pwd" class="form-control" />
            </div>
            <!-- seccion datos personales -->
            <div class="container text-center mt-5">
                <h4>Datos personales</h4>
            </div>
            <div class="row">
                <!-- Nombre -->
                <div class="form-outline mb-4 col">
                    <label class="form-label" for="name">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control" />
                </div>
                <!-- Apellido -->
                <div class="form-outline mb-4 col">
                    <label class="form-label" for="apellido">Apellidos</label>
                    <input type="text" id="apellido" name="apellido" class="form-control" />
                </div>
            </div>
            <div class="container text-center mt-5">
                <h4>Datos Bancarios</h4>
            </div>
            <div class="row">
                <!-- MEtoodo de pago -->
                <div class="form-outline mb-4 col">
                    <label class="form-label" for="select">Metodos de pago</label>
                    <select id="select" name="select" class="form-control">
                        <option value="" selected>selecciona una opcion</option>
                        <?php
                            include "./conectors/conexion.php";
                            include "./conectors/ProcesarR.php";
                            select1($myPDO);
                        ?>
                    </select>
                </div>
                <!-- Banco -->
                <div class="form-outline mb-4 col">
                    <label class="form-label" for="select2">Banco</label>
                    <select id="select2" name="select2" class="form-control">
                        <option value="" selected>selecciona una opcion</option>
                        <?php
                            select2($myPDO);
                        ?>
                    </select>
                </div>
                <!-- Numero de la cuenta -->
                <div class="form-outline mb-4 col ">
                    <label class="form-label" for="cuenta">N° de cuenta</label>
                    <input type="cuenta" id="cuenta" name="cuenta" class="form-control" />
                </div>
            </div>
            <!-- Submit button -->
            <div class="container d-flex justify-content-center">
                <button type="submit" name="btn_registrar" class="btn btn-primary btn-block w-50 mb-4">Unirme!</button>
                <?php
                    Submit($myPDO);
                ?>
            </div>
            <!-- Register buttons -->
            <div class="text-center">
                <p><strong>O bien registrate con una de tus redes!</strong></p>
                <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                </button>
                <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="fab fa-google"></i>
                </button>
                <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                </button>
                <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="fab fa-github"></i>
                </button>
            </div>
        </form>
        <div class="bg-light">
            <?php
            include "./conectors/conexion.php";
            include "./conectors/ProcesarU.php";
            ?>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>