<?php
    include("database.php");

    $cuit = $_POST["cuit"];
    $razon_social = strtoupper($_POST["razon_social"]);
    $soporte = strtoupper($_POST["soporte"]);
    $fecha_mesa = $_POST["fecha_mesa"];
    $version = $_POST["version"];
    

    $insertar = "INSERT INTO clientes (id_cliente, cuit, razon_social,soporte, fecha_mesa, id_version) VALUES (NULL,'$cuit', '$razon_social','$soporte', '$fecha_mesa', '$version');";
    $resultado = mysqli_query($conexion, $insertar);
    
    

    if($resultado){
        echo "<script>window.location='/EnvioMail/index.php'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/EnvioMail'</script>";
    }

    
?>