<?php
extract($_POST);
include '../../Datos/Horario/HorarioDao.php';
$Horario= new HorarioDao();
$Horario->CrearHorario($nombre,$hora_inicio,$hora_fin);
header('location:../../Vistas/Horario/Index.php');


?>