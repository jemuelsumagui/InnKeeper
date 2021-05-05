// JavaScript Document

//var interruttore = false;

function accendiDivSpento(idDaSpegnere) {
	var x = document.getElementById(idDaSpegnere);
	//alert(x.className);
	if (x.className == "div_accesso") {
		x.className = "div_spento";
	} else {
		x.className = "div_accesso";
	}
}


async function getUtente(userId) {
    try {
       let response = await fetch("test.html?u=" + userId);
       console.log(response);
		   if(response.ok) {
    console.log(response.blob());
  }

    } catch (e) {
       console.log("Si è verificato un errore!");
    }
 }