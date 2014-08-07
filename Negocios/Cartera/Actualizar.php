<?php
extract($_POST);
//echo $idmunicipio." ".$departamento." ".$nombremunicipio;
require_once '../../Datos/Cartera/CarteraDAO.php';
$Cartera= new CarteraDAO();
$Cartera->ActualizarCartera($idcartera,$concepto,$nombre);
header('location:../../Vistas/Cartera/Index.php');
?>