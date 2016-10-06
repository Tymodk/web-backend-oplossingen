<?php
	$lettertje				= 'e';
	$cijfertje				= '3';
	$langsteWoord 			='zandzeepsodemineralenwatersteenstralen';
	$replacedWord 			= str_replace($lettertje, $cijfertje, $langsteWoord);
?>

<!DOCTYPE html>
<mtml>
<head><title>Extra String Funcs</title></head>
<body>

	<h1>String Functies deel 3</h1>
	<p>Langste woord met e's veranderd naar 3's: <?php echo $replacedWord ?></p>
</body>
</html>