
//Balidatu ERREGISTRATU
function balidatuE(f)
{
	// Formularioko balioak irakurri
	var izena = f.erabiltzailea.value;
	var eposta = f.emaila.value;
	var pasahitza = f.pasahitza.value;
	
	// Ziurtatu beteta egon behar diren eremuak beteta daudela.
	var errorea = "";
	if(izena==="")
		errorea += "\tErabiltzaile izena bete behar duzu.\n";
	if(pasahitza==="")
		errorea += "\tPasahitza eremua bete behar duzu.\n";
	
	// Ziurtatu eposta helbidearen formatua zuzena dela.
	if(eposta !== "")
		errorea +=helbide_formatua(eposta);
	else errorea+="\te-mail eremua betetzea beharrezkoa da";	
	// Errorerik badago, mezua erakutsi.
	if(errorea !== "")
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
	if(izena==="")
		errorea += "\tErabiltzaile izena bete behar duzu.\n";
	if(pasahitza==="")
		errorea += "\tPasahitza eremua bete behar duzu.\n";
	
	// Errorerik badago, mezua erakutsi.
	if(errorea!=="")
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
	if(izena==="")
		errorea += "\tErabiltzaile izena bete behar duzu.\n";
	if(emaila==="")
		errorea += "\tZure e-mail kontua beharrezkoa zaigu.\n";
	
	else errorea+=helbide_formatua(emaila);

	// Errorerik badago, mezua erakutsi.
	if(errorea!=="")
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
	if(helbidea.indexOf("@") === 0)
		errorea+="\t  # @ karakterea ezin da lehenengoa izan. \n";
	// Ziurtatu '@' karakterearen ondoren '.' karaktereren bat badagoela.
	if(helbidea.lastIndexOf(".") < helbidea.lastIndexOf("@"))
		errorea+="\t  # @ karakterea ondoren punturen bat egon behar da. \n";
	// Ziurtatu azkeneko puntuaren atzetik gutxienez beste 2 karaktere daudela.
	if(helbidea.lastIndexOf(".") + 2 > helbidea.length - 1)
		errorea+="\t  # Puntua ondoren gutxienez bi karaktere beharrezkoak dira.\n";
	// Ziurtatu hutsunerik ez dituela
	if(helbidea.split(" ").length>1)
		errorea+="\t  # Ezin ditu hutsunerik izan. \n";
	// Ziurtatu komarik ez dela agertzen
	if(helbidea.split(",").length>1)
		errorea+="\t  # Ezin ditu komarik izan. \n";
	
	return errorea;
}


function pelikula_balidatu(f)
{
	//var jabea = f.jabea.value; //EZ DA FORMULARIOTIK JASO BEHAR -> SESSION KONTROLA (php)
	var izena = f.izena.value; 
	//var data = date("Y-m-d h:i:sa"); //EZ DA FORMULARIOTIK JASO BEHAR (php)
	var trailer = f.trailer_url.value; // EZ DA DERRIGORREZKOA baina balidatu behar da
	var esteka = f.esteka.value;
	var argazki = f.argazki_url.value; // EZ DA DERRIGORREZKOA baina balidatu behar da
	var laburpen = f.laburpena.value; // EZ DA DERRIGORREZKOA
	var hizkuntza = f.hizkuntza.value; // EZ DA DERRIGORREZKOA
	var generoa = f.generoa.value; // EZ DA DERRIGORREZKOA


	var errorea = "";

    //Pelikularen izena sartu dela egiaztatu
	if(izena===""){
		errorea += "\tPelikularen izena bete behar duzu.\n";
	}
    
    //Trailerraren URL-a sartu bada, egiaztatu formatu egokia duela
	if(trailer!=="" && trailer.split(".").length < 2){
		errorea+="\t  # Trailerraren URL-an, puntua ('.') behin gutxienez agertu behar da. \n";
	}
	else if(trailer!=="" && trailer.lastIndexOf(".") + 2 > trailer.length - 1){
	    errorea+="\t  # Trailerraren URL-an, azken puntua ondoren gutxienez bi karaktere beharrezkoak dira. \n";
	}
	else if(trailer!=="" && trailer.split(" ").length>1){
		errorea+="\t  # Trailerraren URL-ak ezin ditu hutsunerik izan. \n";
	}
	else if(trailer!=="" && trailer.split(",").length>1){
		errorea+="\t  # Trailerraren URL-ak ezin ditu komarik izan. \n";
	}

	
	//Esteka sartu dela eta formatu egokian sartu dela egiaztatu	
	if(esteka===""){
		errorea += "\tPelikularen esteka beharrezkoa da.\n";
	}
	else if(esteka.split(".").length < 2){
	    errorea+="\t  · Pelikularen estekan, puntua ('.') behin gutxienez agertu behar da. \n";
	}
	else if(esteka.lastIndexOf(".") + 2 > esteka.length - 1){
	    errorea+="\t  · Pelikularen estekan, azken puntua ondoren gutxienez bi karaktere beharrezkoak dira. \n";
	}
	else if(esteka.split(" ").length>1){
		errorea+="\t  · Pelikularen estekak ezin ditu hutsunerik izan. \n";
	}
	else if(esteka!=="" && esteka.split(",").length>1){
		errorea+="\t  · Pelikularen estekak ezin ditu komarik izan. \n";
	}

	
	//Argazkiaren URL-a sartu bada, egiaztatu formatu egokia duela
	if(argazki!=="" && argazki.split(".").length < 2){
		errorea+="\t  - Argazkiaren URL-an, puntua ('.') behin gutxienez agertu behar da. \n";
	}
	else if(argazki!=="" && argazki.lastIndexOf(".") + 2 > argazki.length - 1){
	    errorea+="\t  - Argazkiaren URL-an, azken puntua ondoren gutxienez bi karaktere beharrezkoak dira. \n";
	}
	else if(argazki!=="" && argazki.split(" ").length>1){
		errorea+="\t  - Argazkiaren URL-ak ezin ditu hutsunerik izan. \n";
	}
	else if(argazki!=="" && argazki.split(",").length>1){
		errorea+="\t  - Argazkiaren URL-ak ezin ditu komarik izan. \n";
	}
	
	//Laburpena, hizkuntza eta generoa sartzea librea da.
	

	if(errorea !=="")
	{
		alert("Formularioa ez duzu ondo bete:\n" + errorea);
		return false;
	}
	else
		return true;


}

function balidatu_iruzkina(f)
{
	var iruzkina = f.iruzkina.value;

	var errorei = "";

	if(iruzkina=="")
		errorei += "\tIruzkina bete behar duzu.\n";

	if(errorei !="")
	{
		alert("Formularioa ez duzu ondo bete:\n" + errorei);
		return false;
	}
	else
		return true;
}

