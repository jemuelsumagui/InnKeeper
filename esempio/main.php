<?php
	require_once('init.php');          // per collegarsi al db
	include('strutture.php');          
	include('stanze.php');             
	$strutture = getStrutture($_SESSION['email'], $link);      //si prende le strutture
	$stanze = getStanze($_REQUEST['idstruttura'], $link);      //si prende le stanze
?>

<html>
<head>
	<title><?php echo TITOLO; ?></title>  <!-- TITOLO è preso da config.php che viene chiamato in init.php -->
	<link rel="stylesheet" href="fogliodistile.css" />
</head>
<body>
	<h1>Ciao <?php echo $_SESSION['email']; ?> qui ci sono le tue strutture</h1>
    
	<nav>
		<ul>
		<li>
			<a href="nuovaStruttura.php">Aggiungi struttura</a>
		</li>
		</ul>
	</nav>
    
	<div id="elenco_strutture"><ul>
		<?php
		$max = count($strutture);
		for ($i=0; $i<$max; $i++) {
			?>
			<li class="">
				<a href="main.php?idstruttura=<?php echo $strutture[$i]['id']; ?>">
					<?php echo $strutture[$i]['nome']; ?>
				</a><br>
<div class="element_actions">
	<span class="element_action">
		<a href="Strutture_updel.php?cmd=upd&struttura_id=<?php echo $strutture[$i]['id']; ?>">UPDATE</a>
	</span>
	<span class="element_action">
		<a href="Strutture_updel.php?cmd=del&struttura_id=<?php echo $strutture[$i]['id']; ?>">DELETE</a>
	</span>
</div>
				<?php echo $strutture[$i]['note']; ?><br>
				<?php echo $strutture[$i]['en']; ?>
			</li>
		<?php } ?>
	</ul></div>
	
	<div id="elenco_stanze">
			<ul>
		<?php
		$max = count($stanze);
		for ($i=0; $i<$max; $i++) {
			?>
			<li>
<a href="">
				<?php echo $stanze[$i]['nome']; ?>
				</a>
				<br>
	Letti: <?php echo $stanze[$i]['postiletto']; ?>
				
			</li>
		<?php } ?>
	</ul>

	</div>
	
</body>

</html>