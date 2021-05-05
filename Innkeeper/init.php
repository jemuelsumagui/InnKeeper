<?php
	session_start(); //inizia sessione 

	require_once('config.php');    //include una sola volta config.php


	if (!$_SESSION['isLogged']) {
		header('Location: login.php?login=false');
	}
	

	$link = mysqli_connect(DBMS_HOST, DBMS_USER, DBMS_PASSWORD, DBMS_DB);

	if (!$link) {
		exit;
	}


include('strutture.php'); 
include('stanze.php');
include('prenotazioni.php');

$strutture = getStrutture($_SESSION['email'], $link); //array delle strutture
$numerostrutture = count($strutture);                 //conto le strutture

$stanze = getStanze($strutture[0]['id'], $link);      //array con le stanze della prima struttura
for ($i=1; $i<$numerostrutture; $i++) {                //aggiungo all'array le stanze delle altre strutture
    $piustanze = getStanze($strutture[$i]['id'], $link);
    $stanze = array_merge($stanze, $piustanze);
}   
$numerostanze = count($stanze);                       //conto le stanze

$prenotazioni = getPrenotazioni($_SESSION['email'], $link); //array di prenotazioni
$numeroprenotazioni = count($prenotazioni);           //conto le prenotazioni


?>
