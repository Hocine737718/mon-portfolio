<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])){

        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
        //$message = $_POST['message'];
        
        // Load Composer's autoloader
        require 'mailer/autoload.php';
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try{
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                       Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'billel1599@gmail.com';                     // SMTP username
            $mail->Password   = 'styl pzsi ebcw jfer';
            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            // Content
            $mail->isHTML(true);  
            $mail->CharSet = "UTF-8";
            $mail->setFrom('billel1599@gmail.com', 'My Portfolio');
            $mail->addAddress('hocine737718@gmail.com');//le recepeteur
            $mail->Subject = 'Contactez-nous';//sujet
            $cssContent = file_get_contents('css/mail.css'); 
            $html='
            <html>
                <head>
                    <style>
                        '.$cssContent.'
                    </style>
                </head>
                <body>
                    <div class="container">
                        <h1>Nom : '.$name.'</h1>
                        <h2>Email : '.$email.'</h2>
                        <p>
                            '.$message.'
                        </p>
                    </div>
                </body>
            </html>
            ';  
            $mail->Body= $html;    
            $mail->send();
        } catch (Exception $e) {
            echo 'Erreur lors de l\'envoi du message : ', $e->getMessage();
        }
    }
    header('location: index.php'); 
?>
