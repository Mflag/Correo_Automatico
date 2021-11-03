<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    //SELECT casilla FROM casillas INNER JOIN clientes ON casillas.id_cliente = clientes.id_cliente WHERE clientes.id_version <=1
    include("database.php");
        
        $version = $_POST["version"];
    
        $clientes= "SELECT id_cliente FROM clientes WHERE id_version <= $version";
        $resultado = mysqli_query($conexion,$clientes);
    
        
    
    

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'banderamatias96@gmail.com';                     //SMTP username
        $mail->Password   = 'Mat246813579';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('banderamatias96@gmail.com', 'Matias');

        while($rowClientes=mysqli_fetch_assoc($resultado))
        {
            $flagCC =0;
            $id_cliente = $rowClientes["id_cliente"];
    
            $casillas= "SELECT casilla FROM casillas WHERE id_cliente = $id_cliente";
            $resultadoCasillas = mysqli_query($conexion,$casillas);
    
            while($rowCasillas=mysqli_fetch_assoc($resultadoCasillas)){
                $casilla=$rowCasillas["casilla"];

                if($flagCC == 0)
                {
                    $mail->addAddress($casilla);
                    $flagCC =1;
                }
                else
                {
                    $mail->addCC($casilla);
                }
                
            }
        }    

        //$mail->addAddress('agustin@sistemaslenox.com.ar', 'Agustin');     //Add a recipient
       // $mail->addAddress('patricio@sistemaslenox.com.ar');               //Name is optional
       // $mail->addReplyTo('info@example.com', 'Information');
       // $mail->addCC('cc@example.com');
       // $mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Prueba de CC 2';
        $mail->Body    = 'Ahora estan en CC 2';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
    


?>