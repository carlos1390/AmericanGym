<?php
extract($_POST);
require_once '../../Datos/Cartera/CarteraDAO.php';
require_once '../../Datos/ConceptoCartera/ConceptoCarteraDAO.php';

$Cartera= new CarteraDAO();
$ConceptoCartera= new ConceptoCarteraDAO();

$fecha=date("Y/m/d");
$ConceptoCartera->obteberconceptocartera($_POST['concepto']);
$totalConcepto;
$saldoTemp;

for ($i=0; $i <count($ConceptoCartera->idconceptocartera) ; $i++) { 
	$totalConcepto=$ConceptoCartera->totalconcepto[$i];
}
if ($_POST['abono']<$totalConcepto) {
	$saldoTemp=$totalConcepto-$_POST['abono'];
}
else{
	$saldoTemp=0;
}
$Cartera->CrearCartera($_POST['concepto'],$_POST['persona'],$fecha,$_POST['abono'],$saldoTemp);
header('location:../../Vistas/Cartera/Index.php');

?>