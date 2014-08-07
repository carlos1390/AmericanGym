<?php
extract($_GET);
include '../../Datos/Eps/EpsDAO.php';
$eps= new EpsDAO();
$eps->borrareps($id);
header('location:../../Vistas/Eps/index.php');

?>