<?php
    function __autoload($className) {
	  require_once('classes/' . $className . '.php');
	}
	$new = 150;
	$unit = 100;
	$percent = new Percent($new, $unit);

?>

<!DOCTYPE html>
<html>
	<p>Hoeveel percent is <?= $new ?> van <?= $unit ?></p>
	<p>Absoluut</p>
	<?= $percent->absolute ?>
	<p>relative</p>
	<?= $percent->relative ?>
	<p>hundread</p>
	<?= $percent->hundred ?>
	<p>nominal</p>
	<?= $percent->nominal ?>



	</body>
</html>