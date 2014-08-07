<?php
session_start();
include ("../../Control.php");
?>
<!DOCTYPE html>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>AmericanGYmClub</title>
  <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../css/style.css">      

  <style type="text/css">

  /*escritorio*/
  @media (min-width:1200px){
    /*body {color:red;}*/

  }

  /*escritorio pequeno o tablet*/
  @media(min-width:768px){

  }

  /*tablet o smartphone*/
  @media(max-width:767px){
    /*body {color:blue;}*/
  }

  /*smartphone*/
  @media(max-width:470px){
    /*body {color:yellow;}*/


  }
  .text-big{
    font-size: 300px;
    line-height: 320px;
  }

  #slider img{
    max-width: 100%;

  }

  #contenedor_general{
    max-width: 1024px;
  }

  </style>
</head>
<body>
  <div class="container" id="contenedor_general">
    <!--inicio Header-->
    <div class="row-fluid">
      <div class="span12 well">
        <div class="span1">
          <img src="../../img/logotipo.png" alt="logotipo" class="img-rounded">
        </div>
        <div class="span11">
          <h2>American Gym Club</h2>
          <h5>Centro De Acondicionamiento Fisico</h5>
          <!--<img src="img/titulo1.png" alt="">-->
        </div>
      </div>
    </div>
    <!--/.navbar -->
    <div class="navbar ">
      <div class="navbar-inner">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!--<a class="brand" href="#"><I class="icon-home"></I>INICIO</a>-->
        <div class="nav-collapse collapse">
          <ul class="nav">                

            <li><a href="GestionarPerfil.php">PERFIL</a></li>

            <li><a href="Consulta.php">CONSULTAR</a></li>

            <li><a href="../../logout.php">CERRAR SESION</a></li>
          </ul>
          <a href=""><img class="pull-right"src="../../img/google_01.png" alt=""></a>
          <a href=""><img class="pull-right"src="../../img/youtube_01.png" alt=""></a>
          <a href=""><img class="pull-right"src="../../img/twitter_01.png" alt=""></a>
          <a href=""><img class="pull-right"src="../../img/facebook_01.png" alt=""></a>&nbsp;
          <font face="Nonito" color="7F7F7F"class="pull-right"></font>&nbsp;&nbsp;
        </div>
        <br>
      </div>
    </div>
    <!--fin navbar -->
     <form name="Medidas" action="" method="get">
      <input type="hidden" value=" <?php echo $_SESSION['Numero_documento']; ?>" id="id_persona">
      <input type="hidden" value="1" id="Medida" name="Medida">
      </form> 
     <?php
      include'../../Datos/RegistroMedida/RegistroMedidaDao.php';
      include'../../Datos/Persona/PersonaDAO.php';
      $Persona= new PersonaDAO();
      $RegistroMedida= new RegistroMedidaDao();
      $RegistrosTemp=$RegistroMedida->ContarMedidas_Usuario($_SESSION['Numero_documento']);
      if ($RegistrosTemp>0) {
          $Persona->ObtenerPersona($_SESSION['Numero_documento']);
          $RegistroMedida->ObtenerRegistrosdeMedida($_SESSION['Numero_documento'],1);
      }
      else{
        echo "Usuario "."'".$_SESSION['usuario']."'"." No Tiene Registros de Medida !!!";
      }
      
      ?>
     
    <!--Div para Cargar Contenido Dinamico-->
     <label>Medidas</label>
     <br>
     <?php 
      include'../../Datos/Medida/MedidaDAO.php';
      $Medida = new MedidaDAO();
      $Medida->ObtenerMedidas();
      for ($i=0; $i <count($Medida->id_medida) ; $i++) { 
      ?>
        <input type="radio" name="group"  value="<?php echo $Medida->id_medida[$i]; ?>"> <?php echo $Medida->nombre_medida[$i]; ?>
         <br>
      <?php 
      }
      ?>
      <br>
      <label>Acciones</label>
      <input type="button" id="Consultar" value="Consultar" id="Consultar"> 
      <div id="grafica">
        
      </div>
    <!--Fin Div de Cargar Contenido Dinamico-->
<hr><!--Separa el contenido de el pie de la pagina-->
</div>
<!--Scripts requeridos-->
<!--Scripts requeridos-->
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.min.js"></script><!--botones,link desplegables-->
<script src="../../js/bootstrap-transition.js"></script>
<script src="../../js/highcharts.js"></script>
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
</body>
</html>