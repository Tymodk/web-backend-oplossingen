<?php
  $errorMessage = '';
  $index = 0;
  $confirmDelete = false;
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
  }
  
?>

<!DOCTYPE html>
<html>
	<head>
		<title>CRUD QUERY DEEL 1</title>
    <style>
        .odd{background-color: lightgrey;}
        .sure{background-color: red;}
    </style>
	</head>
	<body>
    <p><?= $errorMessage ?></p>
    <p><?= $queryStmt ?></p>
    <h1>Overzicht van de bieren</h1>
    <?php if($confirmDelete): ?>
    <div class="sure">
      <form action="opdracht-crud-delete-oplossing-deel2.php" method="POST">
        <p>ARE YOU SURE YOU WANT TO DELETE THIS ROW?</p>
        <button type="submit" name="delete" value="<?= $_POST['deleteProxy'] ?>">VERY SURE</button>
        <button type="submit" name="doNotDelete" value="false">NO WAY JOSE</button>

      </form>
    </div>
    <p><?= var_dump($_POST['deleteProxy'])?></p>
    <?php endif ?>
    <form action="opdracht-crud-delete-oplossing-deel2.php" method="POST">
    <table>
      <thead>
        <tr>
          <th># </th><th>brouwernr</th><th> brnaam </th><th>adres</th><th> postcode </th><th> gemeente </th><th>omzet</th><th>Del</th>
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


          </tr>      
      <?php endforeach ?>
    </tbody>
    </table>
    </form>


	</body>
</html>