<?php
extract($_POST);
//echo $idmunicipio." ".$departamento." ".$nombremunicipio;
require_once '../../Datos/Municipio/MunicipioDAO.php';
$Municipio= new MunicipioDAO();
$Municipio->ActualizarMunicipio($idmunicipio,$departamento,$nombremunicipio);
header('location:../../Vistas/Municipio/Index.php');
?>