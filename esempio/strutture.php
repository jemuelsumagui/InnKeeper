<?php

function getStrutture($email, $link) {
	$ret = FALSE;              // inizializzo 
	$strutture = NULL;
	
	$query = "SELECT * FROM strutture WHERE struttura_fkutenteid = '".$_SESSION['utente_id']."';";  
    //seleziono da strutture tutte le righe associate all'id dell'utente attivo
	
	//echo 'questa è la query: '.$query;
	
	if (!$rs = mysqli_query($link, $query)) {
		echo "errore";                            //messaggio di errore se esce false
		exit;
	}

	$i = 0;
	while ($row = mysqli_fetch_assoc($rs)) {
		$strutture[$i]['nome'] = $row['struttura_nome'];
		$strutture[$i]['id'] = $row['struttura_id'];
		$strutture[$i]['note'] = $row['struttura_note'];
		$strutture[$i]['en'] = $row['struttura_en'];
		
		$i++ ;
	}
	
	
	
	/*
	$strutture[0]['nome'] = 'Struttura 01';
	$strutture[0]['id'] = '1';
	$strutture[1]['nome'] = 'Struttura 02';
	$strutture[1]['id'] = '2';
	$strutture[2]['nome'] = 'Struttura 03';
	$strutture[2]['id'] = '3';
	*/
	$ret = $strutture;
	return $ret;

}

?>