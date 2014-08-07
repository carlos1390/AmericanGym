<?php
extract($_POST);
include '../../Datos/ConceptoCartera/ConceptoCarteraDAO.php';
$conceptocartera= new ConceptoCarteraDao();
//echo $id." ".$nombre." ".$apellido." ".$numerocedula;
$conceptocartera->actualizarconceptocartera($id,$nombre,$totalconcepto);
header('location:../../Vistas/ConceptoCartera/index.php');

?>