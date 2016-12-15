<?php
   session_start();
   if(isset($_POST['submit'])){
   	$_SESSION['formInfo']['email'] = $_POST['email'];
   	$_SESSION['formInfo']['message'] = $_POST['message'];
   	$_SESSION['formInfo']['checkbox'] = ($_POST['sendCopy'] != NULL)? 'checked' : '';

   		if (!filter_var($_SESSION['formInfo']['email'] , FILTER_VALIDATE_EMAIL)) {
   			$_SESSION['errorLog']['email'] = "Email not valid, try again.";
   			header('location:contact-form.php');
   		}
   		else{
   			unset($_SESSION['errorLog']['email']);
   			$admin = "tymo.dekock@student.kdg.be";
   			$emailSender = $_POST['email'];
   			$message = $_POST['message'];
   			$copy = ($_POST['sendCopy'] != NULL)? true : false;
   			$connection = new PDO('mysql:host=localhost;dbname=contact-messages', 'root', 'digimon8');
   			$query = "INSERT INTO `contact_messages` (`pk`, `email`, `message`, `time_sent`) 
                  VALUES (NULL, :email, :message,  now())";
       		$query = $connection->prepare($query);  
        	$query->bindValue(":email", $emailSender);
        	$query->bindValue(":message", $message);        
        	$worked = $query->execute(); 
        	if(!$worked)
        	{
        	  $_SESSION['errorLog']['database'] = "Was not able to execute insert";
        	}
        	else{
        	  unset($_SESSION['errorLog']['database']);
        	  $to = $admin; 
        	  $title = "Contact to "  . $admin;
        	  $message = "<h2> Beste, </h2>" ;
        	  $message .= "<p> Hier is een bericht van" . $emailSender . "<p>";
        	  $message .= "<p>" . $message . "</p>";
        	  $headers = "From: " . $emailSender;

        	  $isSent = mail( $to, $title, $message, $headers);
        	  $copySent = true; 
        	  if($copy){
        	  	$to = $admin; 
        	  	$title = "Copy from contact to "  . $admin;
        	  	$message = "<h2> Beste, </h2>" ;
        	  	$message .= "<p> Hier is uw copy van het bericht aan" . $admin . "<p>";
        	  	$message .= "<p>" . $message . "</p>";
        	  	$headers = "From: server ";       	  	

        	  	$copySent = mail( $to, $title, $message, $headers);
        	  }
        	  if($isSent && $copySent){
        	  	$_SESSION['errorLog']['success'] = "Email(s) sent!";
        	  }
        	  else{
        	  	$_SESSION['errorLog']['success'] = "Email(s) not sent, try again.";
        	  }
        	}

	
   		}
   }
   







   header('location:contact-form.php');
?>
