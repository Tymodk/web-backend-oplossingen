<?php
  
  $text = file_get_contents('text-file.txt');
  $array = str_split($text);
  rsort($array);
  $reverse = array_reverse($array);
  $tellerArray = array();

  foreach($reverse as $value)
  {
    if ( isset($tellerArray[$value]))
    {
      ++$tellerArray[$value];
    }
    else
    {
      $tellerArray[$value] = 1;
    }
    
  }
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Foreach loop</title>
	</head>

	<body>

        <h1>Foreach loop</h1>
    
    <pre><?php var_dump($tellerArray) ?></pre>
    
	</body>
</html>