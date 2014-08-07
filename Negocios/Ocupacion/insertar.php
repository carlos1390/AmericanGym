<?php
extract ($_POST);
require_once  $_SERVER["DOCUMENT_ROOT"].'/AmericanGym/Datos/Ocupacion/OcupacionDAO.php';
$ocupacion=new OcupacionDAO();
$ocupacion->crearocupacion($nombre);
header('location:../../Vistas/Ocupacion/index.php');

?>