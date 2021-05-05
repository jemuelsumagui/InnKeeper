<?php

function getStanze($idstruttura) {
	$stanze[0]['nome'] = 'Stanza 01';
	$stanze[0]['id'] = '1';
	$stanze[0]['postiletto'] = 2;
	$stanze[0]['idstruttura'] = 1;
	
	$stanze[1]['nome'] = 'Stanza 02';
	$stanze[1]['id'] = '2';
	$stanze[1]['postiletto'] = 3;
	$stanze[1]['idstruttura'] = 1;
	
	$stanze[2]['nome'] = 'Stanza 03';
	$stanze[2]['id'] = '3';
	$stanze[2]['postiletto'] = 2;
	$stanze[2]['idstruttura'] = 2;

	$stanze[3]['nome'] = 'Stanza 04';
	$stanze[3]['id'] = '4';
	$stanze[3]['postiletto'] = 2;
	$stanze[3]['idstruttura'] = 3;
	
	$i = 0;
	foreach($stanze as $stanza) {
		if ($stanza['idstruttura'] == $idstruttura) {
			$data[$i] = $stanza;
			$i++;
		}
	}
	
	return $data;
}

?>