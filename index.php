<?php
    include("database.php");
    $clientes= "SELECT * FROM clientes ORDER BY razon_social";
    $resultado = mysqli_query($conexion,$clientes);
    $versiones= "SELECT * FROM versiones";
    $resultadoVersiones = mysqli_query($conexion,$versiones); 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <nav id="menu">
        <ul>
            <li id="CLIENTES"> <a href="index.php">Clientes</a></li>
            <li id="VERSIONES"><a href="versiones.php">Versiones</a></li>
            <li id="PARAMETROS"> <a href="enviarCorreo.php">Parametros</a></li>
            <li id="ACTAS"><a href="#ACTAS">Actas</a></li>
        </ul>
    </nav>
    <div>
        <table>
            <thead>
                <tr>
                    <th>CUIT</th><th>Razon Social</th><th>Vencimiento Mesa</th><th>Version</th><th></th><th></th><th></th>
                </tr>
            </thead>
            <tbody>
                
                <?php   
                    while($rowClientes=mysqli_fetch_assoc($resultado)){
                ?>
                <tr>    
                    <td><?php echo $rowClientes["cuit"]; ?></td>
                    <td><?php echo $rowClientes["razon_social"]; ?></td>
                    <td><?php echo $rowClientes["fecha_mesa"]; ?></td>
                    <?php
                        $bufferVersion = $rowClientes["id_version"];   
                        $vercionesCliente="SELECT * FROM versiones WHERE id_version = $bufferVersion";
                        $resultadovercionesCliente =mysqli_query($conexion,$vercionesCliente);
                        $version=mysqli_fetch_assoc($resultadovercionesCliente);
                    ?>    
                    <td><?php echo $version["version"]; ?></td>
                    
                    <td><a href="correos.php?id=<?php echo $rowClientes["id_cliente"];?>"><i class="far fa-envelope"></i></a></td>
                    <td><i class="fas fa-edit"></i></td>
                    <td><i class="fas fa-trash-alt"></i></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

    </div>
    <div>
        <form action="nuevoCliente.php" id="nuevoCliente" method="POST">
            <ul>
                <li>
                    <label for="cuit">CUIT(sin Guiones): </label>
                    <input name="cuit" type="number">
                </li>
                
                <li>
                    <label for="razon_social">Razon social: </label>
                    <input name="razon_social" type="text">
                </li>
                
                <li>
                    <label for="fecha_mesa">Vencimiento de Mesa: </label>
                    <input name="fecha_mesa" type="date">
                </li>
                
                <li>
                    <label for="version">Version Instalada: </label>

                    <select name="version" id="" from="nuevoCliente">
                    <?php   
                    while($rowVersiones=mysqli_fetch_assoc($resultadoVersiones)){
                     ?>
                        <option value="<?php echo $rowVersiones["id_version"]; ?>"><?php echo $rowVersiones["version"]; ?></option>
                    <?php
                    }
                    ?>    
                    </select>
                </li>
                <li>
                    <input type="submit">
                </li>

            </ul>
        </form>
    </div>
</body>
</html>  