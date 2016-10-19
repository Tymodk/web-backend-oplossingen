<?php
  $username = 'Tymo';
  $password = '1994deKock';
  $isPassword = '';
  $isPosted = False; 
  if(isset($_POST['username'])&& isset($_POST['password']))
  {
    $isPosted = True;
    if($_POST['username'] == $username && $_POST['password'] == $password)
    {
      $isPassword = 'True';
    }
    else{
      $isPassword = 'False';
    }
  } 

?>

<!DOCTYPE html>
<html>
	<head>
		<title>POST (login)</title>
	</head>
	<body>

        <form action= "opdracht-post-oplossing.php" method="POST">
            <p>Username</p>
            <input type="text" name="username" id="username">
            <p>Password</p>
            <input type="password" name="password" id="password">
            <br>

            <input type="submit"> 
        </form>
        <?php if($isPosted): ?>
          <p>Submitted password is: <?= $isPassword ?></p>
        <?php endif ?>
	</body>
</html>