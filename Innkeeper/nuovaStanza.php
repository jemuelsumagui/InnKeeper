<?php
require_once('init.php');  
    //per collegarsi al db || avere gli array: $strutture, $stanze, $prenotazioni || $numerostrutture, $numerostanze, $numeroprenotazioni 
$msg = FALSE;

if (isset($_REQUEST['ok']) == 'ok') {
    $query = 'INSERT INTO stanze '.
        '(stanza_nome, stanza_note, stanza_posti_letto, stanza_prezzo_notte, stanza_fkstrutturaid, stanza_en) VALUES
        ("'.
        $_REQUEST['stanza_nome'].'", "'.
        $_REQUEST['stanza_note'].'", '.
        $_REQUEST['stanza_posti_letto'].', '.
        $_REQUEST['stanza_prezzo_notte'].', '.
        $_REQUEST['id_struttura'].',
        1
        );';
    
    //capire come mettere stanza_fkstrutturaid
    
    
    //echo '<br>Questa è la query: '.$query;
    if ($rs = mysqli_query($link, $query)) {
        //header('Location: nuovaStanza.php?msg=insert_ok');
        echo '<script src="js/modal.js"></script>';
        echo '<script type="text/javascript">', 'closeModal();','</script>';
    }   else {
        $msg = TRUE;
    }
}


?>

<html>

<head>
    <title></title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">

</head>

<body>
    <?php if ($msg) { ?>
    ERRORE
    <?php } ?>

    <form class="text-left p-5" action="?ok=ok" method="post" id="form_stanza">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Struttura di appartenenza: </label>
                <select class="browser-default custom-select" name="id_struttura" form="form_stanza" required>
                    <?php
        $max = count($strutture);
        for ($i=0; $i<$max; $i++) { 
            ?>
                    <option value="<?php echo $strutture[$i]['id']; ?>"><?php echo $strutture[$i]['nome']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label>Nome stanza:</label>
                <input class="form-control" name="stanza_nome" type="text" required />
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Numero posti letto:</label>
                <input class="form-control" name="stanza_posti_letto" type="number" required />
            </div>
            <div class="form-group col-md-6">
                <label>Prezzo per notte: </label>
                <input class="form-control" name="stanza_prezzo_notte" type="number" required />
            </div>

        </div>


        <label>Note stanza:</label>
        <input class="form-control" name="stanza_note" type="text" />
        <input class="btn btn-outline-dark my-4" type="submit" value="Inserisci" />
    </form>

</body>

</html>
