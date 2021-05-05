<?php

function getPrenotazioni($email, $link) {
    $ret = FALSE;
    $prenotazioni = array();
    $query = "SELECT * FROM prenotazioni WHERE pren_fkutenteid = '".$_SESSION['utente_id']."' && pren_en=1;";
    //echo 'questa è la query: '.$query;
    
    if (!$rs = mysqli_query($link, $query)) {
		echo "errore";                            //messaggio di errore se esce false
		//exit;
        $ret = $prenotazioni;
        return $ret;
	}

    $i = 0;
    while ($row = mysqli_fetch_assoc($rs)) {
        $prenotazioni[$i]['id'] = $row['pren_id'];
        $prenotazioni[$i]['id_stanza'] = $row['pren_fkstanzaid'];
        $prenotazioni[$i]['data_arrivo'] = $row['pren_data_arrivo'];
        $prenotazioni[$i]['data_partenza'] = $row['pren_data_partenza'];
        $prenotazioni[$i]['nome_ospite'] = $row['pren_osp_nome'];
        $prenotazioni[$i]['cognome_ospite'] = $row['pren_osp_cognome'];
        $prenotazioni[$i]['data_di_nascita'] = $row['pren_osp_data_nascita'];
        $prenotazioni[$i]['cod_fiscale'] = $row['pren_osp_cod_fisc'];
        $prenotazioni[$i]['en'] = $row['pren_en'];
        $i++;
    }

   $ret = $prenotazioni;
    return $ret;
}


?>
