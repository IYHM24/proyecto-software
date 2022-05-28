<script>
    var variable = 12;
</script>

<?php
    $var_PHP = "<script> document.writeln(variable); </script>"; // igualar el valor de la variable JavaScript a PHP 
    echo $var_PHP   // muestra el resultado 
?>