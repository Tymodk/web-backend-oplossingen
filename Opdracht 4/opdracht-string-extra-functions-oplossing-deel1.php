<?php
	$fruit			= 'kokosnoot';
	$fruitLen       = strlen($fruit);
	$fruitpos       = strpos($fruit, 'o');
?>

<!DOCTYPE html>
<mtml>
<head><title>Extra String Funcs</title></head>
<body>

	<h1>String Functies</h1>
	<p>Aantal characters in  fruit: <?php echo $fruitLen ?></p>
	<p>Eerste 'o': <?php echo $fruitpos ?></p>
</body>
</html>