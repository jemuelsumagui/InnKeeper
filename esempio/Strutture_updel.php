<?php
	require_once('init.php');

$showUpdate = FALSE;

switch ($_REQUEST['cmd']) {
	case 'ok_update': 
		$query = 'UPDATE strutture SET '.
			'struttura_nome = "'.$_REQUEST['struttura_nome'].'", '.
			'struttura_note = "'.$_REQUEST['struttura_note'].'" WHERE struttura_id='.$_REQUEST['struttura_id'].';';
		echo $query;
	if ($rs=mysqli_query($link, $query)) {
		header('Location: main.php?msg=update_ok');
	} else {
		header('Location: main.php?msg=errore');
	}
		break;
		break;
	case 'upd':
		$showUpdate = TRUE;
		$query = 'SELECT * FROM strutture WHERE struttura_id='.$_REQUEST['struttura_id'].';';
		$rs = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($rs);
		break;
	case 'del':
		$query='DELETE FROM strutture WHERE
		struttura_id='.$_REQUEST['struttura_id'].';';
	echo 'La query è: '.$query;

	if ($rs=mysqli_query($link, $query)) {
		header('Location: main.php?msg=delete_ok');
	} else {
		header('Location: main.php?msg=errore');
	}
		break;
}

if ($showUpdate) {
?>
<html>
<head>
	<title><?php echo TITOLO; ?></title>
	<link rel="stylesheet" href="fogliodistile.css" />
</head>
<body>

<form action="?cmd=ok_update" method="post">
Nome struttura:<input name="struttura_nome" type="text" value="<?php echo $row['struttura_nome']; ?>" /><br />
Note struttura: <input name="struttura_note" type="text" value="<?php echo $row['struttura_note']; ?>" /><br />
<input name="struttura_id" type="hidden" value="<?php echo $_REQUEST['struttura_id']; ?>" /><br />
<input name="struttura_fkutenteid" type="hidden" value="<?php echo $_SESSION['utente_id']; ?>" /><br />
<input name="struttura_en" type="hidden" value="<?php echo $row['struttura_en']; ?>" /><br />
<input type="submit" value="Inserisci" />
</form>
	
</body>
</html>
<?php } ?>