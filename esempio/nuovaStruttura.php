<?php
require_once('init.php'); 
$msg = FALSE;

if ($_REQUEST['ok'] == 'ok') {
	$query = 'INSERT INTO strutture '.
		'(struttura_fkutenteid, struttura_nome, struttura_note, struttura_en ) VALUES ('.
		$_REQUEST['struttura_fkutenteid'].', "'.
		$_REQUEST['struttura_nome'].'", "'.
		$_REQUEST['struttura_note'].'", '.
		'1);';
//echo '<br>Questa è la query: '.$query;
	if ($rs = mysqli_query($link, $query)) {
		header('Location: main.php?msg=insert_ok');
	} else {
		$msg = TRUE;
	}

}

?>

<html>
<head>
	<title><?php echo TITOLO; ?></title>
	<link rel="stylesheet" href="fogliodistile.css" />
</head>
<body>
<?php if ($msg) { ?>
	ERRORE!!!!
<?php } ?>
<form action="?ok=ok" method="post">
Nome struttura:<input name="struttura_nome" type="text" /><br />
Note struttura: <input name="struttura_note" type="text" /><br />
<input name="struttura_fkutenteid" type="hidden" value="<?php echo $_SESSION['utente_id']; ?>" /><br />
<input type="submit" value="Inserisci" />
</form>
	
</body>
</html>