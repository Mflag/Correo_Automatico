<?php
    include("database.php");
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
        <form action="actualizarVersion.php" id="actualizarVersion" method="POST">
            <ul>
                <li>
                    <label for="version">Version Instalada: </label>

                    <select name="version" id="" from="actualizarVersion">
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
