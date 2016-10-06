<?php
	
	$getal 	= 	1; 
	$dag 	=	 NULL;
          
    if ( $getal == 1 ){$dag = 'maandag';} 
    if ( $getal == 2 ){$dag = 'dinsdag';} 
    if ( $getal == 3 ){$dag = 'woensdag';} 
    if ( $getal == 4 ){$dag = 'donderdag';} 
    if ( $getal == 5 ){$dag = 'vrijdag';} 
    if ( $getal == 6 ){$dag = 'zaterdag';} 
    if ( $getal == 7 ){$dag = 'zondag';}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Conditional statements</title>
	</head>
	<body>
        
        <h1>Cond statement: if</h1>

		<p> Dag van getal: <?php echo $getal ?> is: <?php echo $dag ?></p>
	</body>
</html>