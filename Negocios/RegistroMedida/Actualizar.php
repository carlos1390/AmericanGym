<?php
extract($_POST);
include '../../Datos/TipoDocumento/TipoDocumentoDao.php';
$tipodocumento= new TipoDocumentoDao();
$tipodocumento->ActualizarTipoDocumento($id,$nombre);
header('location:../../Vistas/TipoDocumento/Index.php');
?>