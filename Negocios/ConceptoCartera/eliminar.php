<?php
extract($_GET);
include '../../Datos/ConceptoCartera/ConceptoCarteraDAO.php';
$conceptocartera = new ConceptoCarteraDao();
$conceptocartera->borrarconceptocartera($id); 
header('location:../../Vistas/ConceptoCartera/index.php');

?>