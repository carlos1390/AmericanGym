<?php
extract ($_POST);
require_once  $_SERVER["DOCUMENT_ROOT"].'/AmericanGym/Datos/ConceptoCartera/ConceptoCarteraDAO.php';
$conceptocartera=new ConceptoCarteraDAO();
$conceptocartera->crearconceptocartera($nombre,$totalconcepto);
header('location:../../Vistas/ConceptoCartera/index.php');

?>