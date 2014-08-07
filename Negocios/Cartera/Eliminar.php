<?php
extract($_GET);
require_once '../../Datos/Cartera/CarteraDAO.php';
$Cartera= new CarteraDAO();
$Cartera->BorrarCartera($id_cartera);
header('location:../../Vistas/Cartera/Index.php');
?>