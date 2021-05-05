<?php
	$showMsg = FALSE;
	if (isset($_REQUEST['login'])) {
		$msg ="<strong>Attenzione login errato</strong><br />";
		$showMsg = TRUE;
	}
?>
<html>
<head></head>
<body>
	<p>
	Ciao fai il login per vedere le tue strutture.
	</p>
    
        <!-- inizio del form di login -->
	<form action="checkLogin.php">
	La tua email:
	<input type="text" name="email" />                 <!-- memorizza email -->
	<br />
	La tua password:
	<input type="password" name="password" />          <!-- memorizza password -->
	<br />
        
        <!-- messaggi di errore nel caso di login sbagliato -->
	<?php 
		// msg con html in Php
		if ($showMsg)	{ echo $msg; } ?>
	<?php 
		// msg con php in html
		if ($showMsg)	{ ?>
		<strong>Il login è sbagliato!!!!</strong><br />
	<?php } ?>
		
		
	<input type="submit" name="login" value="invia"/>  <!-- immetti email e password con il form action, ovvero checkLogin.php-->
        
	</form>
    
    
	</body>
</html>