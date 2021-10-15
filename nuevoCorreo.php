<?php
    include("database.php");

    $id_cliente=$_POST["id_cliente"];
    $nombre=$_POST["nombre"];
    $casilla = $_POST["casilla"];
    

    $insertar = "INSERT INTO casillas (id_casilla, id_cliente, nombre, casilla) VALUES (NULL, $id_cliente, '$nombre', '$casilla');";
    $resultado = mysqli_query($conexion, $insertar);
    
    
   

    if($resultado){
        echo "<script>window.location='/EnvioMail/correos.php?id=$id_cliente'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/EnvioMail'</script>";
    }

    
?>