<?php
extract ($_POST);
require_once  $_SERVER["DOCUMENT_ROOT"].'/AmericanGym/Datos/Departamento/DepartamentoDAO.php';
$departamento=new DepartamentoDAO();
$departamento->creardepartamento($nombre);
header('location:../../Vistas/Departamento/index.php');

?>