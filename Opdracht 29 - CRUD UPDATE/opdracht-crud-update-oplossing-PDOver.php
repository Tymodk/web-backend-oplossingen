<?php
  $errorMessage = '';
  $index = 0;
  $confirmDelete = false;
  $toEdit = false;
   try
  {

    $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'digimon8'); // Connectie maken
    $errorMessage = 'Connectie dmv PDO geslaagd.';
  
  
  

    $queryStmt = "No query found";
    $query = 'SELECT * 
              FROM  brouwers          
              '
              ;
    $result = $db->prepare($query);
    $result->execute();
    $fetchAssoc   = array(); 
    while($row = $result->fetch(PDO::FETCH_ASSOC))
      {
        $fetchAssoc[] = $row;  
      }
    if(isset($_POST['deleteProxy'])){
      $confirmDelete = true;
    }
    if(isset($_POST['delete'])){
       $confirmDelete = false;
       $brouwernr = $_POST['delete'];
       $queryStmt = 'DELETE FROM brouwers WHERE brouwernr = :brouwernr';
       $query = $db->prepare($queryStmt);   
       $query->bindValue(":brouwernr", $brouwernr);
       $delete = $query->execute();
       if($delete){
        $errorMessage = "Row deleted";

      }
      else{
        $errorMessage = "Row cannot be deleted";
      }

    }
    if(isset($_POST['edit'])){ 
      $toEdit = true;

      $brouwernr = $_POST['edit'];
      $query = 'SELECT * 
              FROM  brouwers 
              WHERE brouwernr = :brouwernr '  
              ;
      $query = $db->prepare($query);  
      $query->bindValue(":brouwernr", $brouwernr);
      $query->execute();
      $brouwerFetch   = array(); 
      while($row = $query->fetch(PDO::FETCH_ASSOC))
      {
        $brouwerFetch[] = $row;  
      }

    }
    if(isset($_POST['submit'])){
      $brnaam = $_POST['brnaam'];
      $adres = $_POST['adres'];
      $postcode = $_POST['postcode'];
      $gemeente = $_POST['gemeente'];
      $omzet = $_POST['omzet'];
      $brouwernr = $_POST['brouwernr'];
      
       $queryStmtUpdate = ' UPDATE brouwers 
                      SET brnaam = :brnaam , adres = :adres , postcode = :postcode, gemeente = :gemeente, omzet= :omzet
                      WHERE brouwernr = :brouwernr';
       $queryUpdate = $db->prepare($queryStmtUpdate);
       $queryUpdate->bindValue(":brouwernr", $brouwernr);
       $queryUpdate->bindValue(":brnaam", $brnaam);
       $queryUpdate->bindValue(":adres", $adres);
       $queryUpdate->bindValue(":postcode", $postcode);
       $queryUpdate->bindValue(":gemeente", $gemeente);
       $queryUpdate->bindValue(":omzet", $omzet);   
      
       $didUpdateWork = $queryUpdate->execute();
       if($didUpdateWork){

        $errorMessage = "Brouwer was updated!";
       }
       else{
        $errorMessage = "Brouwer failed to update";
       }
       
       
      
      

      }
    }
    catch ( PDOException $e )
  {
    $errorMessage = 'Er ging iets mis: ' . $e->getMessage();
  }
  
?>

<!DOCTYPE html>
<html>
	<head>
		<title>CRUD UPDATE</title>
    <style>
        .odd{background-color: lightgrey;}
        .sure{background-color: red;}
    </style>
	</head>
	<body>
    <p><?= $errorMessage ?></p>
    <p><?= $queryStmt ?></p>
    <p><?= var_dump($brouwerFetch)?></p>
    <?php if($confirmDelete): ?>
    <div class="sure">
      <form action="opdracht-crud-update-oplossing-PDOver.php" method="POST">
        <p>ARE YOU SURE YOU WANT TO DELETE THIS ROW?</p>
        <button type="submit" name="delete" value="<?= $_POST['deleteProxy'] ?>">VERY SURE</button>
        <button type="submit" name="doNotDelete" value="false">NO WAY JOSE</button>
      </form>
    </div>
    <p><?= var_dump($_POST['deleteProxy'])?></p>
    <?php endif ?>

    <?php if($toEdit): ?>

    
    
    <h1> Brouwer <?= $brouwerFetch[0]['brnaam'] ?> # <?= $_POST['edit'] ?> </h1>
      <form action="opdracht-crud-update-oplossing-PDOver.php" method="POST">    
    <ul>      
     
        <p>Brouwernaam </p>
        <input type="text" name="brnaam" id="brnaam" value="<?= $brouwerFetch[0]['brnaam']?>">
            
        <p>Adres</p>
        <input type="text" name="adres" id="adres" value="<?= $brouwerFetch[0]['adres']?>">
            
        <p>Postcode</p>
        <input type="text" name="postcode" id="postcode" value="<?= $brouwerFetch[0]['postcode']?>">
            
        <p>Gemeente</p>
        <input type="text" name="gemeente" id="gemeente" value="<?= $brouwerFetch[0]['gemeente']?>">
            
        <p>Omzet</p>
        <input type="text" name="omzet" id="omzet" value="<?= $brouwerFetch[0]['omzet']?>">
      
    </ul>
    <input type="hidden" name="brouwernr"  value="<?= $brouwerFetch[0]['brouwernr']?>">
    <input type="submit" name="submit" value="Wijzig brouwer <?= $_POST['edit'] ?>">
  </form>
    <?php endif ?>




    <h1>Overzicht brouwers</h1>
    <form action="opdracht-crud-update-oplossing-PDOver.php" method="POST">
    <table>
      <thead>
        <tr>
          <th># </th><th>brouwernr</th><th> brnaam </th><th>adres</th><th> postcode </th><th> gemeente </th><th>omzet</th><th>Del</th><th>Edit</th>
        <tr>
      </thead>
      <tbody>
      <?php foreach ($fetchAssoc as $row): ?>
          <tr class="<?= ($index % 2 == 1 )? 'odd' : '' ?>">
            <td><?= $index++ ?> </td>            
            <td><?= $row['brouwernr']?> </td>
            <td><?= $row['brnaam']?> </td> 
            <td><?= $row['adres']?> </td> 
            <td><?= $row['postcode']?> </td> 
            <td><?= $row['gemeente']?> </td> 
            <td><?= $row['omzet']?> </td> 
            <td>
            <button type="submit" name="deleteProxy" value="<?= $row['brouwernr'] ?>">
                <img src="icon-delete.png" alt="Del button">
            </button>
            </td>
            <td>
            <button type="submit" name="edit" value="<?= $row['brouwernr'] ?>">
                <img src="icon-edit.png" alt="Del button">
            </button>
            </td>


          </tr>      
      <?php endforeach ?>
    </tbody>
    </table>
    </form>


	</body>
</html>