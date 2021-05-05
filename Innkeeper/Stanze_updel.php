<?php
	require_once('init.php');  
    //per collegarsi al db || avere gli array: $strutture, $stanze, $prenotazioni || $numerostrutture, $numerostanze, $numeroprenotazioni

$showUpdate = FALSE;

switch ($_REQUEST['cmd']) {
	case 'ok_update': 
		$query = 'UPDATE stanze SET '.
			'stanza_nome = "'.$_REQUEST['stanza_nome'].'", '.
			'stanza_note = "'.$_REQUEST['stanza_note'].'", '.
            'stanza_posti_letto = "'.$_REQUEST['stanza_posti_letto'].'", '.
            'stanza_prezzo_notte = "'.$_REQUEST['stanza_prezzo_notte'].'"
            WHERE stanza_id='.$_REQUEST['stanza_id'].';';
		//echo $query;
	if ($rs=mysqli_query($link, $query)) {
		header('Location: gestioneBB.php');
	} else {
		header('Location: gestioneBB.php');
	}
		break;
		break;
	case 'upd':
		$showUpdate = TRUE;
		$query = 'SELECT * FROM stanze WHERE stanza_id='.$_REQUEST['stanza_id'].';';
		$rs = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($rs);
		break;
	case 'del':
		/*$query='DELETE FROM stanze WHERE
		stanza_id='.$_REQUEST['stanza_id'].';';*/
        $query='UPDATE stanze SET '.
            'stanza_en = 0'.' WHERE stanza_id='.$_REQUEST['stanza_id'].';';
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

<body class="p-3">
    <?php require('header.php'); ?>
    <form action="?cmd=ok_update" method="post">
        <div style="width:20em; margin-left: 3em;">
            Nome struttura:<input name="stanza_nome" class="form-control" type="text" value="<?php echo $row['stanza_nome']; ?>" /><br />
            Posti Letto:<input name="stanza_posti_letto" class="form-control" type="number" value="<?php echo $row['stanza_posti_letto']; ?>" /><br />
            Prezzo per notte:<input name="stanza_prezzo_notte" class="form-control" type="number" value="<?php echo $row['stanza_prezzo_notte']; ?>" /><br />
            Note struttura: <input name="stanza_note" class="form-control" type="text" value="<?php echo $row['stanza_note']; ?>" /><br />

            <input name="stanza_id" type="hidden" value="<?php echo $_REQUEST['stanza_id']; ?>" /><br />
            <input name="stanza_fkstrutturaid" type="hidden" value="<?php echo $_SESSION['struttura_id']; ?>" /><br />
            <input type="submit" class="btn btn-outline-dark my-4" value="Inserisci" />
        </div>

    </form>

</body>

</html>
<?php } ?>
