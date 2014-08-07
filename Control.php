<?php
extract($_SESSION);
if(!isset($_SESSION['usuario']) &&  !isset($_SESSION['contrasena']))
{
header("location:../../index.html");
}
?>