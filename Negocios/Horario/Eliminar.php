<?php
extract($_GET);
include '../../Datos/Horario/HorarioDao.php';
$Horario= new HorarioDao();
$Horario->BorrarHorario($id);
header('location:../../Vistas/Horario/Index.php');
?>