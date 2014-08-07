<?php
 extract($_GET);
 $depto=$departamento;
 $lnk=mysql_connect("localhost","root","");
 mysql_select_db("americangym",$lnk);
 $munic=mysql_query("SELECT * FROM municipio WHERE departamento_id=$depto",$lnk);
 if(mysql_num_rows($munic)>0)
   {
   	   while($row= mysql_fetch_row($munic))
       {
         echo "<option value='$row[0]'>$row[2]</option>";
       }
   }
   else
   {
      echo "<option value='0'>---Sin Resultados---</option>";
   }

 ?>