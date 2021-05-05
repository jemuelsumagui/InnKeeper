<?php

function getStrutture($email, $link) {
	$ret = FALSE;              // inizializzo 
	$strutture = array();
	
	$query = "SELECT * FROM strutture WHERE struttura_fkutenteid = '".$_SESSION['utente_id']."' && struttura_en=1;";  
    //seleziono da strutture tutte le righe associate all'id dell'utente attivo
	
	//echo 'questa è la query: '.$query;
	
	if (!$rs = mysqli_query($link, $query)) {
        //echo "errore";                            //messaggio di errore se esce false
		//exit;
        $ret_zero = 0;
        return $ret_zero;
	}

	$i = 0;
	while ($row = mysqli_fetch_assoc($rs)) {
		$strutture[$i]['nome'] = $row['struttura_nome'];
		$strutture[$i]['id'] = $row['struttura_id'];
		$strutture[$i]['note'] = $row['struttura_note'];
		$strutture[$i]['en'] = $row['struttura_en'];
		$i++ ;
	}
	
	$ret = $strutture;
	return $ret;
}

?>
