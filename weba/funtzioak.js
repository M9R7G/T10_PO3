
//Balidatu ERREGISTRATU
function balidatuE(f)
{
	// Formularioko balioak irakurri
	var izena = f.erabiltzailea.value;
	var eposta = f.emaila.value;
	var pasahitza = f.pasahitza.value;
	
	// Ziurtatu beteta egon behar diren eremuak beteta daudela.
	var errorea = "";
	if(izena=="")
		errorea += "\tErabiltzaile izena bete behar duzu.\n";
	if(pasahitza=="")
		errorea += "\tPasahitza eremua bete behar duzu.\n";
	
	// Ziurtatu eposta helbidearen formatua zuzena dela.
	if(eposta != "")
		errorea +=helbide_formatua(eposta);
	else errorea+="\te-mail eremua betetzea beharrezkoa da";	
	// Errorerik badago, mezua erakutsi.
	if(errorea !="")
	{
		alert("Formularioa ez duzu ondo bete:\n" + errorea);
		return false;
	}
	else
		return true;
}

//Balidatu LOGIN
function balidatuL(f) 
{
	// Formularioko balioak irakurri
	var izena = f.erabiltzailea.value;

	var pasahitza = f.pasahitza.value;
	
	// Ziurtatu beteta egon behar diren eremuak beteta daudela.
	var errorea = "";
	if(izena=="")
		errorea += "\tErabiltzaile izena bete behar duzu.\n";
	if(pasahitza=="")
		errorea += "\tPasahitza eremua bete behar duzu.\n";
	
	// Errorerik badago, mezua erakutsi.
	if(errorea !="")
	{
		alert("Formularioa ez duzu ondo bete:\n" + errorea);
		return false;
	}
	else
		return true;
}

//Balidatu PASAHITZAREN ESKAERA
function balidatuP(f)
{
	// Formularioko balioak irakurri
	var izena = f.erabiltzailea.value;

	var emaila = f.emaila.value;
	
	// Ziurtatu beteta egon behar diren eremuak beteta daudela.
	var errorea = "";
	if(izena=="")
		errorea += "\tErabiltzaile izena bete behar duzu.\n";
	if(emaila=="")
		errorea += "\tZure e-mail kontua beharrezkoa zaigu.\n";
	
	else errorea+=helbide_formatua(emaila);

	// Errorerik badago, mezua erakutsi.
	if(errorea !="")
	{
		alert("Formularioa ez duzu ondo bete:\n" + errorea);
		return false;
	}
	else
		return true;





}



// E-posta helbidearen formatua zuzena bada true itzultzen du eta false bestela.
function helbide_formatua(helbidea)
{
	var errorea = "";
	// Ziurtatu '@' karakterea behin, eta behin bakarrik, agertzen dela.
	if(helbidea.split("@").length != 2)
		errorea+="\t  # @ karakterea behin, eta behin bakarrik agertu behar da. \n";
	// Ziurtatu '@' karakterea ez dela lehena.
	if(helbidea.indexOf("@") == 0)
		errorea+="\t  # @ karakterea ezin da lehenengoa izan. \n";
	// Ziurtatu '@' karakterearen ondoren '.' karaktereren bat badagoela.
	if(helbidea.lastIndexOf(".") < helbidea.lastIndexOf("@"))
		errorea+="\t  # @ karakterea ondoren punturen bat egon behar da. \n";
	// Ziurtatu azkeneko puntuaren atzetik gutxienez beste 2 karaktere daudela.
	if(helbidea.lastIndexOf(".") + 2 > helbidea.length - 1)
		errorea+="\t  # Puntua ondoren gutxienez bi karaktere beharrezkoak dira.\n";
	return errorea;
}

// AJAX bidez 'id' parametroari dagokion iruzkin osoa eskatu eta dagokion gelaxkan idatzi. 
/*function iruzkin_osoa(id) 
{ 
	// Sortu XMLHttpRequest objektu bat (nabigatzailearen arabera modu ezberdina). 
	var xhr; 
	if(XMLHttpRequest) 
		xhr = new XMLHttpRequest(); 
	else 
		xhr = new ActiveXObject("Microsoft.XMLHTTP"); 
	 
	// Adierazi erabiliko den metodoa (GET), URLa (parametro eta guzti) eta eskaera asinkronoa izango den ala ez (true). 
	xhr.open('GET', 'iruzkin_osoa.php?id='+id, true); 
	// Eskaeraren egoera aldatutakoan egin beharrekoa. 
	xhr.onreadystatechange = function() 
	{ 
		// Egoera egokia bada (4 eta 200) dagokion elementuan idatzi zerbitzaritik jasotako testua. 
		if(xhr.readyState == 4 && xhr.status == 200) 
			document.getElementById(id).innerHTML = xhr.responseText;
	} 
	xhr.send('');	// Bidali AJAX eskaera. 
}
*/
