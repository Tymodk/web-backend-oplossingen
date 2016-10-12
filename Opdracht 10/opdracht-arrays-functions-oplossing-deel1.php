<?php
      $animals = array('dog', 'cat', 'cow', 'bird', 'fish');
      $count = count($animals);
      $teZoekenDier = 'dog';

      $isInArray = in_array($teZoekenDier, $animals);  
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Arrays</title>
	</head>
	<body>

        <h1>Arrays</h1>
        <p>Er zitten <?php echo $count?> dieren in de array</p>
        <?php if($isInArray): ?>
            <p>Het te zoeken dier <?php echo $teZoekenDier ?> zit in de array</p>
        <?php else: ?>
            <p>Het te zoeken dier <?php echo $teZoekenDier ?> zit niet in de array</p>
      <?php endif ?>

	</body>
</html>