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
					    <h4>Gestion Registro de Medidas</h4>
						<?php
                         extract($_GET);
                         require_once '../../Datos/UnidadMedida/UnidadMedidaDao.php';
                         require_once '../../Datos/Medida/MedidaDAO.php';
                         $Unidad= new UnidaddeMedidaDao();
                         $Unidad->ObtenerUnidaddeMedidas();
                         $MedidaTemp= new MedidaDAO();
                         $MedidaTemp->ObtenerMedidas();
                        ?>
                        <form action="../../Negocios/RegistroMedida/Insertar.php" method="post" onsubmit="return validateForm()" ;>
  	                      <label>Cliente:</label><input type="text" name="numero_docu" id="numero_docu" placeholder="Ingrese NumeDocumento">
  	                      <img src="../../img/search.png" alt="Buscar Cliente" title="Buscar Cliente" onClick="BuscarCliente()">
  	                      <br>
  	                      <label>Nombre:</label>
  	                      <select id="id_persona" name="persona">
  	                      	<option value="0">---Seleccione---</option>
  	                      </select>
  	                      <br>
  	                      <label>Medida:</label>
  	                      <select id="variable" name="variable">
  	                      	<option value="0">---Seleccione---</option>
  	                      	<?php
  	                      	   for ($j=0; $j <count($MedidaTemp->id_medida) ; $j++) { 
  	                      	   	echo '<option value="'.$MedidaTemp->id_medida[$j].'">'.$MedidaTemp->nombre_medida[$j].'</option>';
  	                      	   }
  	                      	  ?>
  	                      </select>
  	                       <br> 
  	                       <label>Valor:</label><input type="text" name="valor"id="valor" placeholder="Ingrese Valor de Medida">
  	                       <br>
  	                         <input type="submit" value="Guardar" class="btn">
                         </form>
						</div>
				</div>
		<!--Tabla-->
		<!--Paginador-->

	
</div>
<!--Scripts requeridos-->
<script type="text/javascript">
    function validateForm () {
      var id_persona = document.getElementById("id_persona");
      var variable= document.getElementById("variable");
      var valor= document.getElementById("valor");
      if (notSelected(id_persona,"Seleccion de Cliente obligatoria"))
          {
              if(notSelected(variable,"Seleccion de Campo Variable obligatoria"))
                {
                    if(notEmpty(valor,"Campo Valor obligatorio"))
                     {
                        	return true;
                     }
                }
                
            }
        return false;
    }
    function notEmpty(elem, helperMsg)
    {
      if(elem.value.length == 0)
      {
        alert(helperMsg);
        elem.focus(); // Devuelvo al usuario al input
        return false;
      }
        return true;
    }
    function notSelected (elem,helperMsg)
     {
       if (elem.value==0) 
        {
          alert(helperMsg);
          elem.focus(); 
          return false;
        }
        return true;
    }
	function BuscarCliente () {
		$('#id_persona').html('<option selected>Cargando..</option>');
		var number_document=$('#numero_docu').val();
		var toLoad='../Cartera/ajaxCartera.php?numero_docu='+number_document;
		$.post(toLoad,function (ResponseText) {$('#id_persona').html(ResponseText);} );
	   
	}
</script>
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.min.js"></script><!--botones,link desplegables-->
<script src="../../js/bootstrap-transition.js"></script>
</body>
</html>