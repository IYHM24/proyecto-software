<?php
    try {
        $myPDO = new PDO("pgsql:host=localhost;dbname=cabin", "postgres", "ADMIN");
    } catch (PDOException $e) {
        echo "<script>
                    
                        Swal.fire(
                            'conexion no exitosa',
                            'No conectado a la base de datos',
                            'error'
                        )
                        </script>";
        echo $e->getMessage();
    }
?>