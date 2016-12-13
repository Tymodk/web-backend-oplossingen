<?php

  session_start();
  function __autoload( $classname ){
    require_once( $classname . '.php' );
  }


  if (isset($_POST['generatePassword'])){
    $generatedPassword  = generatePassword( 16, true, true, false, false);

    
    $_SESSION['registerInfo']['password'] = $generatedPassword;
    $_SESSION['registerInfo']['email']    = $_POST['email']; //To keep password 

    header('location:registratie-form.php');
  }
  if(isset($_POST['submit'])){
    $_SESSION['registerInfo']['password'] = $_POST['password'];
    $_SESSION['registerInfo']['email'] = $_POST['email'];
    // Validation for e-mail in php: http://www.w3schools.com/php/php_form_url_email.asp
    if (!filter_var($_SESSION['registerInfo']['email'] , FILTER_VALIDATE_EMAIL)) {
      $_SESSION['errorLog']['email'] = "Invalid email format";
    }
    else{
      unset($_SESSION['errorLog']['email']);
      
      // controleren of het emailadres reeds in de db voorkomt

      $connection = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', 'digimon8');
      $query = 'SELECT * 
                    FROM users 
                    WHERE email = :email';

      $query = $connection->prepare($query);  
      $query->bindValue(":email", $_SESSION['registerInfo']['email']);
      $query->execute();    
      $fetch   = array(); 
      while($row = $query->fetch(PDO::FETCH_ASSOC))
      {
        $fetch[] = $row;  
      }  
      if($fetch){
        $_SESSION['errorLog']['database'] = "Email already in database";
      }
      else{
        unset($_SESSION['errorLog']['database']);
        $salt = "50426043585012c9370411.98345789";
        $hashedPass = hash('sha512', ($_SESSION['registerInfo']['password']  . $salt));
        

        $query = "INSERT INTO `users` (`pk`, `email`, `salt`, `hashed_password`, `last_login_date`) 
                  VALUES (NULL, :email, :salt, :hash_password, now())";
        $query = $connection->prepare($query);  
        $query->bindValue(":email", $_SESSION['registerInfo']['email']);
        $query->bindValue(":salt", $salt);
        $query->bindValue(":hash_password", $hashedPass);
        $worked = $query->execute(); 
        if(!$worked)
        {
          $_SESSION['errorLog']['database'] = "Was not able to execute insert";
        }
        else{
          unset($_SESSION['errorLog']['database']);
        }
        setcookie('login', $_SESSION['registerInfo']['email'] . ',' . $hashedPass, time() + (86400 * 30));
      }
    }
    header('location:registratie-form.php');
  }



   function generatePassword($length, $numbers, $letters, $lettersUpper, $specials){
  
    $randomChars = '';   
    $allowedChars = array();
    $amountOfArrays = 0;
    
    if ($numbers) {
      $numbersArray = array(0,1,2,3,4,5,6,7,8,9); 
      $allowedChars[$amountOfArrays] = $numbersArray;
      $amountOfArrays++;
    }     
    if ($letters) {
      $lettersArray = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
      $allowedChars[$amountOfArrays] = $lettersArray;
      $amountOfArrays++;
    }     
    if ($lettersUpper) {
      $lettersUpperArray = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
      $allowedChars[$amountOfArrays] = $lettersUpperArray;
      $amountOfArrays++;
    }     
    if ($specials) {
      $specialsArray = array('&','~','#','{','[','-','\\','^','@', '=', '$', '£', '%', '*', '(');
        $allowedChars[$amountOfArrays] = $specialsArray;
        $amountOfArrays++;
    }
    
    $passwordLength = 0;
    
while($passwordLength < $length){
   $randomArray = rand(0, $amountOfArrays-1);
   $randomChar = rand(0, count($allowedChars[$randomArray])-1);
   $password .= $allowedChars[$randomArray][$randomChar]; // don't forget .= to append to string!!
   $passwordLength++;
}
    
    $password = str_shuffle($password); 
    
    return $password; 
  }




  

?>
