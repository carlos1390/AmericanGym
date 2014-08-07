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
	        <br>
	        <!--Div para Cargar Contenido Dinamico-->
            <div class="row-fluid ">
            		<div class="span12 well">
	         	<?php
	         	$meses = array (1 => 'Enero', 'Febrero', 'Marzo', 'Abril','Mayo','Junio', 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
                extract($_GET);
                require_once '../../Datos/Persona/PersonaDAO.php';
                require_once '../../Datos/Departamento/DepartamentoDAO.php';

                $Persona= new PersonaDAO();               
                $Departamento= new DepartamentoDAO();               

                $Persona->ObtenerPersona($_SESSION['Numero_documento']);
                $Departamento->obteberdepartamentos();
                
                
                ?>
               
                 <div class="row-fuid">                	
                	<div class="span4"></div>
                	<div class="span6" > 

                <form action="EditarPersona.php" method="post" class="form-inline " >
                <?php
                    for ($i=0;$i<count($Persona->NumeroDocumento);$i++){
                    	$fecha_nac= explode("-", $Persona->FechaNacimiento[$i]);
                    	$mes_temp;
                    	if(substr($fecha_nac[1],0,1)=="0"){
                    		$mes_temp=substr($fecha_nac[1],1,1);
                    	}
                    	else{
                    		$mes_temp=$fecha_nac[1];
                    	}
                ?>

                    	<br>
                          
                <img class="img-polaroid" src="../../Fotografias/<?php echo $Persona->Fotografia[$i] ?>"><br><br>
                <label><font size=4><b>Nombres:</b></font></label><label><?php echo $Persona->Nombres[$i] ?></label><br>
                <label><font size=4><b>Apellidos:</b></font></label><label><?php echo $Persona->Apellidos[$i] ?></label><br>
                <label><font size=4><b>Genero:</b></font></label><label><?php echo $Persona->NombreGenero[$i] ?></label><br>
                <label><font size=4><b>Fecha de Nacimiento:</b></font></label><label><?php echo $fecha_nac[2]."de ".$meses[$mes_temp]." del ".$fecha_nac[0]; ?></label><br>
                <label><font size=4><b>Lugar de residencia:</b></font></label><label><?php echo $Persona->NombreMunicipio[$i] ?></label><br>
                <label><font size=4><b>Direccion:</b></font></label><label><?php echo $Persona->Direccion[$i] ?></label><br>
                <label><font size=4><b>Numero de telefono:</b></font></label><label><?php echo $Persona->Telpersonal[$i] ?></label><br>
                <label><font size=4><b>Correo Electronico:</b></font></label><label><?php echo $Persona->Email[$i] ?></label><br>
                	<input type="submit" value="Editar" class="btn">
                	<?php 
                }
                ?>
                </form>
                </div>
                 <div class="span3"></div>
                </div>
                 
               </div>
               </div>
<!--Scripts requeridos-->
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.min.js"></script><!--botones,link desplegables-->
<script src="../../js/bootstrap-transition.js"></script>
</body>
</html>