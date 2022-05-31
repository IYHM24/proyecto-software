<!DOCTYPE html>
<html lang="es">

<head>
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
</head>
</head>
<body>
    <?php
      if(isset($_GET["id_fabricante"])){
        try {
          include "./conexion.php";
          $id_fabricante = $_GET['id_fabricante'];;
          $sql =
              "
        DELETE FROM fabricante
          where id_fabricante=" . $id_fabricante . ";
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
                                window.location.href = '../fabricantes.php'
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
                  window.location.href = "../fabricantes.php"
              }
            })
          </script>
          ';
        } 
      }
      if(isset($_GET["id_categoria"])){
        try {
          include "./conexion.php";
          $id_categoria = $_GET['id_categoria'];;
          $sql =
              "
        DELETE FROM categorias
          where id_categoria=" . $id_categoria . ";
        ";
          $myPDO->query($sql);
          echo "
                  <script>
                        Swal.fire({
                            title: 'Categoria Eliminada',
                            text: 'se ha eliminado La categoria',
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Aceptar'
                          }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '../categorias.php'
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
              text: "No se puede eliminar la categoria esta tiene cabañas asociadas",
              icon: "error",
              confirmButtonColor: "#3085d6",
              confirmButtonText: "Aceptar"
            }).then((result) => {
              if (result.isConfirmed) {
                  window.location.href = "../categorias.php"
              }
            })
          </script>
          ';
        } 
      }
    ?>
</body>

</html>