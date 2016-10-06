<?php
  $animals = array('dog', 'cat', 'cow', 'bird', 'fish');
  $animals[] = 'zebra';
  $animals[] = 'donkey';
  $animals[] = 'whale';
  $animals[] = 'shark';
  $animals[] = 'crab';

  $voertuigen = array('landvoertuigen' => array('Auto', 'brommer'), 
                        'watervoertuigen' => array('jacht', 'jetski'),
                        'luchtvoertuigen' => array('vliegtuig', 'zeppelin'));

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Arrays basis</title>
	</head>
	<body>

        <h1>Arrays</h1>
         <pre><?php var_dump ($animals) ?></pre>
         <pre><?php var_dump ($voertuigen) ?></pre>


	</body>
</html>