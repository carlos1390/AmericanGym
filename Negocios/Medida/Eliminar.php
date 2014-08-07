<?php
extract($_POST);
include '../../Datos/Medida/MedidaDAO.php';
$MedidaTemp= new MedidaDAO();
$MedidaTemp->BorrarMedida($_GET['idmedida']);
header('location:../../Vistas/Medida/Index.php');
?>