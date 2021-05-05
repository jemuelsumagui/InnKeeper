<header style="height:85px">
    <!--spazio per non sovrapporre contenuto e header-->


    <nav class="navbar  fixed-top navbar-expand navbar-dark" style="background: #196659;">
        <img src="img/Innkeeper.png" class="navbar-brand" height="47" width="159" alt="logo">   <!-- logo -->
        
        <!-- icone navbar -->
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="calendario.php"><i class="fa fa-fw fa-2x fa-calendar"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#" data-toggle="modal" data-target="#modalPrenotazioni"><i class="fa fa-fw fa-2x fa-calendar-plus-o"></i></a>
                </li>
            </ul>
        </div>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fa fa-fw fa-2x fa-bars" onclick="openNav()"></i></a>
                </li>
            </ul>
    </nav>

    <!--Modal prenotazioni-->
    <div class="modal fade" id="modalPrenotazioni" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Aggiungi Prenotazione</h4>
                    <button onClick="history.go(0)" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body mb-0 p-0">
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                        <iframe class="embed-responsive-item" src="nuovaPrenotazione.php"></iframe>
                    </div>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>



    <!--Sidenav-->
    <div id="mySidenav" class="header_sidenav">
        <!--elementi per smartphone-->
        <ul class="smartScreen">
            <li class="list-unstyled">
                <a class="smartScreen" href="calendario.php">Calendario</a>
            </li>
            <li class="list-unstyled">
                <a class="" href="#" data-toggle="modal" data-target="#modalPrenotazioni">Aggiungi prenotazione</a>
            </li>
        </ul>
        <!--elementi sidenav-->
        <ul>
            <a href="javascript:void(0)" class="header_closebtn" onclick="closeNav()">&times;</a>
            <li class="list-unstyled">
                <a href="gestioneBB.php">Gestione Strutture</a>
            </li>
            <li class="list-unstyled">
                <a href="GestionePrenotazioni.php">Gestione Prenotazioni</a>
            </li>
            <li class="list-unstyled">
                <a href="logout.php">Logout</a>
            </li>
        </ul>

    </div>
</header>

<script>
    /* funzioni per apertura e chiusura Sidenav */
    function openNav() {
        document.getElementById("mySidenav").style.width = "350px";
        document.getElementById("pippo").style.marginRight = "350px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("pippo").style.marginRight = "0";
    }

</script>
