<?php
$nombre = "";
$apellido = "";
$usuario = "";
$email = "";
$pwd = "";
$Exit = 0;
if (isset($_POST['btn_ingresar'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    if ($email != "" && $pwd != "") {
        $sql = "
            SELECT 
            * 
            FROM 
            cliente c
            WHERE
            c.correo = '" . $email . "';";

        try {
            foreach ($myPDO->query($sql) as $row) {
                $id_cliente = $row['id_cliente'];
                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
                $usuario = $row['usuario'];
                $correo = $row['correo'];
                $password = $row['contrasena'];
                $Exit++;
            }
            if ($Exit == 0) {
                echo "
                    <script>
                    Swal.fire({
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El usuario no existe',
                      })
                    </script>
                    ";
            } else {
                if ($pwd == $password) {
                    $Exit = 0;
                    $sql = "
                    SELECT 
                        * 
                    FROM 
                        administrador a
                    INNER JOIN 
                        cliente c
                    ON 
                        c.usuario = a.usuario
                    WHERE 
                        c.correo = '".$correo."';
                    ";
                    foreach ($myPDO->query($sql) as $row) {
                        $Exit++;
                    }
                    if ($Exit == 0) {
                        echo "
                    <script>
                        const user = {
                            id_cliente:'".$id_cliente."',
                            nombre:'" . $nombre . "',
                            apellido:'" . $apellido . "',
                            usuario:'" . $usuario . "',
                            correo:'" . $correo . "',
                            admin: false 
                        }
                        localStorage.setItem('user',JSON.stringify(user));
                        window.location.href = 'index.php';
                    </script>";
                    } else {
                        echo "
                    <script>
                        const user = {
                            id_cliente:'".$id_cliente."',
                            nombre:'" . $nombre . "',
                            apellido:'" . $apellido . "',
                            usuario:'" . $usuario . "',
                            correo:'" . $correo . "',
                            admin: true 
                        }
                        localStorage.setItem('user',JSON.stringify(user));
                        window.location.href = 'index.php';
                    </script>";
                    }
                } else {
                    echo "
                    <script>
                    Swal.fire({
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Contraseña incorrecta',
                      })
                    </script>
                    ";
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        echo "<script>
            Swal.fire({
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                icon: 'error',
                title: 'Oops...',
                text: 'Debes rellenar todos los campos',
              })
            </script>";
    }
}
