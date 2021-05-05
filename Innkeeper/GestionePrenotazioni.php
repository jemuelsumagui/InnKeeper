<!DOCTYPE html>

<?php 
   require_once('init.php');  
    //per collegarsi al db || avere gli array: $strutture, $stanze, $prenotazioni || $numerostrutture, $numerostanze, $numeroprenotazioni
?>

<html lang="it">

<head>
    <title>Prenotazioni</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/stile_header.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body class="p-2">
    <?php require('header.php'); ?>
    <h1 class="p-2">Ciao <?php echo $_SESSION['email']; ?> qui puoi gestire le tue PRENOTAZIONI</h1>

    <table class="table table-striped">
        <thead class="thead-white" style="color: #f79824;">
        <tr>
            <th>Stanza</th>
            <th>Ospite</th>
            <th>Arrivo</th>
            <th colspan="2">Partenza</th>
        </tr>
        </thead>
        <?php for($i=0;$i<$numeroprenotazioni;$i++) { ?>
        <tr>
            <?php for ($j=0;$j<$numerostanze;$j++) { 
                    if ($prenotazioni[$i]['id_stanza'] == $stanze[$j]['id']) {
                        
                ?>
            <th><?php echo $stanze[$j]['nome']; ?></th>
            <?php } } ?>
            <th><?php echo $prenotazioni[$i]['nome_ospite'] , " " , $prenotazioni[$i]['cognome_ospite']; ?></th>

            <th><?php echo $prenotazioni[$i]['data_arrivo']; ?></th>
            <th><?php echo $prenotazioni[$i]['data_partenza']; ?></th>


            <th>
                <a onclick="return  confirm('Eliminare la struttura?')" href="Prenotazioni_updel.php?cmd=del&prenotazione_id=<?php echo $prenotazioni[$i]['id'];?>"><i class="fa fa-2x fa-trash" style="color: red;"></i></a>
            </th>
        </tr>
        <?php } ?>
    </table>


    <?php 
    
    
    
    ?>



</body>


</html>
