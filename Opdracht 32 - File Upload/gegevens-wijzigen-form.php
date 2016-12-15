<?php
   session_start();
   
   $isPlaceholder = true;
   $fileError = '';
   $imgLoc = '';
   if(!isset($_COOKIE['login'])){ 
        //redirect!!
        $_SESSION['errorlog']['nologin'] = "You have to log in first";
        header('location:login-form.php');
    }
    else{
        $cookieData = explode(',', $_COOKIE['login'] );
        $email = $cookieData[0];
    }
    if(isset($_SESSION["fileError"]["message"])){
      $fileError = $_SESSION["fileError"]["message"];
      unset($_SESSION["fileError"]["message"]);
    }
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
    if($fetch[0]['profile_picture']){
      $isPlaceholder = false;
      $imgLoc = $fetch[0]['profile_picture'];

    }


?>

<!DOCTYPE html>
<html>
	<head>
    <style>
      body{margin-left: 10px;}
      .top{  
        border-bottom: solid 1px;
        padding-bottom: 5px;
        margin-right: 150px;


        }
      a {text-decoration: none;}
      .image{
        width: 200px;
        height: 200px;
      }

    </style>
		<title> Wijzigen gegevens</title>
	</head>
	<body>
    <p class="top"><a href="dashboard.php">Terug naar dashboard</a> | Ingelogd als <?= $email?> | <a href='logout.php'>Uitloggen</a></p>
    <h1>Gegevens bewerken</h1>
    <p>Profielfoto</p>
    <?php if($fileError):?>
      <p><?=$fileError?></p>
    <?php endif ?>
    <form action="gegevens-process.php" method="post" enctype="multipart/form-data">
      <ul>
      <img class="image" src="img/<?= ($isPlaceholder)? 'placeholder.png' : $imgLoc?>" alt="<?= $email?>">
    </ul>
    <ul>
      
      <p>Bestand:</p>
      <input type="file" name="file" id="file"> 
    </ul>
    <ul>
      <p>E-mail:</p>
      <input type="text" name="email" id="email" value="<?= $email?>">

    </ul>
    <ul>
      <input type="submit" name="submit" value="Gegevens wijzigen">
    </ul>
    </form>

  </section>


	</body>
</html>