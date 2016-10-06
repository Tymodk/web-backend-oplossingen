<?php
	$fruit			= 'ananas';
	$fruitpos       = strrpos($fruit, 'a');
	$upperFruit 			= strtoupper($fruit);
?>

<!DOCTYPE html>
<mtml>
<head><title>Extra String Funcs</title></head>
<body>

	<h1>String Functies deel 2</h1>
	<p>Laatste 'a': <?php echo $fruitpos ?></p>
	<p>Uppercase fruit: <?php echo $upperFruit ?></p>
</body>
</html>