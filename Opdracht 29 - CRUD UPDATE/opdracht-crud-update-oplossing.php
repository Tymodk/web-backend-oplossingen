<?php
  $errorMessage = '';
  $index = 0;
  $confirmDelete = false;
  $toEdit = false;
   $db = new mysqli('localhost', 'root', 'digimon8', 'bieren'); 
  $queryStmt = "No query found";
  
  if ( $db->connect_errno > 0 )
  {
      $errorMessage = 'No connection' . $db->connect_error;
  }
  else{
    $errorMessage = "Connection complete";
  

    $query = 'SELECT * 
              FROM  brouwers          
              '
              ;
    $result = $db->query($query);
    $fetchAssoc   = array(); 
    while($row = $result->fetch_assoc())
      {
        $fetchAssoc[] = $row;  
      }
    if(isset($_POST['deleteProxy'])){
      $confirmDelete = true;
    }
    if(isset($_POST['delete'])){
       $confirmDelete = false;
       $brouwernr = $_POST['delete'];
       $queryStmt = 'DELETE FROM brouwers WHERE brouwernr = ?';
       $query = $db->prepare($queryStmt);   
       $query->bind_param("i", $brouwernr);
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
              WHERE brouwernr =      
              ' . $brouwernr 
              ;
      /*$query = $db->prepare($queryStmt);  
      $query->bind_param("i", $brouwernr);*/
      $result = $db->query($query);
      $brouwerFetch   = array(); 
      while($row = $result->fetch_assoc())
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
                      SET brnaam = ? , adres = ? , postcode = ?, gemeente = ?, omzet= ?)
                      WHERE brouwernr = ?';
              ;
       $queryUpdate = $db->prepare($queryStmtUpdate);   
       $queryUpdate->bind_param("ssisii", $brnaam, $adres, $postcode, $gemeente, $omzet, $brouwernr);
       $didUpdateWork = $db->query($queryUpdate);
       if($didUpdateWork){

        $errorMessage = "Brouwer was updated!";
       }
       else{
        $errorMessage = "Brouwer failed to update";
       }
       
       
      
      

    }
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
    
    <?php if($confirmDelete): ?>
    <div class="sure">
      <form action="opdracht-crud-update-oplossing.php" method="POST">
        <p>ARE YOU SURE YOU WANT TO DELETE THIS ROW?</p>
        <button type="submit" name="delete" value="<?= $_POST['deleteProxy'] ?>">VERY SURE</button>
        <button type="submit" name="doNotDelete" value="false">NO WAY JOSE</button>
      </form>
    </div>
    <p><?= var_dump($_POST['deleteProxy'])?></p>
    <?php endif ?>

    <?php if($toEdit): ?>
    <h1> Brouwer <?= $brouwerFetch[0]['brnaam'] ?> # <?= $_POST['edit'] ?> </h1>
      <form action="opdracht-crud-update-oplossing.php" method="POST">    
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
    <form action="opdracht-crud-update-oplossing.php" method="POST">
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