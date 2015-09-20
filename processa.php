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
         }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "Email envalido";
         }elseif(empty($texto)){
                echo "Campo TEXTO está vazio";
         }else{

            $query = "INSERT INTO `doacao`(nome,email,msg,aprovado) VALUES ('$nome','$email','$texto','$aprovado')";
            $executa = mysql_query($query);
        
            if($executa){
                echo "Doacão cadastrada com sucesso";
            }
     }}
            
    

     if(isset($_POST['solicitacao'])){

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $texto = $_POST["texto"];
        $aprovado = 2;
         

         
         if(empty($nome)){
                echo "Campo NOME está vazio";
         }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "Email envalido";
         }elseif(empty($email)){
                echo "Campo EMAIL está vazio";
         }elseif(empty($texto)){
                echo "Campo TEXTO está vazio";
         }else{

            $query = "INSERT INTO `solicitacao`(nome,email,msg,aprovado) VALUES ('$nome','$email','$texto','$aprovado')";
            $executa = mysql_query($query);
        
            if($executa){
                echo "Solicitação cadastrada com sucesso";
            }
     }}










if(isset($_POST['aprovar_pedido'])){

        $id = $_POST["id"];
  
        $query = " UPDATE  `incena`.`doacao` SET  `aprovado` =  '1' WHERE  `doacao`.`id_doacao` = $id";
        $executa = mysql_query($query);


   }


if(isset($_POST['bloquear_pedido'])){

        $id = $_POST["id"];
  
        $query = " UPDATE  `incena`.`doacao` SET  `aprovado` =  '2' WHERE  `doacao`.`id_doacao` = $id";
        $executa = mysql_query($query);

   }






if(isset($_POST['excluir_pedido'])){     

         $id = $_POST['id'];

         $query = mysql_query("SELECT * FROM doacao WHERE id_doacao = '$id'")
         or die(mysql_error());

         while($option=mysql_fetch_array($query)){

         $deleta = mysql_query("DELETE FROM doacao WHERE id_doacao = '$id'")
         or die(mysql_error());         
    }
}   




















if(isset($_POST['aprovar_solicitacao'])){

        $id = $_POST["id"];
  
        $query = " UPDATE  `incena`.`solicitacao` SET  `aprovado` =  '1' WHERE  `solicitacao`.`id_solicita` = $id";
        $executa = mysql_query($query);


   }


if(isset($_POST['bloquearsolicitacao'])){

        $id = $_POST["id"];
  
        $query = " UPDATE  `incena`.`solicitacao` SET  `aprovado` =  '2' WHERE  `solicitacao`.`id_solicita` = $id";
        $executa = mysql_query($query);

   }






if(isset($_POST['excluirsolicitacao'])){     

         $id = $_POST['id'];

         $query = mysql_query("SELECT * FROM solicitacao WHERE id_solicita = '$id'")
         or die(mysql_error());

         while($option=mysql_fetch_array($query)){

         $deleta = mysql_query("DELETE FROM solicitacao WHERE id_solicita = '$id'")
         or die(mysql_error());         
    }
}  
?>





