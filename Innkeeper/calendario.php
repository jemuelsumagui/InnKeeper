<!doctype html>

<?php
require_once('init.php');  
    //per collegarsi al db || avere gli array: $strutture, $stanze, $prenotazioni || $numerostrutture, $numerostanze, $numeroprenotazioni
?>

<html lang="it">

<head>
    <title>Calendario</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/stile_header.css">
    <link rel="stylesheet" href="CSS/stile_calendario.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <!-- SCRIPT PER IL CALENDARIO MESSSO QUI PROVVISORIAMENTE -->
    <script type="text/javascript">
        var array_strutture = <?php echo json_encode($strutture);?>; //creo l'array strutture
        var array_stanze = <?php echo json_encode($stanze); ?>; //creo l'array stanze
        var array_prenotazioni = <?php echo json_encode($prenotazioni); ?>; //creo l'array delle prenotazioni
        console.log(array_prenotazioni[0]["colore"]);
        var numero_strutture = array_strutture.length;
        var numero_stanze = array_stanze.length;
        var numero_prenotazioni = array_prenotazioni.length;

    </script>


    <!--STILE DA DEFINIRE -->
</head>

<body>
    <?php require('header.php'); ?>
        
    <a id="monthAndYear" style="display: none;"></a>

        <div class="row p-4" style="width: 100%;">   
            <div class="col-sm-6" >
                <a class="txtLabel"><i class="fa fa-arrow-up" style="color: red; padding-right: 2px"></i>Partenze di oggi:</a>

            <ul class="list2">
                <?php for($p=0;$p<$numeroprenotazioni;$p++) {
            if($prenotazioni[$p]['data_partenza'] == date("Y-m-d")) { ?>
                <li class="listItem"><?php echo $prenotazioni[$p]['nome_ospite']," ",$prenotazioni[$p]['cognome_ospite']; ?></li>
                <?php   }} ?>
                </ul>
            </div>
                            
            
            <div class="col-sm-6" >
                <a class="txtLabel"><i class="fa fa-arrow-down" style="color: green;padding-right: 2px"></i>Arrivi di oggi:</a>
            <ul class="list2">
                <?php for($a=0;$a<$numeroprenotazioni;$a++) {
            if($prenotazioni[$a]['data_arrivo'] == date("Y-m-d")) { ?>
                <li class="listItem"><?php echo $prenotazioni[$a]['nome_ospite']," ",$prenotazioni[$a]['cognome_ospite']; ?></li>
                <?php   }} ?>
                    </ul>
            </div>
        </div>

        
        

 
                    
                    
            <!-- Pannello controllo calendario -->
            <div class="card card-cascade narrower">


                <div class="view py-2 mx-3 mb-2 d-flex justify-content-between">

                    <div>
                        <!-- Pulsante ritorna a "oggi" -->
                        <button type="button" class="stileBtn" id="oggi" onclick="oggi()">Oggi</button>

                    </div>
                    
                    <!-- selezione mese e anno specifico -->
                    <form class="form-inline">
                        

                        <select class="form-control col-md" name="month" id="month" onchange="jump()">
                            <option value=0>Gennaio</option>
                            <option value=1>Febbraio</option>
                            <option value=2>Marzo</option>
                            <option value=3>Aprile</option>
                            <option value=4>Maggio</option>
                            <option value=5>Giugno</option>
                            <option value=6>Luglio</option>
                            <option value=7>Agosto</option>
                            <option value=8>Settembre</option>
                            <option value=9>Ottobre</option>
                            <option value=10>Novembre</option>
                            <option value=11>Dicembre</option>
                        </select>


                        <label for="year"></label><select class="form-control col-md" name="year" id="year" onchange="jump()">

                            <option value=2010>2010</option>
                            <option value=2011>2011</option>
                            <option value=2012>2012</option>
                            <option value=2013>2013</option>
                            <option value=2014>2014</option>
                            <option value=2015>2015</option>
                            <option value=2016>2016</option>
                            <option value=2017>2017</option>
                            <option value=2018>2018</option>
                            <option value=2019>2019</option>
                            <option value=2020>2020</option>
                            <option value=2021>2021</option>
                            <option value=2022>2022</option>
                            <option value=2023>2023</option>
                            <option value=2024>2024</option>
                            <option value=2025>2025</option>
                            <option value=2026>2026</option>
                            <option value=2027>2027</option>
                            <option value=2028>2028</option>
                            <option value=2029>2029</option>
                            <option value=2030>2030</option>
                        </select>

                    </form>

                    <!-- fine selezione-->


                </div>

            </div>
    
    
    

    


            <!-- tab prenotazione, richiamo le funzioni -->
            <table class="table table-responsive table-bordered">
                <thead id="calendar-mounths" class="table-borderless"></thead> <!-- Inserisco i mesi -->
                <thead id="calendar-thead"></thead> <!-- Inserisco i giorni -->
                <tbody id="calendar-tbody"></tbody>
            </table>
            <!-- fine tab -->
    
    

    <script src="js/visualizzazioneCalendario.js"></script>
</body>

</html>
