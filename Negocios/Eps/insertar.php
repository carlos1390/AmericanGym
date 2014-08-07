<?php
extract ($_POST);
require_once  $_SERVER["DOCUMENT_ROOT"].'/AmericanGym/Datos/Eps/EpsDAO.php';
$eps=new EpsDAO();
$eps->creareps($nombre);
header('location:../../Vistas/Eps/index.php');

?>