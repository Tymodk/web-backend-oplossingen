<?php
   $userdata = explode( ',', file_get_contents('passwords.txt'));
   $isUserCorrect = false;
   $isAlreadyLoggedIn = false;

   if(isset($_GET['logout'])){
   		setcookie('loggedin', '', time() - 3600);
   		header('location: opdracht-cookies-oplossing.php');

   }
   //Cookie not set -> set cookie
    if(!isset($_COOKIE['loggedin'])){	
    	if(isset($_POST['submit'])){
   			if($_POST['username'] == $userdata[0] && $_POST['password'] == $userdata[1])
   				{
   					$isUserCorrect = true;
   					setcookie('loggedin', true, time() + 3600);
   					header('location: opdracht-cookies-oplossing.php');
	
   				}
   			else{
   				$isUserCorrect = false;
   			}
    	}
    }
    else{
    	$isAlreadyLoggedIn = true;
    	$isUserCorrect = true;
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Cookies Oplossing</title>
	</head>
	<body>
     <?php if (!$isUserCorrect): ?>
      	<pre>Nog niet ingelogd / fout paswoord</pre>
     <?php endif ?>
     <?php if (!$isAlreadyLoggedIn): ?>
      			<form action="opdracht-cookies-oplossing.php" method="post">
					<ul>
						<li>
							<p>Gebruikersnaam: </p>
							<input type="text" name="username" id="username">
						</li>
						<li>
							<p>Paswoord: <p>
							<input type="password" name="password" id="password">
						</li>
					</ul>
					<input type="submit" name="submit" value="log in">
				</form>
	 <?php else: ?>
	 		<a href="opdracht-cookies-oplossing.php?logout=true"> Log Out </a>
	 <?php endif ?>



	</body>
</html>