<?php

	$conn = @mysql_connect('localhost', 'root', '', 'incena')or die(mysql_errno());
	@mysql_select_db('incena');
	



    if(isset($_POST['enviar_pro_email'])){
        

        
$nome = $_POST["nome"];
$email = $_POST["email"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["texto"];

//$recebe = 'jeanpreis@gmail.com';
$recebe = 'brunorequinte@bol.com.br';
$envia = 'brunoaparecido1994@bol.com.br';

$html = '
<html>
<head>
 <title>Nova Mensagem!</title>
</head>
<body>
<h2>Nova Mensagem enviada do site IN Cena</h2>
<p><strong>Nome: </strong>'.$nome.'<br/>
<p><strong>E-mail: </strong>'.$email.'<br/>
<p><strong>assunto: </strong>'.$assunto.'<br/>
<p><strong>Mensagem: </strong>'.$mensagem.'</p>
</body>
</html>
';
        
require_once("mailer/class.phpmailer.php");

define('USER', 'brunoaparecido1994@bol.com.br');
define('PWD', 'xxx');

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
	global $error;
	$mail = new PHPMailer();
	$mail->CharSet = "UTF-8";
	$mail->IsHTML(true);
	$mail->IsSMTP();
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$mail->Host = 'smtps.bol.com.br';
	$mail->Port = 587;
	$mail->Username = USER;
	$mail->Password = PWD;
	$mail->SetFrom($de, $de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
	$mail->AddAddress($para);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Mensagem enviada!';
		return true;
	}
}

smtpmailer($recebe, $envia, 'IN Cena', 'Nova mensagem do site', $html);
		   
if (!empty($error)){
    echo $error;
}

        
}
            
    

     if(isset($_POST['doar'])){

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $texto = $_POST["texto"];
        $aprovado = 2;
         
         
         if(empty($nome)){
                echo "Campo NOME está vazio";
         }elseif(empty($email)){
                echo "Campo EMAIL está vazio";
         }elseif(empty($texto)){
                echo "Campo TEXTO está vazio";
         }else{

            $query = "INSERT INTO `doacao`(nome,email,msg,aprovado) VALUES ('$nome','$email','$texto','$aprovado')";
            $executa = mysql_query($query);
        
            if($executa){
                echo "Doacao cadastrado com sucesso";
            }
     }}

?>