<?php
extract($_POST);
require_once '../../Datos/Municipio/MunicipioDAO.php';
$Municipio= new MunicipioDAO();
$Municipio->CrearMunicipio($departamento,$nombre);
header('location:../../Vistas/Municipio/Index.php');

?>