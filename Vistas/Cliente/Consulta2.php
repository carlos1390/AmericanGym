<?php
session_start();
include ("../../Control.php");
?>
<?php
      include'../../Datos/RegistroMedida/RegistroMedidaDao.php';
      include'../../Datos/Persona/PersonaDAO.php';
      $Persona= new PersonaDAO();
      $RegistroMedida= new RegistroMedidaDao();
      $RegistrosTemp=$RegistroMedida->ContarMedidas_Usuario($_SESSION['Numero_documento']);
      if ($RegistrosTemp>0) {
          $Persona->ObtenerPersona($_SESSION['Numero_documento']);
          $RegistroMedida->ObtenerRegistrosdeMedida($_SESSION['Numero_documento'],$_POST['medidas']);
      }
      else{
        echo "Usuario "."'".$_SESSION['usuario']."'"." No Tiene Registros de Medida !!!";
      }
      
      ?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#Consultar").click(function () {    
         var medidas= $('input:radio[name=group]:checked').val();
             $.post('consulta2.php',{medidas:medidas},function(e){
              $('#grafica').html(e); 
          });
         });
  
  $('#grafica').highcharts({
    title: {
      text: '<?php echo "Historial de Medidas:  ". $Persona->Nombres[0].' '.$Persona->Apellidos[0]; ?>', /*titulo general*/
                x: -20 //center
              },
              xAxis: {
                categories:[ <?php for ($i=0; $i<count($RegistroMedida->idregistromedida); $i++) { echo "'".$RegistroMedida->fecha[$i]."'," ; } ?> ] /*datos en x */
              },
              yAxis: {
                title: {
                  text: 'grafica ejemplo' /* titulo vertical*/
                },
                plotLines: [{
                  value: 0,
                  width: 1,
                  color: '#808080'   /*color de la linea de la grafica*/
                }]
              },
              tooltip: {
                valueSuffix: '<?php echo $RegistroMedida->nombreunidad[0] ?>' /*este es para que salga en cada uno de los puntos cuando uno pasa el mouse*/
              },
              legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
              },
              series: [{
                name: '<?php echo $RegistroMedida->nombremedida[0] ?>',
                data: [ <?php for ($i=0; $i<count($RegistroMedida->idregistromedida); $i++) { echo $RegistroMedida->valor[$i].',' ; } ?> ]
              }]
            });
});
</script>