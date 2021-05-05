<?php
	require_once('init.php');
	include('stanze.php');
	$stanze = getStanze($_REQUEST['idstruttura']);
?>
<html>
<head>
	<title><?php echo TITOLO; ?></title>
</head>
<body>
	<h1>Ciao <?php echo $_SESSION['email']; ?> qui ci sono le tue stanze</h1>
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
	
	<a href="main.php">Torna indietro</a>
</body>

</html>