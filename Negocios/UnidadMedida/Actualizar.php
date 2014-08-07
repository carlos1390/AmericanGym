<?php
extract($_POST);
include '../../Datos/UnidadMedida/UnidadMedidaDao.php';
$UnidaddeMedida= new UnidaddeMedidaDao();
$UnidaddeMedida->ActualizarUnidaddeMedida($id,$nombre);
header('location:../../Vistas/UnidadMedida/Index.php');
?>