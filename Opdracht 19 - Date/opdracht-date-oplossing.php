<?php
    $time = mktime(22, 35, 25, 01, 21, 1904); 
    $date = date('d F Y, g:i:s A', $time); 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Date Oplossing</title>
	</head>
	<body>
      <p>Marked time: <?= $time ?></p>
      <p>Readable marked time: <?= $date ?></p>




	</body>
</html>