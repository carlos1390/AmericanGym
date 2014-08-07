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
								
								<li><a href="#">CONSULTAR</a></li>
								
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
            <div class="row-fluid">
	         	<?php
	         	$meses = array (1 => 'Enero', 'Febrero', 'Marzo', 'Abril','Mayo','Junio', 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
                extract($_GET);
                require_once '../../Datos/Persona/PersonaDAO.php';
                require_once '../../Datos/Departamento/DepartamentoDAO.php';
                require_once '../../Datos/Genero/GeneroDao.php';

                $Persona= new PersonaDAO();               
                $Departamento= new DepartamentoDAO();
                $Genero= new GeneroDao();               


                $Persona->ObtenerPersona($_SESSION['Numero_documento']);
                $Departamento->obteberdepartamentos();
                $Genero->ObtenerGeneros();
                ?>
                <?php
                for ($i=0;$i<count($Persona->NumeroDocumento);$i++){
                    	?>
                <form action="../../Negocios/Persona/EditarPersona.php" method="post" onsubmit = " return validateForm();" enctype="multipart/form-data">
                    	<input type="hidden" value="<?php echo $Persona->Fotografia[$i]; ?>" name="fotografiaTemp"> 
                    	<input type="hidden" value="<?php echo $Persona->NumeroDocumento[$i]; ?>" name="id_persona"> 
                    	<label>Nombres:</label>
                    	<input type="text" name="name" id="name" value="<?php echo $Persona->Nombres[$i]; ?>"><br>
                    	<label>Apellidos:</label>
                    	<input type="text" name="lastname" id="lastname" value="<?php echo $Persona->Apellidos[$i]; ?>"><br>
                    	<label>Genero</label>
                    	<select id="id_genero" name="id_genero">
                    		<option value="<?php echo $Persona->IdGenero[$i]; ?>">
                    			<?php echo $Persona->NombreGenero[$i]; ?>
                    		</option>
                    		<?php 
                               for ($k=0; $k <count($Genero->idgenero) ; $k++) { 
                                 echo '<option value="'.$Genero->idgenero[$k].'">'.$Genero->nombre[$k].'</option>';
                               }
                    		 ?>
                    	</select><br>
                    	<label>Fecha Nacimiento:</label>
                    	<input type="text" name="fecha_nac" id="fecha_nac" value="<?php echo $Persona->FechaNacimiento[$i]; ?>"><br>
                    	<label>Direccion:</label>
                    	<input type="text" name="direccion" id="direccion" value="<?php echo $Persona->Direccion[$i]; ?>"><br>
                    	<label>Numero de Telefono:</label>
                    	<input type="text" name="phone_personal" id="phone_personal" value="<?php echo $Persona->Telpersonal[$i]; ?>"><br>
                    	<label>Correo Electronico:</label>
                    	<input type="text" name="email" id="email" value="<?php echo $Persona->Email[$i]; ?>"><br>
                    	<label>Departamento</label>
                    	<select id="departamento" name="departamento" onChange="CargarMunicipio(3);">
                    		<?php 
                               for ($j=0; $j <count($Departamento->iddepartamento) ; $j++) { 
                                 echo '<option value="'.$Departamento->iddepartamento[$j].'">'.$Departamento->nombre[$j].'</option>';
                               }
                    		 ?>
                    	</select><br>
                    	<label>Municipio</label>
                    	<select id="municipio" name="municipio">
                    		<option value="<?php echo $Persona->IdMunicipio[$i]; ?>">
                    			<?php echo $Persona->NombreMunicipio[$i]; ?>
                    		</option>
                    	</select><br>
                      <label>Fotografia</label><input type="file" name="fotografia" id="fotografia"><br> 
                    <input type="submit" value="Actualizar" class="btn"> 
                </form> 
                <?php
                  }
                ?>  
            </div>
	        <!--Fin Div de Cargar Contenido Dinamico-->
<br>
	<hr><!--Separa el contenido de el pie de la pagina-->
</div>
</div>
<!--Scripts requeridos-->
 <script src="../../js/jquery.js"></script>
  <script src="../../js/bootstrap.min.js"></script><!--botones,link desplegables-->
  <script src="../../js/bootstrap-transition.js"></script>
  <link rel="stylesheet" href="../../CSS/Calendar_Style.css">
  <script src="../../JS/jquery.js" type="text/javascript"></script>
  <script src="../../JS/jquery_calendar.js"></script>
  <script src="../../JS/jquery.ui.datepicker-es.js"></script>
  <script src="../../JS/jqueryvalidation.js"></script>
  <script type="text/javascript">
    function validateForm () {
      var nombre = document.getElementById("name");
      var apellidos= document.getElementById("lastname");
      var genero= document.getElementById("id_genero");
      var fecha_nac= document.getElementById("fecha_nac");
      var direccion= document.getElementById("direccion");
      var phone_personal= document.getElementById("phone_personal");
      var email= document.getElementById("email");
      var municipio= document.getElementById("municipio");
      var fotografia= document.getElementById("fotografia");
          if(notEmpty(nombre,"Campo Nombre obligatorio"))
          {
          	if(notEmpty(apellidos,"Campo Apellidos obligatorio"))
            {
            	if (notSelected(genero,"Seleccion de Genero obligatoria"))
                {
                  if(notEmpty(fecha_nac,"Campo Fecha de Nacimiento obligatorio")&&dateValidator(fecha_nac,"Formato de Fecha no Valido"))
                  {
                  	if(notEmpty(direccion,"Campo Direccion obligatorio"))
                    {
                      if(notEmpty(phone_personal,"Campo Numero de Telefono Personal obligatorio"))
                      {
                      	 if(notEmpty(email,"Campo Email obligatorio")&& emailValidator(email,"Por favor ingrese un Email valido"))
                         {
                        	return true;
                         }
                      }
                    }
                  }
               }
            }
          }
      return false;
    }
    $(document).ready(function () {
    	$(function() {
           $("#fecha_nac").datepicker({ dateFormat:'yy-mm-dd',changeMonth: true,changeYear: true,yearRange: "-60:+0" });
        });
    });
    function CargarMunicipio(combo)
       {
         $('#municipio').html('<option selected>Cargando...</option>');
         var id_departamento= $('#departamento').val() 
         if(combo==3)
         {
           var toLoad= '../../Datos/Municipio/ObtenerMunicipios.php?departamento='+id_departamento;
           $.post(toLoad,function (responseText){$('#municipio').html(responseText);});
         }
       }
</script>
</body>
</html> 