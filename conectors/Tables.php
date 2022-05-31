<?php
    function Tables($tabla, $myPDO){
        try {
            $sql=
            "
            SELECT * FROM ".$tabla."    
            ";
            return $sql;
        } catch (PDOException $e) {
            echo "<script>
                    
                        Swal.fire(
                            'conexion no exitosa',
                            '".$e."',
                            'error'
                        )
                        </script>";
            return 0;
        }
    }
?>