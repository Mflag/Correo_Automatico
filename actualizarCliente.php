<?php
    include("database.php");
    $id = $_POST["id_cliente"];
    $cuit = $_POST["cuit"];
    $razon_social = strtoupper($_POST["razon_social"]);
    $soporte = strtoupper($_POST["soporte"]);
    $fecha_mesa = $_POST["fecha_mesa"];
    $version = $_POST["version"];
    

    $insertar = "UPDATE clientes SET cuit='$cuit', razon_social='$razon_social', fecha_mesa='$fecha_mesa',soporte='$soporte', id_version='$version' WHERE id_cliente = $id;";
    $resultado = mysqli_query($conexion, $insertar);
    
    

    if($resultado){
        echo "<script>window.location='/EnvioMail/index.php'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/EnvioMail'</script>";
    }

    
?>