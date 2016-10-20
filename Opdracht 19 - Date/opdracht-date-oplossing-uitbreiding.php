<?php
    setlocale('LC_ALL', 'nld_nld');
    $time = mktime(22, 35, 25, 01, 21, 1904); 
    $date = strftime('%d %B %Y, %X', $time); 
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