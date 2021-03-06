<?php
    include("database.php");
    $clientes= "SELECT * FROM clientes WHERE eliminado = 0 ORDER BY razon_social";
    $resultado = mysqli_query($conexion,$clientes);
    $versiones= "SELECT * FROM versiones";
    $resultadoVersiones = mysqli_query($conexion,$versiones); 
    $resultadoVersiones2 = mysqli_query($conexion,$versiones); 

    $arrayVersion=array();

    while($rowVersiones2=mysqli_fetch_assoc($resultadoVersiones2))
    {
        array_push($arrayVersion, $rowVersiones2);
    }
    //echo var_dump($arrayVersion);
    
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
    <div class="tabla">
        <table>
            <thead>
                <tr>
                    <th>CUIT</th><th>Razon Social</th><th>Soporte</th><th>Vencimiento Mesa</th><th>Version</th><th></th><th></th>
                    <th>
                    <input type="checkbox" class="btn-modal" id="btn-modal">
                        <label for="btn-modal" class="lbl-modal"><i class="fas fa-plus"></i></label>
                        <div class="modal">
                            <div class="contenedor">
                                <header>¬°Bienvenidos!</header>
                                <label for="btn-modal">X</label>
                                <div class="contenido">
                                <form action="nuevoCliente.php" id="nuevoCliente" method="POST">
                                    <ul>
                                        <li>
                                            <p>CUIT(sin Guiones):</p> 
                                            <input name="cuit" type="number">
                                        </li>
                                        
                                        <li>
                                            <p>Razon social:</p> 
                                            <input name="razon_social" type="text">
                                        </li>
                                        <li>
                                            <p>Soporte:</p>
                                            <input name="soporte" type="text">
                                        </li>
                                        
                                        <li>
                                            <p>Vencimiento de Mesa:</p>
                                            <input name="fecha_mesa" type="date">
                                        </li>
                                        
                                        <li>
                                            <p>Version Instalada:</p>

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
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                
                <?php   
                    while($rowClientes=mysqli_fetch_assoc($resultado)){   
                ?>
                <tr>    
                    <td><?php echo $rowClientes["cuit"]; ?></td>
                    <td><?php echo $rowClientes["razon_social"]; ?></td>
                    <td><?php echo $rowClientes["soporte"] ;?></td>
                    <td><?php echo $rowClientes["fecha_mesa"]; ?></td>
                    <?php
                        $bufferVersion = $rowClientes["id_version"];   
                        $vercionesCliente="SELECT * FROM versiones WHERE id_version = $bufferVersion";
                        $resultadovercionesCliente =mysqli_query($conexion,$vercionesCliente);
                        $version=mysqli_fetch_assoc($resultadovercionesCliente);
                    ?>    
                    <td><?php echo $version["version"]; ?></td>
                    
                    <td><a href="correos.php?id=<?php echo $rowClientes["id_cliente"];?>"><i class="far fa-envelope"></i></a></td>
                    <td>
                        <input type="checkbox" class="btn-modal" id="btn-modal<?php echo $rowClientes["id_cliente"];?>">
                        <label for="btn-modal<?php echo $rowClientes["id_cliente"];?>" class="lbl-modal"><i class="fas fa-edit"></i></label>
                        <div class="modal">
                            <div class="contenedor">
                                <header>¬°Bienvenidos!</header>
                                <label for="btn-modal<?php echo $rowClientes["id_cliente"];?>">X</label>
                                <div class="contenido">
                                    <form action="actualizarCliente.php" id="actualizarCliente<?php echo $rowClientes["id_cliente"];?>" method="POST">
                                    <input name="id_cliente" type="hidden" value="<?php echo $rowClientes["id_cliente"] ;?>">
                                        <ul>
                                            <li>
                                                <p>CUIT(sin Guiones):</p>
                                                <input name="cuit" type="number" value="<?php echo $rowClientes["cuit"] ;?>">
                                            </li>
                                            
                                            <li>
                                                <p>Razon social:</p>
                                                <input name="razon_social" type="text" value="<?php echo $rowClientes["razon_social"] ;?>">
                                            </li>
                                            <li>
                                                <p>Soporte:</p>
                                                <input name="soporte" type="text" value="<?php echo $rowClientes["soporte"] ;?>">
                                            </li>
                                            
                                            <li>
                                                <p>Vencimiento de Mesa:</p> 
                                                <input name="fecha_mesa" type="date" value="<?php echo $rowClientes["fecha_mesa"] ;?>">
                                            </li>
                                            
                                            <li>
                                                <p>Version Instalada: </p>

                                                <select name="version" id="" from="actualizarCliente<?php echo $rowClientes["id_cliente"];?>">
                                                <option value="<?php echo $rowClientes["id_version"]; ?>"><?php echo $version["version"]; ?></option>
                                                <?php                                               
                                                for($i=0; $i< count($arrayVersion);$i++)
                                                {                                                    
                                                 ?>
                                                 <option value="<?php echo $arrayVersion[$i]['id_version']; ?>"><?php echo $arrayVersion[$i]['version']; ?></option>
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
                            </div>
                        </div>
                    </td>


                    <td><a  class="eliminar" href="eliminarCliente.php?id=<?php echo $rowClientes["id_cliente"];?>"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <div>
            <button>1</button><button>2</button><button>3</button><button>4</button>
        </div>
    </div>      
</body>
<script type="text/javascript" src="confirmacion.js"></script> 
</html>  