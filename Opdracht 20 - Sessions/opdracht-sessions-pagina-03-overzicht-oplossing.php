<?php
	session_start();
	if (isset($_POST['submit']))
	{
		$_SESSION['data']['pagina-02-adres']['street'] = $_POST['street'];
		$_SESSION['data']['pagina-02-adres']['streetnr'] = $_POST['streetnr'];
		$_SESSION['data']['pagina-02-adres']['city'] = $_POST['city'];
		$_SESSION['data']['pagina-02-adres']['zipcode'] = $_POST['zipcode'];
 	}
 	$dataArray = $_SESSION['data'];
 	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Summary</title>
	</head>
	<body>
	<ul>
		<?php foreach($dataArray as $pageId => $innerDataArray ):  ?>
			<?php foreach ($innerDataArray as $dataTitle => $value): ?>
				<p><?= $dataTitle ?>: <?= $value ?> | <a href="opdracht-sessions-<?= $pageId ?>-oplossing.php?focus=<?= $dataTitle ?>">Wijzig</a></p>
			<?php endforeach ?>	
		<?php endforeach ?>
	</ul>


	</body>
</html>