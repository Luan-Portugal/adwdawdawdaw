<?php

require("/home/usuario/diretoriodeinstalação/PHPMailer-master/src/PHPMailer.php");
require("/home/usuario/diretoriodeinstalação/PHPMailer-master/src/SMTP.php");
require("/home/usuario/diretoriodeinstalação/PHPMailer-master/src/Exception.php");

// Destinatário
$para = "contato.luanps@gmail.com";
// Assunto do e-mail
$assunto = "Contato do através do site ...";
// Campos do formulário de contato

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['tel'];
$mensagem = $_POST['mensagem'];

// Monta o corpo da mensagem com os campos
$corpo = "<html><body>";
$corpo .= "Nome: $nome ";
$corpo .= "Email: $email"; 
$corpo .= "Telefone: $telefone";
$corpo .= "Mensagem: $mensagem";
$corpo .= "</body></html>";

 $mail = new PHPMailer\PHPMailer\PHPMailer();
 $mail->IsSMTP(); // enable SMTP
 $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
 $mail->SMTPAuth = true; // authentication enabled
 $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
 $mail->Host = "www.projectsonline.com.br";
 $mail->Port = 465; // or 587
 $mail->IsHTML(true); 
 $mail->Username = "origem@dominio.com.br"; // email of server
 $mail->Password = "insira a senha aqui"; // password of server
 $mail->SetFrom("origem@dominio.com.br"); // email of server
 $mail->Subject = $assunto; 
 $mail->Body = $corpo;
 $mail->AddAddress($para);

    if(!$mail->Send()) {
       echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
       echo "Mensagem enviada com sucesso";
    }
