<?php
require_once('init.php');  
    //per collegarsi al db || avere gli array: $strutture, $stanze, $prenotazioni || $numerostrutture, $numerostanze, $numeroprenotazioni



$failPrenotazione = "success";
if (isset($_REQUEST['ok']) == 'ok') {
    
    
    for($i=0;$i<$numeroprenotazioni;$i++) {
        if($prenotazioni[$i]['id_stanza'] == $_REQUEST['pren_fkstanzaid']) {
            if($_REQUEST['pren_data_arrivo'] == $prenotazioni[$i]['data_arrivo'] || 
               $_REQUEST['pren_data_arrivo'] > $prenotazioni[$i]['data_arrivo'] && $_REQUEST['pren_data_arrivo'] < $prenotazioni[$i]['data_partenza'] || 
               $_REQUEST['pren_data_partenza'] == $prenotazioni[$i]['data_partenza'] ||
               $_REQUEST['pren_data_partenza'] > $prenotazioni[$i]['data_arrivo'] && $_REQUEST['pren_data_partenza'] < $prenotazioni[$i]['data_partenza']) { 
               $failPrenotazione = "occupato";
            }
        if($_REQUEST['pren_data_arrivo'] > $_REQUEST['pren_data_partenza']) {
               $failPrenotazione = "timeTravel";}
        if($_REQUEST['pren_data_arrivo'] < date("Y-m-d")) {
               $failPrenotazione = "arrivoPassato";}
            
        }
    }
    
        
    
    if($failPrenotazione == "success") {
	$query = 'INSERT INTO prenotazioni '.
		'(pren_fkutenteid, pren_fkstanzaid, pren_data_arrivo, pren_data_partenza, pren_osp_nome, pren_osp_cognome, pren_osp_data_nascita, pren_osp_cod_fisc, pren_en) VALUES ('.
		$_REQUEST['pren_fkutenteid'].', '.
		$_REQUEST['pren_fkstanzaid'].', "'.
		$_REQUEST['pren_data_arrivo'].'", "'.
		$_REQUEST['pren_data_partenza'].'", "'.
        $_REQUEST['nome_ospite'].'", "'.
        $_REQUEST['cognome_ospite'].'", "'.
        $_REQUEST['data_di_nascita_ospite'].'", "'.
        $_REQUEST['codice_fiscale_ospite'].'", 
        1);';
//echo "questa è la prima query", $query;
    if ($rs = mysqli_query($link, $query)) {
        
       /* $query_ospite = 'INSERT INTO ospiti '.
                        '(ospite_codfisc, ospite_nome, ospite_cognome, ospite_datadinascita, ospite_fkprenotazione) VALUES ("'.
                $_REQUEST['codice_fiscale_ospite'].'", "'.
                $_REQUEST['nome_ospite'].'", "'.
                $_REQUEST['cognome_ospite'].'", "'.
                $_REQUEST['data_di_nascita_ospite'].'", 1);';   //manca la fkprenotazione
            //echo "questa è la seconda query", $query_ospite;
        if ($rs = mysqli_query($link, $query_ospite)) {
           // header('Location: gestioneBB.php?msg=insert_ok');
            */
        
        //QUESTA QUERY è COMMENTATA PERCHè NON SERVE AL MOMENTO
        echo '<script src="js/modal.js"></script>';
        echo '<script type="text/javascript">', 'closeModal();','</script>';
        
        }  else {
		$failPrenotazione = "panic";
	    }
    }
    }

?>

<!DOCTYPE html>
<html>

<head>
    <title>Nuova Prenotazione</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <script type="text/javascript">
        // MIGLIORARE QUESTO SCRIPT SE C'è TEMPO

        var array_strutture = <?php echo json_encode($strutture);?>; //creo l'array strutture
        var array_stanze = <?php echo json_encode($stanze); ?>; //creo l'array stanze

        function populate(s1, s2) { //script per popolare il menu a tendina delle stanze in base alla struttura scelta

            var s1 = document.getElementById(s1);
            var s2 = document.getElementById(s2);
            s2.innerHTML = ""; //prima opzione vuota
            var numero_stanze = array_stanze.length; //conto il numero delle stanze
            var check_presenza_stanze = true;
            for (var i = 0; i < numero_stanze; i++) { //controllo tutte le stanze

                if (s1.value == array_stanze[i]["fkstrutturaid"]) { //Se l'id della struttura selezionata è uguale alla fkstrutturaid di una stanza
                    check_presenza_stanze = false;
                    var newOption = document.createElement("option"); //creo una nuova opzione
                    newOption.value = array_stanze[i]["id"]; //id come value 
                    newOption.innerHTML = array_stanze[i]["nome"]; //nome della stanza come opzione
                    s2.options.add(newOption);
                }
            }
            if (check_presenza_stanze) {
                var newOption = document.createElement("option");
                newOption.value = "";
                newOption.innerHTML = "nessuna stanza registrata in questa struttura";
                s2.options.add(newOption);
            }
        }

    </script>

</head>

<body>
    <?php if ($numerostrutture != 0) { 
    
        switch ($failPrenotazione) {
            case 'success':
                break;
            case 'occupato':
                echo "Errore: La stanza è già occupata nelle date selezionate";
                break;
            case 'timeTravel':
                echo "Errore: La data di partenza precede la data di arrivo";
                break;
            case 'arrivoPassato':
                echo "Errore: La data di arrivo precede il giorno corrente";
                break;
            case 'panic';
                echo "Errore: generico con il database";
                break;     
        }
    
    
    
    ?>

    <form class="text-left p-5" action="?ok=ok" method="post">
        <label>Dati Prenotazione:</label>
        <div class="form-row">
            <div class="form-group col-md-6">
                Struttura: <select class="form-control" id="slct1" name="pren_fkstrutturaid" onchange="populate('slct1','slct2')" required>
                    <option value=""></option>
                    <!--prima opzione vuota -->
                    <?php
            for ($i=0; $i<$numerostrutture; $i++) {  //creo tutte le selezioni delle strutture
        ?>
                    <option value="<?php echo $strutture[$i]['id']; ?>"><?php echo $strutture[$i]['nome']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group col-md-6">
                Stanza: <select class="form-control" id="slct2" name="pren_fkstanzaid" required></select><br /> <!-- creo dinamicamente le selezioni delle stanze -->
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                Data di arrivo: <input class="form-control" name="pren_data_arrivo" type="date" required />
            </div>
            <div class="form-group col-md-6">
                Data di partenza: <input class="form-control" name="pren_data_partenza" type="date" required />
            </div>
        </div>
        <br />
        <label>Dati Ospiti:</label>
        <div class="form-row">
            <div class="form-group col-md-6">
                Nome: <input class="form-control" name="nome_ospite" type="text" required />
            </div>
            <div class="form-group col-md-6">
                Cognome:<input class="form-control" name="cognome_ospite" type="text" required />
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                Data di nascita: <input class="form-control" name="data_di_nascita_ospite" type="date" required />
            </div>
            <div class="form-group col-md-6">
                Codice fiscale: <input class="form-control" name="codice_fiscale_ospite" type="text" />
            </div>
        </div>

        <input class="form-control" name="pren_fkutenteid" type="hidden" value="<?php echo $_SESSION['utente_id']; ?>" /><br />
        <input class="btn btn-outline-dark my-4" type="submit" value="Inserisci" />
    </form>

    <?php } else { ?>
    <p>non sono state ancora registrate delle strutture per le quali registrare una prenotazione</p>
    <?php } ?>
</body>

</html>
