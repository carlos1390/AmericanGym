<?php
extract($_POST);
include '../../Datos/Medida/MedidaDAO.php';
$MedidaTemp= new MedidaDAO();
$MedidaTemp->ActualizarMedida($_POST['idmedida'],$_POST['unidad'],$_POST['nombre']);
header('location:../../Vistas/Medida/Index.php');
?>