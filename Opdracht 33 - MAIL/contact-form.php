<?php
   session_start();


   $email = '';
   $message = '';
   $errors = '';
   if(isset($_SESSION['formInfo'])){
   	$email = $_SESSION['formInfo']['email'];
   	$message = $_SESSION['formInfo']['message'];
   	$copy = $_SESSION['formInfo']['checkbox'];
   }
   if(isset($_SESSION['errorLog'])){
   $errors = $_SESSION['errorLog'];  
   }


  
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Contact Form</title>
	</head>
	<body>
	<?php if($errors): ?>
      <?php foreach ($errors as $error) ?>        
      	<p><?= $error ?></p>
   <?php endif ?>
   <pre><?= var_dump($_SESSION) ?></pre>
     <form action="contact.php" method="post" id="mail-form">				
				<ul>			
						<p>Emailadres</p>
						<input type="text" id="email" name="email" value="<?=$email?>">				
				
						<p>Boodschap</p>
						<textarea id="message" name="message"><?=$message?></textarea>					
				
						<p>Stuur een kopie naar mezelf</p>
						<input type="checkbox" id="sendCopy" name="sendCopy" <?=$copy?>>					
				</ul>				
				<input type="submit" id="submit" name="submit">
			</form>
	</body>
</html>