<?php
extract($_GET);
include '../../Datos/tipodocumento/TipoDocumentoDao.php';
$tipodocumento= new TipoDocumentoDao();
$tipodocumento->BorrarTipoDocumento($id);
header('location:../../Vistas/tipodocumento/Index.php');
?>