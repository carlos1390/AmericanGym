//fuciio de validacion para select obligatorio
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
//funcion de validacion para campo vacio
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
//fin codigo validacio campo vacio
//codigo de validacion de correo electronico
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
//fin codigo de validacion correo
//*** Este Codigo permite Validar que sea un campo Numerico
function Solo_Numerico(variable) {
    Numer = parseInt(variable);
    if (isNaN(Numer)) {
        return "";
    }
    return Numer;
}
function ValNumero(Control) {
    Control.value = Solo_Numerico(Control.value);
}
//*** Fin del Codigo para Validar que sea un campo Numerico