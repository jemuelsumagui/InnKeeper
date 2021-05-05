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

?>