<?php
function calcRente($infoArray)
{

  if($infoArray['index'] <= $infoArray['time'])
  {
     $hoeveelheidRente = floor($infoArray['geld']*($infoArray['rente']/100));
     $infoArray['geld'] += $hoeveelheidRente;
     $infoArray['results'][$infoArray['index']] = 'In year: ' . $infoArray['index']. ' the money is ' . $infoArray['geld'];
     $infoArray['index'];
     return calcRente($infoArray);
  }
  else
  {
    return $resultArray;
  }

  
}
$renteVoet = 8;
  $tijd = 10;
  $kapitaal = 100000;
  $data = array('index' => 1, 'time' => $tijd, 'geld' => $kapitaal, 'rente' => $renteVoet, 'results' => array());
  $result = calcRente($data);
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