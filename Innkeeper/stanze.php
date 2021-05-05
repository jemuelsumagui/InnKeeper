<?php

function getStanze($idstruttura, $link) {
    $ret = FALSE;
    $stanze = array();
    
    $query = "SELECT * FROM stanze WHERE stanza_fkstrutturaid = $idstruttura && stanza_en=1;";
    //echo 'questa è la query: '.$query;
    
    if (!$rs = mysqli_query($link, $query)) {
		//echo "errore";                            //messaggio di errore se esce false
		//exit;
       $ret_zero = 0;
       return $ret_zero;
        
	}
    
    $i = 0;
    while ($row = mysqli_fetch_assoc($rs)) {
        $stanze[$i]['nome'] = $row['stanza_nome'];
        $stanze[$i]['id'] = $row['stanza_id'];
        $stanze[$i]['note'] = $row['stanza_note'];
        $stanze[$i]['posti_letto'] = $row['stanza_posti_letto'];
        $stanze[$i]['prezzo_notte'] = $row['stanza_prezzo_notte'];
        $stanze[$i]['fkstrutturaid'] = $idstruttura;
        $stanze[$i]['en'] = $row['stanza_en'];
        $i++;
    }
    
    
    
    $ret = $stanze;
    return $ret;
}
?>
