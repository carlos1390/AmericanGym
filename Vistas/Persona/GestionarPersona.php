<?php $number_doc="";$names="";$lastname="";$date_nac="";$address=""; $phone_personal="";$phone_friend="";$date_ing="";$objetive="";$email_temp="";$observations="";?>
<!doctype html>
    <!DOCTYPE html>
    <!doctype html>
    <html lang="es">
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
              <h4>Gestionar Persona</h4>
            </div>


            <?php
extract($_GET);
  require_once '../../Datos/Departamento/DepartamentoDAO.php';
  require_once '../../Datos/TipoDocumento/TipoDocumentoDAO.php';
  require_once '../../Datos/Genero/GeneroDao.php';
  require_once '../../Datos/Eps/EpsDAO.php';
  require_once '../../Datos/Ocupacion/OcupacionDAO.php';
  require_once '../../Datos/Horario/HorarioDao.php';
  require_once '../../Datos/Biotipo/BiotipoDao.php';
  require_once '../../Datos/Perfil/PerfilDAO.php';
  
  $Departamento= new DepartamentoDAO();
  $TipoDocumento= new TipoDocumentoDao();
  $Genero= new GeneroDao();
  $Eps= new EpsDAO();
  $Ocupacion= new OcupacionDAO();
  $Horario= new HorarioDao();
  $Biotipo= new BiotipoDao();
  $Perfil= new PerfilDAO();
  $TipoDocumento->ObtenerTiposDocumentos();
  $Departamento->obteberdepartamentos();
  $Genero->ObtenerGeneros();
  $Eps->obteberepss();
  $Ocupacion->obteberocupaciones();
  $Horario->ObtenerHorarios();
  $Biotipo->ObtenerBiotipos();
  $Perfil->obteberperfiles();
  if (empty($idpersona)) {
  ?>
  <div class="row-fluid">
    <div class="span2"></div>
    <div class="span8">
      
    
  <form action="../../Negocios/Persona/Insertar.php" method="post" onsubmit = " return validateForm();" enctype="multipart/form-data">
    <div align="center">
      <table class="table-condensed">
        <tr >
   <td  align="right"  > Nombre:</td>
    <td  align="left" ><input type="text" name="nombres" id="nombres" autofocus="autofocus" placeholder="Ingrese Texto" maxlength="50" value="<?php echo $names; ?>"></td>
   </tr>
   <tr>
     <td align="right">Apellidos:</td>
     <td> <input type="text" name="apellidos"  id="apellidos" placeholder="Ingrese Texto" maxlength="50" value="<?php echo $lastname; ?>"></td>
   </tr>
   <tr>
     <td align="right">Documento de Identidad:</td>
     <td><select id="tipo_documento" name="tipo_documento" align="right">
      <option value='0'>....seleccione....</option>
        <?php
            for ($i=0;$i<count($TipoDocumento->idtipodocumento);$i++) 
            {
              echo '<option value="'.$TipoDocumento->idtipodocumento[$i].'">'.$TipoDocumento->nombre[$i].'</option>';
            }
       ?>
    </select></td>
   </tr>
<tr>
  <td align="right">Numero de Documento :</td>
  <td><input type="text" name="numero_documento" id="numero_documento" placeholder="Ingrese Numeros" maxlength="12" onkeyUp = "return ValNumero(this);" value="<?php echo $number_doc; ?>"></td>
</tr>
<tr>
  <td align="right">Genero:</td>
  <td> <select id="genero" name="genero" >
      <option value='0' >....seleccione....</option>
        <?php
            for ($i=0;$i<count($Genero->idgenero);$i++) 
            {
              echo '<option value="'.$Genero->idgenero[$i].'">'.$Genero->nombre[$i].'</option>';
            }
       ?>
    </select></td>
</tr>
<tr>
  <td align="right">Fecha Nacimiento:</td>
  <td> <input type="text" placeholder="Año/mes/dia" name="fecha_nac" id="fecha_nac" value="<?php echo $date_nac; ?>">
    <br></td>
</tr>
<tr>
  <td align="right">Direccion:</td>
  <td><input type="text" name= "direccion" id="direccion" placeholder="Ingrese Texto" maxlength="100" value="<?php echo $address; ?>"> </td>
</tr>
<tr>
  <td align="right">Telefono Personal:</td>
  <td><input type="text" name= "tel_personal"  id="tel_personal" placeholder="Ingrese Numeros" maxlength="15" onkeyUp = "return ValNumero(this);" value="<?php echo $phone_personal; ?>"> </td>
</tr>
<tr>
  <td align="right">Telefono Acudiente:</td>
  <td> <input type="text" name= "tel_acudiente" id="tel_acudiente"placeholder="Ingrese Numeros" maxlength="15" onkeyUp = "return ValNumero(this);" value="<?php echo $phone_friend; ?>"> </td>
</tr>
<tr>
  <td align="right">Eps:</td>
  <td><select id="eps" name="eps">
      <option value='0' >....seleccione....</option>
      <?php 
         for ($i=0; $i <count($Eps->ideps) ; $i++) { 
           echo '<option value="'.$Eps->ideps[$i].'">'.$Eps->nombre[$i].'</option>';
         }
       ?>
    </select></td>
</tr>
<tr>
  <td align="right">Estado Civil:</td>
  <td>     <select id="estado_civil" name="estado_civil">
      <option value='0' >....seleccione....</option>
      <option value="Casado">Casado</option>
      <option value="Soltero">Soltero</option>
      <option value="No Aplica">No Aplica</option>
    </select>
</td>
</tr>
<tr>
  <td align="right"> Perfil:</td>
  <td><select id="perfil" name="perfil">
      <option value='0' >....seleccione....</option>
      <?php 
         for ($i=0; $i <count($Perfil->idperfil) ; $i++) { 
           echo '<option value="'.$Perfil->idperfil[$i].'">'.$Perfil->nombre[$i].'</option>';
         }
       ?>
    </select></td>
</tr>
<tr>
  <td align="right">Ocupacion:</td>
  <td><select id="ocupacion" name="ocupacion">
      <option value='0' >....seleccione....</option>
      <?php 
         for ($i=0; $i <count($Ocupacion->idocupacion) ; $i++) { 
           echo '<option value="'.$Ocupacion->idocupacion[$i].'">'.$Ocupacion->nombre[$i].'</option>';
         }
       ?>
    </select></td>
</tr>
<tr>
  <td align="right">Departamento  de Residencia:</td>
  <td><select id="departamento" name="departamento" onChange="CargarMunicipio(3);" >
      <option value='0' >....seleccione....</option>
        <?php
            for ($i=0;$i<count($Departamento->iddepartamento);$i++) 
            {
              echo '<option value="'.$Departamento->iddepartamento[$i].'">'.$Departamento->nombre[$i].'</option>';
            }
       ?>
    </select></td>
</tr>
<tr>
  <td align="right"> Municipio de Residencia:</td>
  <td><select id="municipio" name="municipio">
      <option value='0' >....seleccione....</option>
    </select></td>
</tr>
<tr>
  <td align="right"> Horario:</td>
  <td><select id="horario" name="horario">
      <option value='0' >....seleccione....</option>
      <?php 
         for ($i=0; $i <count($Horario->idhorario) ; $i++) { 
           echo '<option value="'.$Horario->idhorario[$i].'">'.$Horario->nombre[$i].'</option>';
         }
       ?>
    </select></td>
</tr>
<tr>
  <td align="right">Fecha Ingreso:</td>
  <td><input type="text"  placeholder="Año/mes/dia" name="fecha_ing" id="fecha_ing" value="<?php echo $date_ing; ?>"></td>
</tr>
<tr>
  <td align="right">Biotipo:</td>
  <td><select name="biotipo" id="biotipo">
      <option value='0' >....seleccione....</option>
      <?php 
      for ($i=0; $i <count($Biotipo->idbiotipo) ; $i++) { 
         echo '<option value="'.$Biotipo->idbiotipo[$i].'">'.$Biotipo->nombre[$i].'</option>';
       } 
       ?>
    </select></td>
</tr>
<tr>
  <td align="right">Objetivo:</td>
  <td><textarea name="objetivo"  id="objetivo" cols="22" rows="4" placeholder="Ingrese Texto" maxlength="250" align="right" ><?php echo $objetive;?></textarea></td>
</tr>
<tr>
  <td align="right">Fotografia:</td>
  <td><input type="file" name="fotografia" id="fotografia"></td>
</tr>
<tr>
  <td align="right">Correo Electronico:</td>
  <td><input type="text" name="email" id="email" value="<?php echo $email_temp; ?>"></td>
</tr>
<tr>
  <td align="right">Grupo Sanguineo:</td>
  <td> <select name="grupo_sanguineo" id="grupo_sanguineo">
      <option value='0' >....seleccione....</option>
      <option value="O+">O+</option>
      <option value="A-">A-</option>
      <option value="O-">O-</option>
      <option value="B+">B+</option>
    </select></td>
</tr>
<tr>
  <td align="right">Observaciones:</td>
  <td><textarea name="observaciones" id="observaciones" cols="22" rows="4" placeholder="Ingrese Texto" maxlength="250"><?php echo $observations; ?></textarea></td>
</tr>
<tr>
  <td></td>
  <td ><input type="submit" value="Guardar" class="btn"></td>
</tr>

 </table>
   
          
     </div>
  </form>
  </div>
  </table>
  <div class="span2"></div>
  </div>
  <?php
  }
?>  

            
        </div>
        <!--Tabla-->

        <!--Fin contenido variable-->
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
    <script>
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
    function dateValidator (elem, helperMsg) {
      if (elem.value.length!=10) 
      {
        alert(helperMsg);
        elem.focus();
        return false;
      }
      return true;
    }
    function emailValidator(elem, helperMsg)
    {
    var correoexp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(elem.value.match(correoexp))
    {
     return true;
    }
     else
    {
     alert(helperMsg);
     elem.focus();
     return false;
     }
    }
    $(function() {
      $("#fecha_nac").datepicker({ dateFormat:'yy-mm-dd',changeMonth: true,changeYear: true,yearRange: "-60:+0" });
      $("#fecha_ing").datepicker({ dateFormat:'yy-mm-dd',changeMonth: true,changeYear: true,yearRange: "-10:+60" });
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
    function validateForm () {
      var nombre = document.getElementById("nombres");
      var apellidos= document.getElementById("apellidos");
      var tipo_documento= document.getElementById("tipo_documento");
      var numero_documento=document.getElementById("numero_documento");
      var genero=document.getElementById("genero");
      var fecha_nac=document.getElementById("fecha_nac");
      var direccion=document.getElementById("direccion");
      var tel_personal=document.getElementById("tel_personal");
      var tel_acudiente=document.getElementById("tel_acudiente");
      var eps=document.getElementById("eps");
      var estado_civil=document.getElementById("estado_civil");
      var perfil=document.getElementById("perfil");
      var ocupacion=document.getElementById("ocupacion");
      var departamento=document.getElementById("departamento");
      var municipio=document.getElementById("municipio");
      var horario=document.getElementById("horario");
      var fecha_ing=document.getElementById("fecha_ing");
      var biotipo=document.getElementById("biotipo");
      var objetivo=document.getElementById("objetivo");
      var email=document.getElementById("email");
      var grupo_sanguineo=document.getElementById("grupo_sanguineo");
      var observaciones=document.getElementById("observaciones");
      
      if(notEmpty(nombre,"Campo Nombre obligatorio"))
      {
        if(notEmpty(apellidos,"Campo Apellidos obligatorio"))
        {
           if (notSelected(tipo_documento,"Seleccion de Tipo de Documento obligatoria"))
            {
              if(notEmpty(numero_documento,"Campo Numero de Documento obligatorio"))
              {
                if (notSelected(genero,"Seleccion de Genero obligatoria"))
                {
                  if(notEmpty(fecha_nac,"Campo Fecha de Nacimiento obligatorio")&&dateValidator(fecha_nac,"Formato de Fecha no Valido"))
                  {
                    if(notEmpty(direccion,"Campo Direccion obligatorio"))
                    {
                      if(notEmpty(tel_personal,"Campo Telefono Personal obligatorio"))
                      { 
                        if(notEmpty(tel_acudiente,"Campo Telefono Acudiente obligatorio"))
                        {
                          if (notSelected(eps,"Seleccion de Eps obligatoria"))
                          {
                            if (notSelected(estado_civil,"Seleccion de Estado Civil obligatoria"))
                            {
                              if (notSelected(perfil,"Seleccion de Perfil obligatoria"))
                              {
                                if (notSelected(ocupacion,"Seleccion de Ocupacion obligatoria"))
                                {
                                  if (notSelected(departamento,"Seleccion de Departamento obligatoria")) 
                                  {
                                    if (notSelected(municipio,"Seleccion de Municipio obligatoria")) 
                                    {
                                      if (notSelected(horario,"Seleccion de Horario obligatoria")) 
                                      {
                                        if(notEmpty(fecha_ing,"Campo Fecha de Ingreso obligatorio")&&dateValidator(fecha_ing,"Formato de Fecha no Valido"))
                                        {
                                          if (notSelected(biotipo,"Seleccion de Biotipo obligatoria")) 
                                          {
                                            if(notEmpty(objetivo,"Campo Objetivo obligatorio"))
                                            {
                                              if(notEmpty(email,"Campo Email obligatorio")&& emailValidator(email,"Por favor ingrese un Email valido"))
                                              {
                                                if (notSelected(grupo_sanguineo,"Seleccion de Grupo Sanguineo obligatoria")) 
                                                {
                                                  if(notEmpty(observaciones,"Campo Observaciones obligatorio"))
                                                  {
                                                   return true;
                                                  }
                                                }
                                              }
                                            } 
                                          }
                                        }
                                      }
                                    }
                                  } 
                                }
                              }
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
        } 
      }
     return false; 
    }
    </script>
    <script type="text/javascript">
    function validateActualizacion() {
        var count = 0;
        var mydeficiencias = new Array();
        var src = document.getElementById("Deficiencias");
        var id_persona = document.getElementById("id_persona").value;
        var name_user = document.getElementById("name_user");
        var password = document.getElementById("password");

        if(notEmpty(name_user,"Campo Nombre de Usuario Obligatorio"))
        {
           if(notEmpty(password,"Campo Contraseña Obligatorio"))
           {
              if (src.options.length>0) {
                  $.each($('#Deficiencias option'), function (index, value) { // loop over each option
                    if (src.options[count].value != "") {
                    src.options[count].selected = true;
                    mydeficiencias[count]=src.options[count].value;
                   }
                    count++;
                 });
                 $.ajax({
                   url: '../../Negocios/Persona/Actualizar.php',
                   type: "GET",
                   data: "submit=&Deficiencias_Temp="+mydeficiencias+"&id_persona="+id_persona+"&name_user="+name_user.value+"&password="+password.value,
                   success: function(datos){
                     alert(datos);
                     var datosTemp=datos.substring(0,5);
                     if (datosTemp!="Error") {
                         window.location.replace("Index.php");
                     }
                    }
                 });
         
               }
              else{
              alert("Seleccion de Deficiencias Corporales Obligatoria");
               }
           }
        }  
    }
    $(document).ready(function () {
        var accion = "";
        $('#add').click(function () {

            accion = "agregar";
            listbox_moveacross("Filtrar", "Deficiencias");
        });
        $("#del").click(function () {

            accion = "borrar";
            listbox_moveacross("Deficiencias", "Filtrar");
        });
        function listbox_moveacross(sourceID, destID) {

            //$(boton).click(function () {
            var src = document.getElementById(sourceID);
            var dest = document.getElementById(destID);

            for (var count = 0; count < src.options.length; count++) {

                if (src.options[count].selected == true) {
                    var option = src.options[count];

                    var newOption = document.createElement("option");
                    newOption.value = option.value;
                    newOption.text = option.text;
                    newOption.selected = true;
                    try {
                        dest.add(newOption, null); //Standard
                        src.remove(count, null);
                    } catch (error) {
                        dest.add(newOption); // IE only
                        src.remove(count);
                    }
                    count--;
                }
            }
        }
        //}); //fin funcion click botton

    });
</script>
</body>
</html>































<!--real-->


<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  
</body>
</html>





















<!--Real-->


<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	
</head>
<body>

</body>
</html>