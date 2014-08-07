<?php
$message = wordwrap($_GET['message'],70, "\r\n");
ini_set("SMTP","aspmx.l.google.com");
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: ".$_GET['email']. "\r\n";
//$headers .= "Email:".$_GET['email']. "\r\n";
//$headers .= "Phone:".$_GET['phone']. "\r\n";
 if (mail("cmpena99@misena.edu.co","Sugerencia",$message,$headers)=="true"){
 	echo "Mensaje Enviado Correctamente";
 }
 else{
 	echo "Ocurrio Un Error a la Hora de Enviar el Mensaje,Intentelo de Nuevo";
 }

 ?>