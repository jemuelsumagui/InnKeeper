<?php
	require_once('init.php');  
    //per collegarsi al db || avere gli array: $strutture, $stanze, $prenotazioni || $numerostrutture, $numerostanze, $numeroprenotazioni

echo "dio cane";
		$query='DELETE FROM prenotazioni WHERE
		pren_id='.$_REQUEST['prenotazione_id'].';';
	echo 'La query è: '.$query;

	if ($rs=mysqli_query($link, $query)) {
		header('Location: GestionePrenotazioni.php');
        echo "si";
	} else {
        echo "no";
		header('Location: GestionePrenotazioni.php');
	}
		




?>
