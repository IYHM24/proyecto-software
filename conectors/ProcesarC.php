<?php
    function select1($myPDO){
        try {
            $sql = "
                SELECT * FROM fabricante
            ";
            foreach ($myPDO->query($sql) as $row) {
                $nombre = $row['nombre'];
                $id_fabricante = $row['id_fabricante'];
                echo "<option value='" . $id_fabricante . "'>" . $nombre . "</option>";
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

    function select2($myPDO){
        try {
            $sql = "
                SELECT * FROM categorias
            ";
            foreach ($myPDO->query($sql) as $row) {
                $nombre = $row['nombre'];
                $id_categoria = $row['id_categoria'];
                echo "<option value='" . $id_categoria . "'>" . $nombre . "</option>";
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