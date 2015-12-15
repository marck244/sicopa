/* script validacion para DUI INICIO */

/**************************************************************
****************************************************************/
		var arraydigitosdui = new Array(8,1)
			function mascaradui(d,sep,pat,nums){
				if(d.valant != d.value){
						val = d.value
						largo = val.length
						val = val.split(sep)
						val2 = ''
				for(r=0;r<val.length;r++){
						
						val2 += val[r]	
			}
				if(nums){
					for(z=0;z<val2.length;z++){
						if(isNaN(val2.charAt(z))){

						letra = new RegExp(val2.charAt(z),"g")
						val2 = val2.replace(letra,"")
			}
		}
	}
						val = ''
						val3 = new Array()
				for(s=0; s<pat.length; s++){

						val3[s] = val2.substring(0,pat[s])
						val2 = val2.substr(pat[s])
	}
				for(q=0;q<val3.length; q++){
					if(q ==0){
						val = val3[q]
			}
				else{
					if(val3[q] != ""){

						val += sep + val3[q]
				}
		}
	}
						d.value = val
						d.valant = val
	}

	buscarClienteCuentas();// solo para: v_calculoPago.php
}
/**************************************************************
****************************************************************/
	/* script validacion para DUI FIN */













	 
/***script validacion para NIT INICIO***********************************************************
****************************************************************/
		var arraydigitosnit = new Array(4,6,3,1)
			function mascaranit(d,sep,pat,nums){
				if(d.valant != d.value){
						val = d.value
						largo = val.length
						val = val.split(sep)
						val2 = ''
				for(r=0;r<val.length;r++){
						
						val2 += val[r]	
			}
				if(nums){
					for(z=0;z<val2.length;z++){
						if(isNaN(val2.charAt(z))){

						letra = new RegExp(val2.charAt(z),"g")
						val2 = val2.replace(letra,"")
			}
		}
	}
						val = ''
						val3 = new Array()
				for(s=0; s<pat.length; s++){

						val3[s] = val2.substring(0,pat[s])
						val2 = val2.substr(pat[s])
	}
				for(q=0;q<val3.length; q++){
					if(q ==0){
						val = val3[q]
			}
				else{
					if(val3[q] != ""){

						val += sep + val3[q]
				}
		}
	}
						d.value = val
						d.valant = val
	}
}
/**************************************************************
****************************************************************/
	/********** script validacion para NIT FIN ******/

/*  Hora del Sistema */
var horaServidor = function () {
        // Do stuff
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("timeServer").innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("GET", "../conexion/timetime.php", true);
        xhttp.send();
    };
setInterval(horaServidor, 1000);