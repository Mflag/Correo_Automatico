<?php
//SELECT casilla FROM casillas INNER JOIN clientes ON casillas.id_cliente = clientes.id_cliente WHERE clientes.id_version <=1
    include("database.php");
    
    $CC= "matias@sistemaslenox.com.ar, agustin@sistemaslenox.com.ar, patricio@sistemaslenox.com.ar";
    $asunto="Prueba de envio de mail";
    $cuerpo="holii";
/*    
    $version = $_POST["version"];

    $clientes= "SELECT id_cliente FROM clientes WHERE id_version <= $version";
    $resultado = mysqli_query($conexion,$clientes);

    while($rowClientes=mysqli_fetch_assoc($resultado)){

        $id_cliente = $rowClientes["id_cliente"];

        $casillas= "SELECT casilla FROM casillas WHERE id_cliente = $id_cliente";
        $resultadoCasillas = mysqli_query($conexion,$casillas);

        while($rowCasillas=mysqli_fetch_assoc($resultadoCasillas)){

            $destino= $rowCasillas["casilla"];
            $CC = $CC.$destino.", ";
        }
        echo $CC."<br>";

*/

       echo mail($CC,$asunto,$cuerpo);
        //$CC="";
        

    //}



?>