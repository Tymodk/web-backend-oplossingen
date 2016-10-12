<?php
  $boodschappenlijstje = array('Melk', 'Brood', 'Water', 'Appel', 'Vlees');
  $index = 0;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>While looping statement</title>
	</head>
	<body>

        <h1>While loop</h1>
        <ul>
      <?php while( isset($boodschappenlijstje[$index]) ):  ?>
        
        <li><?= $boodschappenlijstje[$index]?></li>
                <?php ++$index ?>
      <?php endwhile ?>
    </ul>
	</body>
</html>