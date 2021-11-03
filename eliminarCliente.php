<?php
    include("database.php");
    
    $id_cliente = $_GET["id"];
    
    $clientes= "UPDATE clientes SET eliminado = 1 where id_cliente = $id_cliente";

    $resultado = mysqli_query($conexion,$clientes);  

    if($resultado){
        echo "<script>window.location='/EnvioMail/index.php'</script>";
    }else{
        echo "<script> alert(No se pudo registrar el usuario');
        window.location='/EnvioMail'</script>";
    }