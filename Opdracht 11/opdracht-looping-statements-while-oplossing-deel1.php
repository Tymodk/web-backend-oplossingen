<?php
   $array = array();
   $index = 0;
   while($index <= 100)
   {
      $array[] = $index;
      ++$index;
   }
   $print1 = implode(', ', $array);

   $array2 = array();
   $index = 0;

   while ( $index <=  100 )
  {
    if ( $index % 3 == 0 && $index > 40 && $index < 80 )
    {
      $array2[]  = $index;
    }
    ++$index;
  }
  $print2 = implode(', ', $array2);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>While looping statement</title>
	</head>
	<body>

        <h1>While loop</h1>
        <p>Count to hundred:  <?= $print1 ?></p>
        <p>Part 2:  <?= $print2 ?></p>
	</body>
</html>