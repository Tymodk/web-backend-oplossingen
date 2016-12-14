<?php
   session_start();
  
   
    if(!isset($_COOKIE['login'])){	
        //redirect!!
        $_SESSION['errorlog']['nologin'] = "You have to log in first";
        header('location:login-form.php');
    }
    else{
        $cookieData = explode(',', $_COOKIE['login'] );
        $email = $cookieData[0];
        
        $hashedEmail = $cookieData[1];
        $connection = new PDO('mysql:host=localhost;dbname=opdracht-file-upload', 'root', 'digimon8');
        $query = 'SELECT * 
                    FROM users 
                    WHERE email = :email';

      $query = $connection->prepare($query);  
      $query->bindValue(":email", $email);
      $query->execute();    
      $fetch   = array(); 
      while($row = $query->fetch(PDO::FETCH_ASSOC))
      {
        $fetch[] = $row;  
      } 
      $isValidUser = false;
      if(isset($fetch[0])){
        $salt = $fetch[0]['salt'];

        $testSalt = hash('sha512', $salt . $email);
        if($testSalt = $hashedEmail){
          $isValidUser = true;
        }
        else{
          $isValidUser = false; 
          unset($_COOKIE['login']);
          $_SESSION['errorlog']['validation'] = "Not valid";

        }
      }
      else{
        $isValidUser = false;
        $_SESSION['errorlog']['database'] = "No such user";

      }



    }
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Dashboard</title>
	</head>
	<body>
     
     <?php if($isValidUser): ?>
        <h1>Dashboard</h1>





        <a href="gegevens-wijzigen-form.php">Gegevens wijzigen</a>
        <p>____________________________________________________________</p>
        <a href='logout.php'>Uitloggen</a>

     <?php endif ?>

	</body>
</html>