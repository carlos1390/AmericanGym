<?php
extract($_GET);
include '../../Datos/Ocupacion/OcupacionDAO.php';
$ocupacion= new OcupacionDAO();
$ocupacion->borrarocupacion($id);
header('location:../../Vistas/Ocupacion/index.php');

?>