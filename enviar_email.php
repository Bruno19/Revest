<?php
    function sendMail($subject, $msg, $from, $nameFrom, $destino, $namedestino){
        require_once('mailer/class.phpmailer.php');
        $send = new PHPMailer(); // Instanciar a classe do PHP mailer
        
        $send->IsSMTP(); // seta que o campo smt o tipo de envio
        $send->SMTPAuth = true; // auntenticar envio de e-mail
        $send->Host = 'smtps.bol.com.br';// seta host para autenticaçao
        $send->Port = '587'; // seta a porta para envio smtp
        
        // aqui começa o envio do e-mail
        
        $send->Username = 'brunoaparecido1994@bol.com.br'; // email para autenticar o envio
        $send->Password = 'bruno7'; // Senha do email de autenticaçao
        $send->From = $from;
        $send->FromName = $nameFrom;
        $send->IsHTML(true); // seta que é html o envio
        $send->Subject = utf8_decode($subject);
        $send->Body = utf8_decode($msg);
        $send->AddAddress($destino, utf8_decode($namedestino));
        
        if ($send->Send()){ ?>
           
        <?php
        }else{ ?>
             
              <?php
        }
    }

?>