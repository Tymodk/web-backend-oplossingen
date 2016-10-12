<?php
    $rijen = 10;
    $kolommen = 10;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>For loop</title>
	</head>
  <style>
      table
      {
        border-collapse:collapse;
      }

      td
      {
        padding: 15px;
        border: 1px solid;
      }
      </style>
	<body>

        <h1>For loop</h1>
       <table>
      
        <?php for ( $index = 0; $index < $rijen; ++$index): ?>
        
          <tr>

            <?php for ( $index2 = 0; $index2 < $kolommen; ++$index2): ?>
          
              <td>Kolom</td>
          
            <?php endfor ?>
        
          </tr>
      
        <?php endfor ?>
    
    </table>

	</body>
</html>