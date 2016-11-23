<?php
	session_start();


	if (isset($_POST['submit']))
	{
		$_SESSION['data']['pagina-01-registratie']['e-mail'] = $_POST['e-mail'];
		$_SESSION['data']['pagina-01-registratie']['nickname'] = $_POST['nickname'];
 	}
 	$street = (isset($_SESSION['data']['pagina-02-adres']['street']))? $_SESSION['data']['pagina-02-adres']['street'] : '';
	$streetnr = (isset($_SESSION['data']['pagina-02-adres']['streetnr']))? $_SESSION['data']['pagina-02-adres']['streetnr'] : '';
	$city = (isset($_SESSION['data']['pagina-02-adres']['city']))? $_SESSION['data']['pagina-02-adres']['city'] : '';
	$zipcode = (isset($_SESSION['data']['pagina-02-adres']['zipcode']))? $_SESSION['data']['pagina-02-adres']['zipcode'] : '';
	/*
	if(isset($_GET['focus']))
	{
		$focusTar = $_GET['focus'];

	}
	=> Doesnt work need to define focusTar first (solved with shorthand if)
	*/
	(isset($_GET['focus']))? $focusTar = $_GET['focus'] : $focusTar = '';
if (isset($_GET['kill']))
	{
		($_GET['kill'])? session_destroy() : '';
	} 
	

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Adress</title>
	</head>
	<body>
		<?= var_dump($focusTar) ?><br>

		<?= var_dump($_SESSION) ?><br>
		<a href="opdracht-sessions-pagina-02-adres-oplossing.php?kill=True">Kill session</a>
		<h1>Register Data:</h1>
		<p>E-mail: <?= $_SESSION['data']['pagina-01-registratie']['e-mail'] ?></p>
		<p>Nickname: <?= $_SESSION['data']['pagina-01-registratie']['nickname'] ?></p>

		<h1>Adress Data</h1>
		<form action= "opdracht-sessions-pagina-03-overzicht-oplossing.php" method="POST">
            <p>Street</p>
            <input type="text" name="street" id="street" value="<?= $street ?>" <?= ($focusTar == "street")? 'autofocus' : '' ?>>
            <p>Street Nr.</p>
            <input type="number" name="streetnr" id="streetnr" value="<?= $streetnr ?>" <?= ($focusTar == "streetnr")? 'autofocus' : '' ?>>       
            <p>City</p>
            <input type="text" name="city" id="city" value="<?= $city ?>" <?= ($focusTar == "city")? 'autofocus' : '' ?>>
            <p>Zipcode</p>
            <input type="text" name="zipcode" id="zipcode" value="<?= $zipcode ?>" <?= ($focusTar == "zipcode")? 'autofocus' : '' ?> >
            <br>

            <input type="submit" name="submit" value="Volgende"> 
        </form>





	</body>
</html>