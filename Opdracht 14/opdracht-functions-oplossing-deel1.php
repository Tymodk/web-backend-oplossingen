<?php
function berekenSom($getal1, $getal2){
  $som = $getal2 + $getal1;
  return $som;
}
function vermenigvuldig($getal1, $getal2){
  $result = $getal2 * $getal1;
  return $result;
}
function isEven($getal)
{
  if($getal%2 == 0){
    return true;
  }
  else{
    return false;
  }
}
function upperLen($string) 
  {
    $result['toUpper']  = strtoupper($string);
    $result['strlen']   = strlen($string);

    return $result;
  }
 $string = "Het is groot feest, hey hey.";
  $result = upperLen($string); 
  


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Functions</title>
	</head>

	<body>

        <h1>Funcs</h1>
        <p>String "<?php echo $string ?>" in hoofdletters "<?php echo $result['toUpper'] ?>" is <?php echo $result['strlen'] ?> chars lang.<p>

    
	</body>
</html>