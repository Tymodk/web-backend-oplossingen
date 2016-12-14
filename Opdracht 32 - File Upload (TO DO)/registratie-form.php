<?php
  session_start();

  $email = ''; // to not get errors from form requiring these vars
  $password = ''; // ^
  $errors = '';
  if(isset($_SESSION['errorLog'])){
  $errors = $_SESSION['errorLog'];  
  }
  if(isset($_SESSION['registerInfo'])){
    $email = $_SESSION['registerInfo']['email'];
    $password = $_SESSION['registerInfo']['password'];
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
   <?php if($errors): ?>
      <?php foreach ($errors as $error) ?>        
      <p><?= $error ?></p>
   <?php endif ?>
   <form action="registratie-process.php" method="post">
      <ul>
        <li>
          <p>Email<p>
          <input type="text" name="email" id="email" value= "<?= $email ?>">
        </li>
        
        <li>
          <p>Paswoord</p>
          <input type="<?= ($password !='')? 'text' : 'password' ?>" name="password" id="password" value= "<?= $password ?>">
          <input type="submit" name="generatePassword" value="genereer een paswoord">
        </li>
      </ul>
      
      <input type="submit" name="submit" value="Registreer">
    </form>
	</body>
</html>