<!DOCTYPE html>
<?php
	require_once('init.php');  
    //per collegarsi al db || avere gli array: $strutture, $stanze, $prenotazioni || $numerostrutture, $numerostanze, $numeroprenotazioni
?>

<html>

<head>
    <title><?php echo TITOLO; ?></title> <!-- TITOLO è preso da config.php che viene chiamato in init.php -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">

    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/stile_gestioneBB.css" />
    <link rel="stylesheet" href="CSS/stile_header.css" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

    <?php require('header.php'); ?>
    <div class="card">
        <div class="view py-2 mx-3 d-flex justify-content-between">
            <div>
                <a class="txtTitle">Ciao <?php echo $_SESSION['email']; ?> qui puoi gestire le tue strutture</a>
            </div>
            <div>
                <button type="button" class="stileBtn" data-toggle="modal" data-target="#modalPageStruttura">Crea struttura</button>
                <button type="button" class="stileBtn" data-toggle="modal" data-target="#modalPageStanza">Aggiungi stanza</button>
            </div>
        </div>

    </div>



    <div class="p-5">
        <ul class="list-group">
            <?php
            if($strutture != NULL) {
		for ($i=0; $i<$numerostrutture; $i++) {
            if ($strutture[$i]['en'] == 1) {
			?>
            <li class="list-group-item">
                <a class="txtStruttura">
                    <?php echo $strutture[$i]['nome']; ?>
                </a>
                <span>
                    <a class="btn" style="font-weight: 400;" href="Strutture_updel.php?cmd=upd&struttura_id=<?php echo $strutture[$i]['id']; ?>"><i class="fa fa-2x fa-edit" style="color: #196659;"></i></a>
                    <a class="btn" style="font-weight: 400;" onclick="return  confirm('Eliminare la struttura?')" href="Strutture_updel.php?cmd=del&struttura_id=<?php echo $strutture[$i]['id']; ?>"><i class="fa fa-2x fa-trash" style="color: red;"></i></a>
                </span>
                <div>
                    <label class="stileLabel">Note:</label> <?php echo $strutture[$i]['note']; ?><br>
                </div><br>
                <label class="stileLabel">Elenco stanze:</label>
                <ul class="list-group">
                    <?php for($j=0; $j<$numerostanze; $j++) { 
                        if ($stanze[$j]['fkstrutturaid'] == $strutture[$i]['id'] && $stanze[$j]['en'] == 1) {
                    ?>
                    <li class="list-group-item"><?php echo $stanze[$j]['nome']; ?>
                        <ul>

                            <li>Posti letto: <?php echo $stanze[$j]['posti_letto'] ?></li>
                            <li>Prezzo notte: <?php echo $stanze[$j]['prezzo_notte'] ?></li>
                            <li>Note: <?php echo $stanze[$j]['note'] ?></li>

                        </ul>
                        <a class="btn" style="float: right;" onclick="return  confirm('Eliminare la struttura?')" href="Stanze_updel.php?cmd=del&stanza_id=<?php echo $stanze[$j]['id']; ?>"><i class="fa fa-2x fa-trash" style="color: red;"></i></a>
                        <a class="btn" style="float: right;" href="Stanze_updel.php?cmd=upd&stanza_id=<?php echo $stanze[$j]['id']; ?>"><i class="fa fa-2x fa-edit" style="color: #196659;"></i></a>

                    </li>
                    <?php } 
                    }?>
                </ul> <!-- fine elenco stanze -->
            </li>
            <?php  
        
        }
        }            
                        }else{echo "Al momento non sono registrate strutture";} ?>
        </ul> <!-- fine elenco strutture -->
    </div>





    <!--Modals-->
    <div class="modal fade" id="modalPageStanza" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Aggiungi Stanza</h4>
                    <button onClick="history.go(0)" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body mb-0 p-0">

                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                        <iframe class="embed-responsive-item" src="nuovaStanza.php"></iframe>
                    </div>

                </div>

            </div>
            <!--/.Content-->

        </div>
    </div>




    <div class="modal fade" id="modalPageStruttura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Aggiungi Struttura</h4>
                    <button onClick="history.go(0)" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body mb-0 p-0">

                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                        <iframe class="embed-responsive-item" src="nuovaStruttura.php"></iframe>
                    </div>

                </div>

            </div>
            <!--/.Content-->

        </div>
    </div>


</body>

</html>
