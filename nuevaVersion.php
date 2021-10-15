<?php
    include("database.php");

    $version = $_POST["version"];
    

    $insertar = "INSERT INTO versiones (id_version, version) VALUES (NULL,'$version');";
    $resultado = mysqli_query($conexion, $insertar);
    
    
   

    if($resultado){
        echo "<script>window.location='/EnvioMail/versiones.php'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/EnvioMail'</script>";
    }

    
?>