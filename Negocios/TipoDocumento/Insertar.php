<?php
extract($_POST);
include '../../Datos/tipodocumento/TipoDocumentoDao.php';
$tipodocumento= new TipoDocumentoDao();
$tipodocumento->CrearTipoDocumento($nombre);
header('location:../../Vistas/tipodocumento/Index.php');
?>