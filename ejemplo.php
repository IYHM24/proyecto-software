<html>
<head>
  <title> CRUD </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>

<div class="row">
  <div class="col-md-4"></div>

  <div class="col-md-4">

    <center><h1>BASE DE DATOS BIBLIOTECA SC</h1></center>
    <center><h1>Formulario Tabla Autor</h1></center>

    <form method="POST" action="ejemplo.php" >

    <div class="form-group">
      <label for="cedula">Cedula 2</label>
      <input type="text" name="cedula" class="form-control" id="cedula">
    </div>

    <div class="form-group">
        <label for="nombre">Nombre </label>
        <input type="text" name="nombre" class="form-control" id="nombre" >
    </div>

    <div class="form-group">
        <label for="apellido">Apellido </label>
        <input type="text" name="apellido" class="form-control" id="apellido" >
    </div>

    <div class="form-group">
        <label for="nacionalidad">Nacionalidad </label>
        <input type="text" name="nacionalidad" class="form-control" id="nacionalidad">
    </div>

    <div class="form-group">
        <label for="telefono">Telefono </label>
        <input type="text" name="telefono" class="form-control" id="telefono">
    </div>

    <center>

      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
      <input type="submit" value="Nuevo" class="btn btn-success" name="btn_nuevo">
      <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
    </center>

  </form>

  <?php
    include("./conectors/conexion.php");

      $ced    ="";
      $nomb   ="";
      $apell  ="";
      $nacio  ="";
      $tel    ="";

      if(isset($_POST['btn_consultar']))
      {
        $ced  = $_POST['email'];
        $exit=0;

         if ($ced =="")
         {
           echo '<div class= "alert alert-success">Se requiere el número de cedula</div>';

         }
           else
           {
             $ver = $myPDO -> query ("SELECT * FROM cliente  WHERE email = '$ced'");
               WHILE ($row =$ver ->fetch())
               {
                   echo $row['nombre'].'<br>';
                   echo $row['apellido'].'<br>';
                   echo $row['email'].'<br>';
                   $exit++;
           }
           if ($exit==0)
           {
             echo '<div class= "alert alert-success">La cedula del autor no existe en la tabla</div>';
           }
        }
      }

      if(isset($_POST['btn_nuevo']))
      {
        $ced  = $_POST['cedula'];
        $nomb = $_POST ['nombre'];
        $apell = $_POST ['apellido'];
        $nacio= $_POST ['nacionalidad'];
        $tel = $_POST ['telefono'];

         if ($ced =="" || $nomb ==""  || $apell =="")
         {
           echo '<div class= "alert alert-success">Los campos: cedula,
           nombre, apellido son obligatorios</div>';
         }
           else
           {
           $sql_insert = "INSERT INTO autor (cedula,nombre,apellido,
             nacionalidad,telefono)
            VALUES ('$ced', '$nomb','$apell','$nacio','$tel')";
           $myPDO -> query($sql_insert);

          echo '<div class= "alert alert-success">El autor se registro en la tabla</div>';
           }

      }

      if(isset($_POST['btn_actualizar']))
      {
        $ced  = $_POST['cedula'];
        $nomb = $_POST ['nombre'];
        $apell = $_POST ['apellido'];
        $nacio= $_POST ['nacionalidad'];
        $tel = $_POST ['telefono'];

         if ($ced =="" || $nomb ==""  || $apell =="")
         {
           echo '<div class= "alert alert-success">Los campos: cedula,
           nombre, apellido son obligatorios</div>';
         }
           else
           {
             $exit=0;
             $ver = $myPDO -> query ("SELECT * FROM autor  WHERE cedula = '$ced'");
               WHILE ($row =$ver ->fetch())
               {
                   $exit++;
             }
             if ($exit==0)
             {
             echo '<div class= "alert alert-success">La cedula del autor no existe en la tabla</div>';
             }
              else
              {
                $sql_update = "UPDATE autor SET
                               cedula='$ced',
                               nombre ='$nomb',
                               apellido='$apell',
                               nacionalidad='$nacio',
                               telefono='$tel'
                             WHERE cedula='$ced'";
                $myPDO -> query($sql_update);

                echo '<div class= "alert alert-success">Actualizacion relizada</div>';
              }
           }

      }

      if(isset($_POST['btn_eliminar']))
      {
        $ced  = $_POST['cedula'];
        $exit=0;
         if ($ced =="")
         {
           echo '<div class= "alert alert-success">Se requiere el número de cedula</div>';
         }
           else
           {
             $ver = $myPDO -> query ("SELECT * FROM autor  WHERE cedula = '$ced'");
               WHILE ($row =$ver ->fetch())
               {
                   $exit++;
           }
           if ($exit==0)
           {
             echo '<div class= "alert alert-success">La cedula del autor no existe en la tabla</div>';
           }
           else
           {
             $sql = "DELETE FROM autor WHERE cedula='$ced'";
             $myPDO ->query($sql);
             echo '<div class= "alert alert-success">El registro de elimino</div>';
           }
      }
    }

  ?>

  </div>

  <div class="col-md-4"></div>
</div>

</body>
</html>