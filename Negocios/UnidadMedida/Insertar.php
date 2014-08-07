<?php
extract($_POST);
include '../../Datos/UnidadMedida/UnidadMedidaDao.php';
$UnidaddeMedida= new UnidaddeMedidaDao();
$UnidaddeMedida->CrearUnidaddeMedida($nombre);
header('location:../../Vistas/UnidadMedida/Index.php');


?>