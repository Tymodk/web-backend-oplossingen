<?php
$md5HashKey   =   'd1fa402db91a7a93c4f414b8278ce073';
function haystackProcent1($haystack, $needle){
  $length =  strlen($haystack);

  $count = substr_count ($haystack, $needle);

  $procent = ($count/$length)*100;

  return $procent;

}
function haystackProcent2($needle){
  $haystack = $GLOBALS['md5HashKey'];

  $length =  strlen($haystack);

  $count = substr_count ($haystack, $needle);

  $procent = ($count/$length)*100;

  return $procent;
}
function haystackProcent3($needle){
  global $md5HashKey;

  $haystack = $md5HashKey;
  
  $length =  strlen($haystack);

  $count = substr_count ($haystack, $needle);

  $procent = ($count/$length)*100;

  return $procent;

}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Functions</title>
	</head>

	<body>

        <h1>Funcs advanced</h1>

    
	</body>
</html>