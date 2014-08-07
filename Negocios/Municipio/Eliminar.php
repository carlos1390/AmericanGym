<?php
extract($_GET);
require_once '../../Datos/Municipio/MunicipioDAO.php';
$Municipio= new MunicipioDAO();
$Municipio->BorrarMunicipio($idmunicipio);
header('location:../../Vistas/Municipio/Index.php');
?>