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

    <!-- Libs -->
    <script src="./js/onChange.js"></script>

    <!-- configs -->
    <script src="./js/AdiminLoadPages.js"></script>

</head>


<body style="background-image: url('https://wallup.net/wp-content/uploads/2019/09/07/349698-jeep-cherokee-eu-version-2014-car-suv-4x4-off-road-4000x300.jpg');">
    <div id="Contenedor">
        <form class="container-fluid rounded shadow bg-light w-50 mt-5 mb-5 p-5 wow fadeIn" action="newReserva.php" method="GET">
            <div class="text-center mx-auto mb-2 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3"><strong>Agregar Reserva</strong></h1>
                <p>Formulario para nueva Reserva</p>
            </div>
            <!-- fecha inicial input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="fecha_ini">Fecha de inicio</label>
                <input type="Date" id="fecha_ini" name="fecha_ini" class="form-control" />
            </div>
            <!-- fecha final input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="fecha_fin">Fecha final</label>
                <input type="Date" id="fecha_fin" name="fecha_fin" class="form-control" />
            </div>
            <!-- cliente-->
            <div class="form-outline mb-4 col">
                <label class="form-label" for="select">Cliente</label>
                <select id="select" name="select" class="form-control">
                    <option value="" selected>selecciona un cliente</option>
                    <?php
                    include "./conectors/conexion.php";
                    include "./conectors/ProcesarRE.php";
                    select1($myPDO);
                    ?>
                </select>
            </div>
    </div>
    <!-- Submit button -->
    <div class="container d-flex justify-content-center">
        <button type="submit" name="btn_agregar" class="btn btn-primary btn-block w-50 mb-4">Selecionar usuario</button>
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

    <div id="Contenedor">
        <form class="container-fluid rounded shadow bg-light w-50 mt-5 mb-5 p-5 wow fadeIn" action="newReserva.php" method="GET">
            <div class="text-center mx-auto mb-2 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3"><strong>Metodo de pago</strong></h1>
            </div>
            <?php
            if (isset($_GET["btn_agregar"])) {
                $id_cliente = $_GET["select"];
                $fecha_ini = $_GET["fecha_ini"];
                $fecha_fin = $_GET["fecha_fin"];
                echo"
                    <script>localStorage.setItem('id_cliente','".$id_cliente."')</script>
                    <script>localStorage.setItem('fecha_ini','".$fecha_ini."')</script>
                    <script>localStorage.setItem('id_cliente','".$$fecha_fin."')</script>
                ";
                $sql = " 
                        SELECT inf.id_informacion, c.nombre, mtp.nombre AS Metodo_pago, b.nombre AS banco
                        FROM reservas r
                        INNER JOIN informacion_pago inf
                        ON inf.id_informacion = r.id_informacion
                        INNER JOIN metodo_de_pago mtp
                        ON mtp.id_metp = inf.id_metp
                        INNER JOIN banco b
                        ON inf.id_banco = b.id_banco
                        INNER JOIN cliente c
                        ON c.id_cliente = inf.id_cliente
                        WHERE c.id_cliente =" . $id_cliente . ";
                    ";
                try {
                    echo '
                    <!-- informacion de pago-->
                    <div class="form-outline mb-4 col">
                        <label class="form-label" for="select2">Opcion de pago</label>
                    
                        <select id="select2" name="select2" class="form-control">
                            <option value="" selected>selecciona una opcion de pago</option>
                            ';
                    foreach ($myPDO->query($sql) as $row) {
                        $id_informacion = $row['id_informacion'];
                        $metodo_pago =  $row['metodo_pago'];
                        echo '<option value="' . $id_informacion. '">' . $metodo_pago . ' con el banco ' . $row['banco'] . '</option>';
                    }
                    echo '
                    </select>
                    </div>';
                    try {
                        include "./conectors/conexion.php";
                         $sql = "
                             SELECT * FROM cabin;
                         ";
                     echo' <!-- cabañas -->
                     <div class="form-outline mb-4 col mb-3">
                         <label class="form-label" for="select2">cabaña</label>
                         <select id="select3" name="select3" class="form-control">
                             <option value="" selected>selecciona una opcion de pago</option>
                         ';
                         foreach ($myPDO->query($sql) as $row) {
                             $id_cabin = $row['id_cabin'];
                             echo '<option value="' .  $id_cabin . '">' . $row['nombre'] . ' en la ubicacion ' . $row['id_ubicacion'] . '</option>';
                         }
                         echo"</select>";
                         echo'<!-- fecha actual input -->
                         <div class="form-outline mt-3">
                             <label class="form-label" for="fecha_actual">Fecha actual</label>
                             <input type="Date" id="fecha_actual" name="fecha_actual" class="form-control" />
                         </div>';
                     } catch (PDOException $e) {
                         echo $e;
                     }
                } catch (PDOException $e) {
                    echo '<script src=>console.log(' . $e . ')</script>';
                    echo "
                                <script>
                                Swal.fire({
                                    showClass: {
                                        popup: 'animate__animated animate__fadeInDown'
                                    },
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: '" . $e . "',
                                })
                                </script>
                            ";
                }
            }
            ?>
            <!-- Submit button -->
            <div class="container d-flex justify-content-center mt-3">
                <button type="submit" name="btn_aceptar" class="btn btn-primary btn-block w-50 mb-4">aceptar</button>
                <?php
                    if (isset($_GET["btn_aceptar"])) {
                        echo $id_cliente." ".$fecha_ini." ".$fecha_fin;
                    }
                ?>
            </div>
        </form>
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