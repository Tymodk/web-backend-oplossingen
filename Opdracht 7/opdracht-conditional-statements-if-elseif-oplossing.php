<?php
	$getal = 100;
  $testLower = 0;
  $testUpper = 10;
  if($getal > $testLower && $getal <= $testUpper)
    {
      $testLower = 0;
      $testUpper = 10;
    }
  elseif($getal > 10 && $getal <= 20)
    {
      $testLower = 10;
      $testUpper = 20;
    }
  elseif($getal > 20 && $getal <= 30)
    {
      $testLower = 20;
      $testUpper = 30;
    }
  elseif($getal > 30 && $getal <= 40)
    {
      $testLower = 30;
      $testUpper = 40;
    }
  elseif($getal > 40 && $getal <= 50)
    {
      $testLower = 40;
      $testUpper = 50;
    }
  elseif($getal > 50 && $getal <= 60)
    {
      $testLower = 50;
      $testUpper = 60;
    }
  elseif($getal > 60 && $getal <= 70)
    {
      $testLower = 60;
      $testUpper = 70;
    }
  elseif($getal > 70 && $getal <= 80)
    {
      $testLower = 70;
      $testUpper = 80;
    }
  elseif($getal > 80 && $getal <= 90)
    {
      $testLower = 80;
      $testUpper = 90;
    }
  elseif($getal > 90 && $getal <= 100)
    {
      $testLower = 90;
      $testUpper = 100;
    }
    else
    {
      $testLower = NULL;
      $testUpper = NULL;
    }
  
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Conditional statements</title>
	</head>
	<body>

        <h1>Opdracht if elseif  </h1>
        <p>Het getal: <?php echo $getal ?> ligt tussen de tientallen: <?php echo $testLower ?> en <?php echo $testUpper ?> </p>
        
</html>