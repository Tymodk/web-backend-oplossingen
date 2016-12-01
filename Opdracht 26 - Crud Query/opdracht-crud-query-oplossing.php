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
  

    $query = 'SELECT * 
              FROM bieren
              INNER JOIN brouwers
              ON brouwers.brouwernr = bieren.brouwernr

              WHERE bieren.naam like "du%" AND brouwers.brnaam like "%a%"'
              ;
    $result = $db->query($query);
    $fetchAssoc   = array(); 
    while($row = $result->fetch_assoc())
      {
        $fetchAssoc[] = $row;  
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
    <table>
      <thead>
        <tr>
          <th># </th><th>biernr (pk) </th><th>naam </th><th>brouwernr</th><th> soortnr </th><th>alcohol</th>
          <th> brnaam </th><th>adres</th><th> postcode </th><th> gemeente </th><th>omzet</th>
        <tr>
      </thead>
      <tbody>
      <?php foreach ($fetchAssoc as $row): ?>
          <tr class="<?= ($index % 2 == 1 )? 'odd' : '' ?>">
            <td><?= $index++ ?> </td>
            <td><?= $row['biernr']?> </td>
            <td><?= $row['naam']?> </td>
            <td><?= $row['brouwernr']?> </td>
            <td><?= $row['soortnr']?> </td>
            <td><?= $row['alcohol']?> </td> 
            <td><?= $row['brnaam']?> </td> 
            <td><?= $row['adres']?> </td> 
            <td><?= $row['postcode']?> </td> 
            <td><?= $row['gemeente']?> </td> 
            <td><?= $row['omzet']?> </td> 


          </tr>      
      <?php endforeach ?>
    </tbody>
    </table>
     


	</body>
</html>