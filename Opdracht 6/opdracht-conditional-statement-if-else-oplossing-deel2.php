<?php
	
  $seconds = 221108521;
  $minutes  = floor($seconds / 60);
  $hours = floor($minutes / 60);
  $days = floor($hours / 24);
  $weeks = floor($days / 7);
  $months = floor($days /31);
  $years = floor($days / 365);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Conditional statements</title>
	</head>
	<body>

        <h1>Jaren, maanden, weken, dagen, uren, minuten </h1>
        <p>Aantal ... in <?php echo $seconds ?> seconden</p>
        <ul> 
            <li>minuten: <?php echo $minutes ?></li> 
            <li>uren: <?php echo $hours ?></li> 
            <li>dagen: <?php echo $days ?></li> 
            <li>weken: <?php echo $weeks ?></li> 
            <li>maanden (31): <?php echo $months ?></li> 
            <li>jaaren (365): <?php echo $years ?></li> 
        </ul> 

		<p></p>
	</body>
</html>