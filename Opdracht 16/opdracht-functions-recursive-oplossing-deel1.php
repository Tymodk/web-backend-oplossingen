<?php
function calcRente($rente, $geld, $time)
{
  static $index = 1;
  static $resultArray = array();
  if($index <= $time)
  {
     $hoeveelheidRente = floor($geld*($rente/100));
     $newMoney = $geld + $hoeveelheidRente;
     $resultArray[$index] = 'In year: ' . $index . ' the money is ' . $newMoney;
     ++$index;
     return calcRente($rente, $newMoney, $time);
  }
  else
  {
    return $resultArray;
  }

  
}
$renteVoet = 8;
  $tijd = 10;
  $kapitaal = 100000;
  $result = calcRente($renteVoet, $kapitaal, $tijd);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Functions</title>
	</head>

	<body>

        <h1>Funcs recursive</h1>
        <ul>
          <?php foreach($result as $value): ?>
            <li><?php echo $value ?></li>
          <?php endforeach ?>
        </ul>
    
	</body>
</html>