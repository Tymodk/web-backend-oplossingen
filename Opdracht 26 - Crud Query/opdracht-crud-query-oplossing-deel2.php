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
  

    $query = 'SELECT brnaam, brouwernr 
              FROM  brouwers
             '
              ;
    $result = $db->query($query);
    $fetchAssoc   = array(); 
    while($row = $result->fetch_assoc())
      {
        $fetchAssoc[] = $row;  
      }
  }
  if(isset($_GET['brouwernr'])){
    

    $query = 'SELECT bieren.naam from bieren WHERE bieren.brouwernr = ' . $_GET['brouwernr'];

    $result = $db->query($query);
    $fetchAssoc2   = array(); 
    while($row = $result->fetch_assoc())
      {
        $fetchAssoc2[] = $row;  
      }
  }
  else{
     $query = 'SELECT bieren.naam from bieren';
     $result = $db->query($query);
    $fetchAssoc2   = array(); 
    while($row = $result->fetch_assoc())
      {
        $fetchAssoc2[] = $row;  
      }
  }
?>

<!DOCTYPE html>
<html>
	<head>
		<title>CRUD QUERY DEEL 1</title>
    <style>
        .odd{background-color: lightgrey;}
    </style>
	</head>
	<body>
    <p><?= $errorMessage ?></p>
    <p><?= $query ?></p>
    <h1>Overzicht van de bieren</h1>
      <form action="opdracht-crud-query-oplossing-deel2.php" method="GET">
    
    <select name="brouwernr">
      <?php foreach ($fetchAssoc as $brouwer): ?>
        <option value="<?= $brouwer['brouwernr'] ?>" )> <?= $brouwer['brnaam'] ?></option>
      <?php endforeach ?>
    </select>
    <input type="submit" value="Geef mij alle bieren van deze brouwerij">
  </form>



    <table>
      <thead>
        <tr>
          <th>Aantal</th>
          <th>Naam</th>
        <tr>
      </thead>
      <tbody>
      <?php foreach ($fetchAssoc2 as $row): ?>
          <tr class="<?= ($index % 2 == 1 )? 'odd' : '' ?>">
            <td><?= $index++ ?> </td>
            <td><?= $row['naam']?></td>

          </tr>      
      <?php endforeach ?>
    </tbody>
    </table>
     


	</body>
</html>