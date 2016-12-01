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
            <button type="submit" name="delete" value="<?= $row['brouwernr'] ?>">
                <img src="icon-delete.png" alt="Delete button">
            </button>
            </td>


          </tr>      
      <?php endforeach ?>
    </tbody>
    </table>
     


	</body>
</html>