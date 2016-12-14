<?php
  session_start();
 
  if(isset($_POST['submit'])){
    $password = $_POST['password'];
    $email = $_POST['email'];
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
      if(!$fetch[0]['email']){
        $_SESSION['notification'] = "User not found";
        header('location:login-form.php');
        
      }
      else{
        $salt = $fetch[0]['salt'];
        $hashedPass = hash('sha512', $password . $salt);
        if($hashedPass == $fetch[0]['hashed_password']){
          setcookie('login', $email . ',' . hash('sha512', $email . $salt), time() + (86400 * 30));
          header('location:dashboard.php');
        }
        else{
          $_SESSION['notification'] = "Password is incorrect try again";
          header('location:login-form.php');
        }
        
      }



  }
  else{header('location:login-form.php');}
    


  

?>
