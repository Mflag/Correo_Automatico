<?php
    include("database.php");
    $id_cliente = $_GET["id"];
    $casillas= "SELECT * FROM casillas where id_cliente = $id_cliente";
    $resultado = mysqli_query($conexion,$casillas);  
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
                    <th>Nombre</th><th>Casilla</th><th></th><th></th>
                </tr>
            </thead>
            <tbody>
                
                <?php   
                    while($rowCasillas=mysqli_fetch_assoc($resultado)){
                ?>
                <tr>    
                    <td><?php echo $rowCasillas["nombre"]; ?></td>
                    <td><?php echo $rowCasillas["casilla"]; ?></td>
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
        <form action="nuevoCorreo.php" id="nuevoCorreo" method="POST">
                    <input name="id_cliente" type="hidden" value="<?php echo $id_cliente;?>">
                <ul>
                <li>
                    <label for="nombre">Nombre: </label>
                    <input name="nombre" type="text">
                </li>
                
                <li>
                    <label for="casilla">Casilla: </label>
                    <input name="casilla" type="text">
                </li>
                <li>
                    <input type="submit">
                </li>

            </ul>
        </form>
    </div>
</body>
</html>  