<?php
  session_start(); 
  $isLoggedIn= false;
  if(isset($_COOKIE['login'])){ $isLoggedIn = true; }

  $loggedOutMsg = '';
  if(isset($_SESSION['notification'])){
    $loggedOutMsg = $_SESSION['notification'];
  }
  if(isset($_COOKIE['login'])){ header('location:dashboard.php'); }
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Security</title>
    
	</head>
	<body>
    <pre><?= var_dump($_SESSION) ?></pre>
    <pre><?= var_dump($_COOKIE) ?></pre>
   <?php if($loggedOutMsg): ?>
    <?= $loggedOutMsg ?>      
   <?php endif ?>
   
   <?php if($isLoggedIn):?>
      <h2>U bent al reeds ingelogd klik <a href='dashboard.php'>hier</a> om naar het dashboard te gaan<h2>
    <?php else: ?>
      <form action="login-process.php" method="post">
      <ul>
        <li>
          <p>Email<p>
          <input type="text" name="email" id="email">
        </li>
        
        <li>
          <p>Paswoord</p>
          <input type="password" name="password" id="password">
     
        </li>
      </ul>
      
      <input type="submit" name="submit" value="log in">
    </form>
    <p>Nog geen gebruiker registreer dan <a href="registratie-form.php">hier</a>!</p>
   <?php endif ?>
	</body>
</html>