<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Cabin - Reservar</title>
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
    <script src="./js/reservasLoad.js"></script>

</head>


<body style="background-image: url('https://wallup.net/wp-content/uploads/2019/09/07/349698-jeep-cherokee-eu-version-2014-car-suv-4x4-off-road-4000x300.jpg');">
    <div class="bg-light">
        <?php
        include "./conectors/conexion.php";
        include "./conectors/ProcesarU.php";
        ?>
    </div>
    </div>
    <div id="Contenedor">
        <form class="container-fluid rounded shadow bg-light w-50 mt-5 mb-5 p-5 wow fadeIn" action="newReserva.php" method="POST">
            <div class="text-center mx-auto mb-2 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3"><strong>Reservar</strong></h1>
                <p>Rserva ahora tu cabaña</p>
            </div>
            <?php
            if (isset($_GET["id_cliente"])) {
                $id_cliente = $_GET["id_cliente"];
                echo '
                    <div class="form-outline visually-hidden">
                        <label class="form-label" for="id_cliente">id usuario elegido</label>
                        <input type="text" id="id_cliente" name="id_cliente" value="' . $id_cliente . '" class="form-control"/>
                    </div>                    
                    <label class="form-label" for="fecha_ini">Fecha de inicio elegida</label>
                    <input type="Date" id="fecha_ini" name="fecha_ini" value="' . $fecha_ini . '" class="form-control"/>
                    <label class="form-label" for="fecha_fin">Fecha final elegida</label>
                    <input type="Date" id="fecha_fin" name="fecha_fin" value="' . $fecha_fin . '" class="form-control"/>
                ';
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
                        echo '<option value="' . $id_informacion . '">' . $metodo_pago . ' con el banco ' . $row['banco'] . '</option>';
                    }
                    echo '
                    </select>
                    </div>';
                    try {
                        include "./conectors/conexion.php";
                        $sql = "
                             SELECT * FROM cabin;
                         ";
                        echo ' <!-- cabañas -->
                     <div class="form-outline mb-4 col mb-3">
                         <label class="form-label" for="select2">cabaña</label>
                         <select id="select3" name="select3" class="form-control">
                             <option value="" selected>selecciona una opcion de pago</option>
                         ';
                        foreach ($myPDO->query($sql) as $row) {
                            $id_cabin = $row['id_cabin'];
                            echo '<option value="' .  $id_cabin . '">' . $row['nombre'] . ' en la ubicacion ' . $row['id_ubicacion'] . '</option>';
                        }
                        echo "</select>";
                        echo '<!-- fecha actual input -->
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
                if (isset($_POST["btn_aceptar"])) {
                    $id_cliente = $_POST["id_cliente"];
                    $fecha_ini = $_POST["fecha_ini"];
                    $fecha_fin = $_POST["fecha_fin"];
                    $id_info = $_POST["select2"];
                    $id_cabin = $_POST["select3"];
                    $fecha_actual = $_POST["fecha_actual"];
                    $sql = "
                        INSERT INTO reservas(fecha_ini,fecha_fin,id_cliente,id_cabin,id_informacion)
                        VALUES ('" . $fecha_ini . "','" . $fecha_fin . "'," . $id_cliente . "," . $id_cabin . "," . $id_info . ");
                    ";                    
                    try {
                        $myPDO->query($sql);
                        $sql2 = "
                            SELECT * FROM reservas
                            WHERE fecha_ini = '".$fecha_ini."'
                            AND fecha_fin = '".$fecha_fin."'
                            AND id_cliente = ".$id_cliente."
                            AND id_cabin = ".$id_cabin."
                            AND id_informacion = ".$id_info.";
                        ";
                        try {
                            foreach ( $myPDO->query($sql2) as $row) {
                                $id_reserva = $row["id_reserva"];
                            }
                            $sql3 = "
                                INSERT INTO factura(fecha_factura,estado_pago,id_reserva)
                                VALUES ('".$fecha_actual."',false,".$id_reserva.");
                            ";
                            $myPDO->query($sql3);
                            echo "
                            <script>
                                Swal.fire({
                                    title: 'Reserva Realizada',
                                    text: 'Se ha generado la reserva con su respectiva factura',
                                    icon: 'success',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Aceptar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                            window.location.href = 'admin.php'
                                    }
                                })
                                    </script>
                            ";
                        } catch (PDOException $e) {
                            echo"<script>alert('".$e."')</script>";
                            echo '
                            <script>
                            Swal.fire({
                                title: "Ups...!",
                                text: "No se puede realizar la reserva",
                                icon: "error",
                                confirmButtonColor: "#3085d6",
                                confirmButtonText: "Aceptar"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "newReserva.php"
                                }
                            })
                            </script>
                        ';
                        }
                       /*   */
                    } catch (PDOException $e) {
                        echo"<script>alert('".$e."')</script>";
                        echo '
                        <script>
                        Swal.fire({
                            title: "Ups...!",
                            text: "No se puede realizar la reserva",
                            icon: "error",
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "Aceptar"
                          }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "newReserva.php"
                            }
                          })
                        </script>
                        ';
                    }
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