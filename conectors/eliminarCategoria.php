<?php
    function EliminarCategoria($id_categoria){
        try {
            include "./conexion.php";
            $sql =
                "
           DELETE FROM categorias
            where id_categoria=" . $id_categoria. ";
        ";
        $myPDO->query($sql);
            echo "
                           <script>
                           Swal.fire({
                               title: 'Registro Eliminado',
                               text: 'se ha eliminado un registro',
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
        } catch (PDOException $e) {
            echo"<script>alert(`".$e."`)</script>";
            echo '
            <script>
            Swal.fire({
                title: "Ups...!",
                text: "No se puede eliminar el registro este tiene cabañas asociadas",
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
