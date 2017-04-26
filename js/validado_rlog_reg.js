function vali()
{


var clave1,clave2,ncontrol;
//,correo;
	clave1=document.getElementById("pass").value;
	clave2=document.getElementById("pass2").value;
	ncontrol=document.getElementById("control").value;
	//correo=document.getElementById("email").value;
	
	
	
	if (clave1 != clave2) {
		alert('Error las contraseñas no coinciden');
      return false;
    }
	
	if(isNaN(ncontrol)){
		alert("El Numero de Control Debe de Ser un Numero");
		//document.getElementById("ncontrol").focus();
	return false;
	}
	/*
	if (/[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/.test(correo)==false ) {
	alert ('Correo no valido'); 
	document.getElementById("correo").focus();
	return false;
	}
	*/

}