<?php
  $errorMessage = '';
  $index = 0;

      $db = new mysqli('localhost', 'root', 'digimon8', 'bieren'); 

  
  if ( $db->connect_errno > 0 )
  {
      $errorMessage = 'No connection' . $db->connect_error;
  }
  else{
    $errorMessage = "Connection complete";
    if(isset($_POST['submit']))
    {   
      $brnaam = $_POST['brnaam'];
      $adres = $_POST['adres'];
      $postcode = $_POST['postcode'];
      $gemeente = $_POST['gemeente'];
      $omzet = $_POST['omzet']; 

      $query = ' INSERT INTO brouwers (brnaam, adres, postcode, gemeente, omzet)
                VALUES ( ?, ?, ?, ?, ? )'
              ;
      $query->bind_param("ssisi", $brnaam, $adres, $postcode, $gemeente, $omzet);
      
      if($db->query($query))
      {      
       
        $errorMessage  = 'Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is ' ;
      }
      else
      {
        
        $errorMessage  = 'Er ging iets mis met het toevoegen, probeer opnieuw';
      }
   
    }
  }

?>

<!DOCTYPE html>
<html>
	<head>
		<title>CRUD INSERT</title>
    
	</head>
	<body>
    <p><?= $errorMessage ?></p>

    <?php if(isset($_POST['submit'])): ?>
      
      <p><?= $query ?></p>
    <?php endif ?>
    <form action="opdracht-crud-insert-oplossing.php" method="POST">
    
    <ul>      
        <p>Brouwernaam</p>
        <input type="text" name="brnaam" id="brnaam">
            
        <p>Adres</p>
        <input type="text" name="adres" id="adres">
            
        <p>Postcode</p>
        <input type="text" name="postcode" id="postcode">
            
        <p>Gemeente</p>
        <input type="text" name="gemeente" id="gemeente">
            
        <p>Omzet</p>
        <input type="text" name="omzet" id="omzet">
    </ul>
    
    <input type="submit" name="submit">
  </form>
    


	</body>
</html>