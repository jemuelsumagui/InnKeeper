<?php
require_once('init.php');  
    //per collegarsi al db || avere gli array: $strutture, $stanze, $prenotazioni || $numerostrutture, $numerostanze, $numeroprenotazioni

$msg = FALSE;
if (isset($_REQUEST['ok']) == 'ok') {
	$query = 'INSERT INTO strutture '.
		'(struttura_fkutenteid, struttura_nome, struttura_note, struttura_en ) VALUES ('.
		$_REQUEST['struttura_fkutenteid'].', "'.
		$_REQUEST['struttura_nome'].'", "'.
		$_REQUEST['struttura_note'].'", '.
		'1);';
//echo '<br>Questa è la query: '.$query;
	if ($rs = mysqli_query($link, $query)) {
		//header('Location: nuovaStruttura.php?msg=insert_ok');
        echo '<script src="js/modal.js"></script>';
        echo '<script type="text/javascript">', 'closeModal();','</script>';
        //echo '<script type="text/javascript">', 'window.location.reload();', '</script>';
	} else {
		$msg = TRUE;
	}

}

?>

<html>

<head>
    <title><?php echo TITOLO; ?></title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">

</head>

<body>
    <?php if ($msg) { ?>
    ERRORE!!!!
    <?php } ?>
    <form class="text-left p-5" action="?ok=ok" method="post">
        <label>Nome struttura:</label>
        <input class="form-control" name="struttura_nome" type="text" required /><br />
        <label>Note struttura:</label>
        <input class="form-control" name="struttura_note" type="text" /><br />
        <input name="struttura_fkutenteid" type="hidden" value="<?php echo $_SESSION['utente_id']; ?>" /><br />
        <input class="btn btn-outline-dark my-4" type="submit" value="Inserisci" />
    </form>

</body>

</html>
