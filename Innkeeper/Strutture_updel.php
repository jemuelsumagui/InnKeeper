<?php
	require_once('init.php');  
    //per collegarsi al db || avere gli array: $strutture, $stanze, $prenotazioni || $numerostrutture, $numerostanze, $numeroprenotazioni

$showUpdate = FALSE;

switch ($_REQUEST['cmd']) {
	case 'ok_update': 
		$query = 'UPDATE strutture SET '.
			'struttura_nome = "'.$_REQUEST['struttura_nome'].'", '.
			'struttura_note = "'.$_REQUEST['struttura_note'].'" WHERE struttura_id='.$_REQUEST['struttura_id'].';';
		echo $query;
	if ($rs=mysqli_query($link, $query)) {
		header('Location: gestioneBB.php');
	} else {
		header('Location: gestioneBB.php');
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
		/*$query='DELETE FROM strutture WHERE
		struttura_id='.$_REQUEST['struttura_id'].';'; */
        $query='UPDATE strutture SET '.
            'struttura_en = 0'.' WHERE struttura_id='.$_REQUEST['struttura_id'].';';
            
	//echo 'La query è: '.$query;

	if ($rs=mysqli_query($link, $query)) {
		header('Location: gestioneBB.php');
	} else {
		header('Location: gestioneBB.php');
	}
		break;
}

if ($showUpdate) {
?>
<html>

<head>
    <title><?php echo TITOLO; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">

    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/stile_header.css" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php require('header.php'); ?>
    <form action="?cmd=ok_update" method="post">
        <div style="width:20em; margin-left: 3em;">
        Nome struttura:<input name="struttura_nome" class="form-control" type="text" value="<?php echo $row['struttura_nome']; ?>" /><br />
        Note struttura: <input name="struttura_note" class="form-control" type="text" value="<?php echo $row['struttura_note']; ?>" /><br />
        <input name="struttura_id" type="hidden" value="<?php echo $_REQUEST['struttura_id']; ?>" /><br />
        <input name="struttura_fkutenteid" type="hidden" value="<?php echo $_SESSION['utente_id']; ?>" /><br />
        <input name="struttura_en" type="hidden" value="<?php echo $row['struttura_en']; ?>" /><br />
        <input type="submit" value="Inserisci" />
        </div>
    </form>

</body>

</html>
<?php } ?>
