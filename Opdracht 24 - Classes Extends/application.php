<?php
   	function __autoload($className){
	  require_once('classes/' . $className . '.php');
	}
	$tiger = new Animal('Hobbes', 'male', 100);
	$bear = new Animal('Winnie', 'male', 100);
	$lion = new Animal('Nala', 'female', 100);
	$simba = new Lion('Simba', 'male', 100, 'Congo');
	$scar = new Lion('Scar', 'male', 100, 'Kenyan');

	$zeke = new Zebra('Zeke', 'male' ,100, 'Quagga');
	$zana = new Zebra('Zana', 'female', 100, 'Selous');

	$lion->setHealth(10);
	$bear->setHealth(-10);


	


?>

<!DOCTYPE html>
<html>
	<head>

	</head>
	<body>
		<h1>Animals</h1>
   		<p><?= $tiger->getName() ?> is a <?= $tiger->getGender() ?> and has <?= $tiger->getHealth()?> healthpoints (special move: <?=$tiger->doSpecialMove()?>)</p>
   		<p><?= $lion->getName() ?> is a <?= $lion->getGender() ?> and has <?= $lion->getHealth()?> healthpoints (special move: <?=$lion->doSpecialMove()?>)</p>
   		<p><?= $bear->getName() ?> is a <?= $bear->getGender() ?> and has <?= $bear->getHealth()?> healthpoints (special move: <?=$bear->doSpecialMove()?>)</p>
   		<h1>Lions</h1>
   		<p>The special move of Simba (soort: <?php echo $simba->getSpecies() ?>) is: <?php echo $simba->doSpecialMove() ?></p>
		<p>The special move of Scar (soort: <?php echo $scar->getSpecies() ?>) is: <?php echo $scar->doSpecialMove() ?></p>
		<h1>Zebra</h1>
		<p>The special move of Zeke (soort: <?php echo $zeke->getSpecies() ?>) is: <?php echo $zeke->doSpecialMove() ?></p>
		<p>The special move of Zana (soort: <?php echo $zana->getSpecies() ?>) is: <?php echo $zana->doSpecialMove() ?></p>

	</body>