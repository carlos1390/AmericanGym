<?php 
$id_person=$_GET['numero_docu'];
$lnk=mysql_connect("localhost","root","");
mysql_select_db("americangym",$lnk);
$Persona=mysql_query("SELECT * FROM persona WHERE NUMERODOCUMENTO=$id_person",$lnk);
if (mysql_num_rows($Persona)>0) {
   while ($row=mysql_fetch_array($Persona)) {
   	echo "<option value='$row[0]'>$row[9]  $row[10]</option>";
   }
}
else{
   	echo "<option value='0'>Cliente no Encontrado</option>";
}

 ?>