<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Cabin - Nueva Cabaña</title>
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

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- configs -->
    <script src="./js/AdiminLoadPages.js"></script>

</head>


<body style="background-image: url('https://fondosmil.com/fondo/7999.jpg');">
    <div id="Contenedor">
        <form class="container-fluid rounded shadow bg-light w-50 mt-5 mb-5 p-5 wow fadeIn" action="newCabin.php" method="POST">
            <div class="text-center mx-auto mb-2 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3"><strong>Agregar Cabaña</strong></h1>
                <p>Formulario para nueva cabaña</p>
            </div>
            <!-- nombre input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="nombre">nombre</label>
                <input type="nombre" id="nombre" name="nombre" class="form-control" />
            </div>
            <!-- usuario input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="cuartos">Cuartos</label>
                <input type="number" id="cuartos" name="cuartos" class="form-control" />
            </div>

            <!-- Tematica -->
            <div class="form-outline mb-4">
                <label class="form-label" for="tematica">Tematica</label>
                <input type="text" id="tematica" name="tematica" class="form-control" />
            </div>
            <!-- precio -->
            <div class="form-outline mb-4">
                <label class="form-label" for="precio">Precio</label>
                <input type="text" id="precio" name="precio" class="form-control" />
            </div>
            <!-- Descripcion -->
            <div class="form-outline mb-4 col">
                <label class="form-label" for="descripcion">Descripcion</label>
                <textarea class="form-control" name="descripcion" id="descripcion" cols="105" rows="10"></textarea>
            </div>
            <div class="row">
                <!-- fabricante -->
                <div class="form-outline mb-4 col">
                    <label class="form-label" for="select">Fabricante</label>
                    <select id="select" name="select" class="form-control">
                        <option value="" selected>selecciona una opcion</option>
                        <?php
                        include "./conectors/conexion.php";
                        include "./conectors/ProcesarC.php";
                            select1($myPDO);
                        ?>
                    </select>
                </div>
                <!-- categoria -->
                <div class="form-outline mb-4 col">
                    <label class="form-label" for="select2">categoria</label>
                    <select id="select2" name="select2" class="form-control">
                        <option value="" selected>selecciona una opcion</option>
                        <?php
                            select2($myPDO);
                        ?>
                    </select>
                </div>
            </div>
            <!-- Ubicacion -->
            <div class="form-outline mb-4 col">
                <label class="form-label" for="select3">Ubicacion</label>
                <select id="select3" name="select3" class="form-control">
                    <option value="" selected>selecciona una opcion</option>
                    <?php
                        select3($myPDO);
                    ?>
                </select>
            </div>
            <!-- imagen -->
            <div class="form-outline mb-4 col">
                <label class="form-label" for="imagen">URL imagen</label>
                <input class="form-control" name="imagen" id="imagen"/>
            </div>
            <!-- Submit button -->
            <div class="container d-flex justify-content-center">
                <button type="submit" name="btn_agregar" class="btn btn-primary btn-block w-50 mb-4">Agregar cabaña</button>
                <?php
                    Submit($myPDO);
                ?>
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