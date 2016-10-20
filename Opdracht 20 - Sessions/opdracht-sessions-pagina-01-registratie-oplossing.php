<?php
	session_start(); 

	$email = (isset($_SESSION['data']['pagina-01-registratie']['e-mail']))? $_SESSION['data']['pagina-01-registratie']['e-mail'] : '';
	$nickname = (isset($_SESSION['data']['pagina-01-registratie']['nickname']))? $_SESSION['data']['pagina-01-registratie']['nickname'] : '';
	
	(isset($_GET['focus']))? $focusTar = $_GET['focus'] : $focusTar = '';
	if (isset($_GET['kill']))
	{
		($_GET['kill'])? session_destroy() : '';
	} 
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
	</head>
	<body>
		<?= var_dump($_SESSION) ?><br>
		<a href="opdracht-sessions-pagina-01-registratie-oplossing.php?kill=True">Kill session</a>

		<form action= "opdracht-sessions-pagina-02-adres-oplossing.php" method="POST">
            <p>E-mail</p>
            <input type="text" name="e-mail" id="e-mail" value="<?= $email ?>" <?php ($focusTar == 'e-mail')? 'autofocus' : '' ?>>
            <p>Nickname</p>
            <input type="text" name="nickname" id="nickname" value="<?= $nickname ?>" <?php ($focusTar == 'nickname')? 'autofocus' : '' ?>>       

            <input type="submit" name="submit" value="Volgende"> 
        </form>




	</body>
</html>