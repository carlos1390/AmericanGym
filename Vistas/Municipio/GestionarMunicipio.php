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
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">PERSONA<b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="../../Vistas/Persona/Index.php">Gestionar personas</a></li>
										<li><a href="../../Vistas/RegistroMedida/Index.php">Registar medidas</a></li>
										<li class="divider"></li>
									</ul>
								</li>
								<li><a href="../../Vistas/Cartera/Index.php">CARTERA</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">CONFIGURACION<b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="../../Vistas/TipoDocumento/Index.php">Tipo de documento</a></li>
										<li><a href="../../Vistas/Genero/Index.php">Genero</a></li>
										<li><a href="../../Vistas/Ocupacion/index.php">Ocupacion</a></li>
										<li><a href="../../Vistas/Perfil/index.php">Perfiles</a></li>
										<li><a href="../../Vistas/UnidadMedida/Index.php">Unidades de medida</a></li>
         								<li><a href="../../Vistas/Medida/Index.php">Medidas Corporales</a></li>
										<li><a href="../../Vistas/Biotipo/Index.php">Biotipos</a></li>
										<li><a href="../../Vistas/Eps/index.php">Eps</a></li>
										<li><a href="../../Vistas/ConceptoCartera/index.php">Conceptos de cartera</a></li>
										<li><a href="../../Vistas/Horario/Index.php">Horarios</a></li>
										<li><a href="../../Vistas/Municipio/Index.php">Municipios</a></li>
										<li><a href="../../Vistas/Departamento/Index.php">Departamentos</a></li>
										<li><a href="../../Vistas/DeficienciasCorporales/Index.php">Deficiencias Corporales</a></li>
										
										<li class="divider"></li>
									</ul>
								</li>
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
				<div class="row-fluid">
					
					<!--aqui contenido variable-->

					<div class="span12 well">
						<div class="page-header">
							<h4>Gestionar Municipios</h4>
						</div>

	<?php
extract($_GET);
  require_once '../../Datos/Departamento/DepartamentoDAO.php';
  $Departamento= new DepartamentoDAO();
  $Departamento->obteberdepartamentos();
  if (empty($idmunicipio)) {
  ?>
  <form action="../../Negocios/Municipio/Insertar.php" method="post">
  	<label>Departamento:</label>
    <select id="departamento" name="departamento">
      <option value="0">---seleccionar---</option>
        <?php
            for ($i=0;$i<count($Departamento->iddepartamento);$i++) 
            {
              echo '<option value="'.$Departamento->iddepartamento[$i].'">'.$Departamento->nombre[$i].'</option>';
            }
       ?>
    </select>
  	<br>
  	<label>Nombre:</label><input type="text" name="nombre">
  	<br>
  	<input type="submit" value="Guardar" class="btn">
  </form>
  <?php	
  }
  else
  {
   	 
    	include '../../Datos/Municipio/MunicipioDAO.php';
  	  $Municipio= new MunicipioDAO();
  	  $Municipio->ObtenerMunicipio($idmunicipio);
  ?>
  	  <form action="../../Negocios/Municipio/Actualizar.php" method="post">
      <input type="hidden" name="idmunicipio" value="<?php echo $idmunicipio;?>">
  	  <label>Departamento:</label>
      <select id="departamento" name="departamento">
        <?php
        print_r($Municipio->mun_id);
          for ($i=0;$i<count($Departamento->iddepartamento);$i++) 
            {
              if($Departamento->iddepartamento[$i]==$Municipio->iddepartamento[0])
                   {
                      echo '<option value="'.$Departamento->iddepartamento[$i].'" selected >'.$Departamento->nombre[$i].'</option>';
                  }  
                else 
                  {
                      echo '<option value="'.$Departamento->iddepartamento[$i].'">'.$Departamento->nombre[$i].'</option>';
                  }
            }
        ?>
    </select>
  	<br>
  	<label>Nombre:</label><input type="text" name="nombremunicipio" value="<?php echo $Municipio->nombremunicipio[0];?>">
  	<br>
  <input type="submit" value="Actualizar" class="btn">  
  </form>
  <?php
  }
?>
		</div>
		<!--Tabla-->

		
		<!--Paginador-->
		
		<!--Fin contenido variable-->
	</div>
	
</div>
<!--Scripts requeridos-->
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.min.js"></script><!--botones,link desplegables-->
<script src="../../js/bootstrap-transition.js"></script>
</body>
</html>