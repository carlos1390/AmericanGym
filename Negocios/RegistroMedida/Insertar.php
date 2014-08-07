<?php
extract($_POST);
include '../../Datos/RegistroMedida/RegistroMedidaDao.php';
$RegistroMedida= new RegistroMedidaDao();
$fecha=date("Y/m/d");
$RegistroMedida->CrearRegMedida($fecha,$_POST['persona'],$_POST['variable'],$_POST['valor']);
header('location:../../Vistas/RegistroMedida/Index.php');
?>