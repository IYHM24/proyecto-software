<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Cabin - Fabricantes</title>
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

    <!-- Configs -->
    <script src="./js/validacion.js"></script>
    <script src="./config/MenusConfig.js"></script>
    <script src="./config/optionsConfig.js"></script>
    <script src="./js/AdiminLoadPages.js"></script>
    <script src="./js/modales.js"></script>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->



        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">Cabin</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div id="options" class="navbar-nav ms-auto">
                        <a href="index.php" class="nav-item nav-link active">Inicio</a>
                    </div>
                    <div id="sesionBoton">
                        <div id="MenuUser" class="nav-item dropdown">
                            <a id="Sesion" class="nav-link dropdown-toggle btn btn-primary px-3 d-none d-lg-flex">Iniciar sesion</a>
                            <div id="menu-content" class="dropdown-menu rounded-0 m-0">
                            </div>
                        </div>
                    </div>
                    <?php
                    echo '<script src="./js/process.js"></script>';
                    ?>
                </div>
            </nav>

        </div>
        <!-- Navbar End -->
        <!-- Fabricantes start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3"><strong>Gestion de Categorias</strong></h1>
                    <p>Nuestras categorias actuales</p>
                </div>
                <button class="btn btn-primary mb-5" onclick="modalCategoria();">+</button>
                <?php
                include "./conectors/conexion.php";
                try {
                    if (isset($_GET["nombre"])) {
                        $nombre = $_GET["nombre"];
                        if ($nombre != "") {
                            $sql = "
                                INSERT INTO categorias (nombre)
                                VALUES ('" . $nombre . "'); 
                            ";
                            $myPDO->query($sql);
                            echo "
                            <script>
                            Swal.fire({
                                title: 'categoria a??adida',
                                text: 'Se a??adio satisfactoriamente el registro',
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Aceptar'
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'categorias.php'
                                }
                                })
                            </script>
                            ";
                        } else {
                            echo '
                                <script>
                                Swal.fire({
                                    title: "Ups...!",
                                    text: "Rellena todos los campos",
                                    icon: "error",
                                    confirmButtonColor: "#3085d6",
                                    confirmButtonText: "Aceptar"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "categorias.php"
                                    }
                                })
                                </script>
                                ';
                        }
                    }
                } catch (PDOException $e) {
                    echo "
                                <script>
                                console.log('" . $e . "');
                                Swal.fire({
                                    title: 'Ups...!',
                                    text: 'No se agrego el registro este tiene caba??as asociadas',
                                    icon: 'error',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Aceptar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = 'categorias.php'
                                    }
                                })
                                </script>
                              ";
                }

                ?>
                <table class="table table-hover">
                    <thead class="bg-primary">
                        <tr class="text-light">
                            <th scope="col">id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "./conectors/Tables.php";
                        include "./conectors/eliminarCategoria.php";
                        $sql = Tables("categorias", $myPDO);
                        $rowP = 1;
                        foreach ($myPDO->query($sql) as $row) {
                            echo
                            '
                            <tr>
                                <th scope="row">' . $row["id_categoria"] . '</th>
                                <td>' . $row["nombre"] . '</td>
                                <td><a class="btn" href="./conectors/eliminar.php?id_categoria=' . $row["id_categoria"] . '"><i class="fa fa-solid fa-trash text-primary"></i></a></td>
                            </tr>    
                            ';
                            $rowP++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Fabricantes End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contactanos</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>cll 19# 20-48 interior 8 oficina 501</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+57 350 693 0989</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>dev.andres.gutierrez@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="">Acerda de nosotros</a>
                        <a class="btn btn-link text-white-50" href="">Contactanos</a>
                        <a class="btn btn-link text-white-50" href="">Nuestros servicios</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Galleria de fotos</h5>
                        <div class="row g-2 pt-2">
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-1.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-2.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-3.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-4.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-5.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-6.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Promociones vigentes</h5>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="tu correo">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">enviame!</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Cabin.com</a>, All Right Reserved.

                            <!--/*** This template is free as long as you keep the footer author???s credit link/attribution link/backlink. If you'd like to use the template without the footer author???s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a class="border-bottom">Andres C Gutierrez</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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