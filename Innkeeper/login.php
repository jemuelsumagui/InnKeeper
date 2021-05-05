<?php
	$showMsg = FALSE;
	if (isset($_REQUEST['login'])) {
		$msg ="<strong>Attenzione login errato</strong><br />";
		$showMsg = TRUE;
	}
?>
<html>
    <head>
         <meta charset="UTF-8">
         <link rel="stylesheet" href="CSS/stile_login.css">
        <link rel="stylesheet" href="CSS/bootstrap.min.css">
    </head>
    <body>
    
        <!-- inizio del form di login -->
	<form action="checkLogin.php">
        <div class="imgcontainer">
            <img src="img/Innkeeper.png" alt="Avatar" class="avatar">
        </div>
        
        <div class="container" style="width: 300px;">
            <label for="uname"><b>Username</b></label><br>
            <input type="text" class="form-control" placeholder="Enter Username" name="email" required>
            <br>
            <label for="psw"><b>Password</b></label><br>
            <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
            <br>
            <button class="btn btn-primary" type="submit" name="login" value="invia">Login</button>
            <br>
            <a href="#">Forgot password?</a>
            
            <!-- messaggi di errore nel caso di login sbagliato -->
	<?php
		// msg con html in Php
		if ($showMsg)	{ echo $msg; } ?>
	<?php 
		// msg con php in html
		if ($showMsg)	{ ?>
		<strong>Il login è sbagliato!!!!</strong><br />
	<?php } ?>
            
            
        </div>
        
	
        
	</form>
        <!-- fine del form di login -->
    
	</body>
</html>