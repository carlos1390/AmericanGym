<?php
extract($_GET);
include '../../Datos/UnidadMedida/UnidadMedidaDao.php';
$UnidaddeMedida= new UnidaddeMedidaDao();
$UnidaddeMedida->BorrarUnidaddeMedida($id);
header('location:../../Vistas/UnidadMedida/Index.php');
?>