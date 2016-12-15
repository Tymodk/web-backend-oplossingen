<?php
	session_start();
	define('ROOT', dirname(__FILE__));
	if (isset($_POST['submit'])){
		$email = $_POST['email'];
		if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/png"))
		&& ($_FILES["file"]["size"] < 2000000)){
			if($_FILES["file"]["error"] > 0){
				$_SESSION["fileError"]["message"] = "Een probleem met het uploaden (errcode: " . $_FILES["file"]["error"];
			}
			else{
				$fileName = time() . $_FILES["file"]["name"];
				
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
      			if(!$fetch){
        			$_SESSION['fileError']['message'] = "Email not present in database";
      			}
      			else{
      				if (file_exists(ROOT . "/img/" . $fileName)){	
						while(file_exists(ROOT . "/img/" . $fileName)){
							$fileName = time() . $_FILES["file"]["name"];
						}
					} 
					else{	
						move_uploaded_file($_FILES["file"]["tmp_name"], (ROOT . "/img/" . $fileName));					
						
						$query = "UPDATE `users` SET `profile_picture` = :fileLoc WHERE `users`.`email` = :email";
        				$query = $connection->prepare($query);  
        				$query->bindValue(":email", $email);        				
        				$query->bindValue(":fileLoc", $fileName);
        				$worked = $query->execute(); 
        				if($worked){$_SESSION["fileError"]["message"] = "Uploaded img";}
        				
					}
      			}			
				
			}
		}
		else{
			$_SESSION["fileError"]["message"] = "Ongeldig bestand kijk na of het bestand on 2MB is";
		}
	
	}
	header('location:gegevens-wijzigen-form.php');
?>