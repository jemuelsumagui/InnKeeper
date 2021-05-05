<?php
	require_once('init.php');          //include una sola volta init.php

	$loginOk = checkLogin($_REQUEST['email'], $_REQUEST['password'], $link);
	
	if ($loginOk) {
		$_SESSION['isLogged'] = TRUE;
		$_SESSION['email'] = $_REQUEST['email'];
		header('Location: main.php');
	} else {
		header('Location: login.php?login=false');
	}


function checkLogin($email, $password, $link) {
	$ret = FALSE;  //di default è falso
	
	$query = "SELECT * FROM utenti WHERE utente_email='".$email."' AND utente_password='".$password."';";
    //seleziono dagli utenti tutte le tuple con l'email e la password richieste
	//echo 'Questa è la query: '.$query;
	
	if (!$rs = mysqli_query($link, $query)) {
		echo "errore";                            //se la query esce vuota da errore
		exit;
	}
	
	$num_row = mysqli_num_rows($rs);                  //numero di righe nel set risultante
	
	if ($num_row == 1) {                              //se la risultante è solo una riga
		$ret = TRUE;                                  //il return diventa vero
		$row = mysqli_fetch_assoc($rs);               
		$_SESSION['utente_id'] = $row['utente_id'];   //associo l'id utente salvato nel db alla sessione 
		
	}
	//$_SESSION['utente_id'] = '1';	
	mysqli_close($link);
	
	
	return $ret;
}

?>