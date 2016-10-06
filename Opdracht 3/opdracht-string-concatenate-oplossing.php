<?php
	$voornaam 			= 	'Tymo';
	$achternaam 		= 	' de Kock';
	$volledigeNaam      = $voornaam . $achternaam;
	$length				= strlen($volledigeNaam);
?>

<!DOCTYPE html>
<mtml>
<head><title>Concat Strings </title></head>
<body>

	<h1>String Concats</h1>
	<p>Volledige naam: <?php echo $volledigeNaam ?></p>
	<p>Aantal characters in volledige naam: <?php echo $length ?></p>
</body>
</html>