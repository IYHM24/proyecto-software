<?php
function select1($myPDO)
{
    $sql = "
    SELECT 
    * 
    FROM 
    metodo_de_pago m;";

    try {
        foreach ($myPDO->query($sql) as $row) {
            $nombre = $row['nombre'];
            $id_metp = $row['id_metp'];
            echo "<option value='" . $id_metp . "'>" . $nombre . "</option>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function select2($myPDO)
{
    $sql = "
    SELECT 
    * 
    FROM 
    banco b;";

    try {
        foreach ($myPDO->query($sql) as $row) {
            $banco = $row['nombre'];
            $id_banco = $row['id_banco'];
            echo "<option value='" . $id_banco . "'>" . $banco . "</option>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function Submit($myPDO)
{
    try {
        if (isset($_POST['btn_registrar'])) {
            $email = $_POST['email'];
            $user = $_POST['user'];
            $contrasena = $_POST['pwd'];
            $Nombre = $_POST['name'];
            $Apellido = $_POST['apellido'];
            $Metodo_pago = $_POST['select'];
            $NCuenta = $_POST['cuenta'];
            $Banco = $_POST['select2'];

            if (
                $email != '' &&
                $user != '' &&
                $contrasena != '' &&
                $Nombre != '' &&
                $Apellido != '' &&
                $Metodo_pago != '' &&
                $NCuenta != '' &&
                $Banco != ''
            ) {
                $Exit = 0;
                $sql = "
                        SELECT 
                        id_cliente 
                        FROM
                        cliente
                        WHERE correo = '" . $email . "';
            ";
                foreach ($myPDO->query($sql) as $row) {
                    $Exit++;
                }
                if ($Exit == 0) {
                    $Exit = 0;
                    $sql = "
                        SELECT 
                        id_cliente 
                        FROM
                        cliente
                        WHERE usuario = '" . $user . "';
            ";
                    foreach ($myPDO->query($sql) as $row) {
                        $Exit++;
                    }
                    if ($Exit == 0) {
                        $sql = "
                        INSERT INTO
                        cliente(nombre, apellido, correo, usuario, contrasena) 
                        VALUES ('" . $Nombre . "', '" . $Apellido . "','" . $email . "','" . $user . "','" . $contrasena . "'); 
               
               ";

                        $myPDO->query($sql);
                        $sql = "
                           SELECT 
                           id_cliente 
                           FROM
                           cliente
                           WHERE correo = '" . $email . "';
               ";
                        foreach ($myPDO->query($sql) as $row) {
                            $id_cliente = $row['id_cliente'];
                        }
                        $sql = "
               INSERT INTO
               informacion_pago (id_cliente, id_metp, id_banco, ncuenta) 
               VALUES (" . $id_cliente . ", " . $Metodo_pago . "," . $Banco . ",'" . $NCuenta . "'); 
                   ";
                        $myPDO->query($sql);
                        echo "
                       <script>
                       Swal.fire({
                           title: 'Registro completado',
                           text: 'Bienvenido',
                           icon: 'success',
                           confirmButtonColor: '#3085d6',
                           confirmButtonText: 'Aceptar'
                         }).then((result) => {
                           if (result.isConfirmed) {
                               window.location.href = 'index.php'
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
                        text: 'El usuario ya esta registrado!',
                      })
                    </script>
                    ";
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
                        text: 'El email ya esta registrado!',
                      })
                    </script>
                    ";
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
                    text: 'Debes rellenar todos los campos',
                  })
                </script>
                ";
            }
        }
    } catch (PDOException $e) {
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
