<?php
    function select1($myPDO){
        try {
            $sql = "
                SELECT * FROM cliente;
            ";
            foreach ($myPDO->query($sql) as $row) {
                $nombre = $row['nombre'];
                $id_cliente = $row['id_cliente'];
                echo "<option value='" . $id_cliente . "'>" . $nombre ."</option>";
            }
        } catch (PDOException $e) {
            echo'<script src=>console.log('.$e.')</script>';
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

    function select2($myPDO,$id_cliente){
        try {
            $sql = "
            SELECT c.id_cliente, mtp.id_metp, c.nombre, mtp.nombre AS Metodo_pago, b.nombre AS banco
            FROM reservas r
            INNER JOIN informacion_pago inf
            ON inf.id_informacion = r.id_informacion
            INNER JOIN metodo_de_pago mtp
            ON mtp.id_metp = inf.id_metp
            INNER JOIN banco b
            ON inf.id_banco = b.id_banco
            INNER JOIN cliente c
            ON c.id_cliente = inf.id_cliente
            WHERE c.id_cliente =".$id_cliente.";
            ";
            foreach ($myPDO->query($sql) as $row) {
                $nombre = $row['nombre'];
                $id_metp = $row['id_metp'];
                echo "<option value='" . $id_metp . "'>" . $nombre . "</option>";
            }
        } catch (PDOException $e) {
            echo'<script src=>console.log('.$e.')</script>';
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

    function select3($myPDO){
        try {
            $sql = "
                SELECT * FROM ubicacion
            ";
            foreach ($myPDO->query($sql) as $row) {
                $nombre = $row['nombre'];
                $cuidad = $row['cuidad'];
                $direccion = $row['direccion'];
                $id_ubicacion = $row['id_ubicacion'];
                echo "<option value='" . $id_ubicacion . "'>" . $nombre ." ".$cuidad." ".$direccion. "</option>";
            }
        } catch (PDOException $e) {
            echo'<script src=>console.log('.$e.')</script>';
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
    function Submit($myPDO){
        if(isset($_POST["btn_agregar"])){
           $nombre = $_POST["nombre"];
           $cuartos =  $_POST["cuartos"];
           $Tematica =  $_POST["tematica"];
           $Descripcion = $_POST["descripcion"];
           $Precio = $_POST["precio"];
           $id_fabricante =  $_POST["select"];
           $id_categoria =  $_POST["select2"];
           $id_ubicacion =  $_POST["select3"];
           $imagen = $_POST["imagen"];
           try {
            if (
                $nombre != '' &&
                $cuartos != '' &&
                $Tematica != '' &&
                $Descripcion != '' &&
                $Precio != '' &&
                $id_fabricante != '' &&
                $id_categoria != '' &&
                $id_ubicacion != '' &&
                $imagen != ''
            ) {
                $sql="
                    INSERT INTO 
                        cabin(nombre, cuartos, tematica, descripcion, id_fabricante, id_categoria, precio, id_ubicacion, url_img)
                    VALUES
                        ('".$nombre."',".$cuartos.",'".$Tematica."','".$Descripcion."',".$id_fabricante.",".$id_categoria.",".$Precio.",".$id_ubicacion.",'".$imagen."');
                ";
                $myPDO->query($sql);
                 echo "
                <script>
                Swal.fire({
                    title: 'Cabaña Agregada',
                    text: 'se agrego la cabaña',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'cabin.php'
                    }
                  })
                </script>
                ";
            } else {
                echo "
                <script>
                Swal.fire({
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Debes rellenar todos los campos',
                  })
                </script>
                ";
            }
        } catch (PDOException $e) {
            echo "<script>
                        
                            Swal.fire(
                                'Regist',
                                'No conectado a la base de datos',
                                'error'
                            )
                            </script>";
            echo $e->getMessage();
        }
    }
    }
?>