<?php
extract($_GET);
include '../../Datos/Departamento/DepartamentoDAO.php';
$departamento= new DepartamentoDAO();
$departamento->borrardepartamento($id);
header('location:../../Vistas/Departamento/index.php');

?>