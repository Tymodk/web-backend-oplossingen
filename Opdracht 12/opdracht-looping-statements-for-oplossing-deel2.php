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
      .oneven
      {
        background-color: green;
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
      
        <?php for ( $index = 1; $index <= $rijen; ++$index): ?>
        
          <tr>

            <?php for ( $index2 = 1; $index2 <= $kolommen; ++$index2): ?>
          
            <td class="<?= ( ( $index * $index2 ) % 2 == 1 ) ? 'oneven' : '' ?>"><?= $index * $index2 ?></td>
              
          
            <?php endfor ?>
        
          </tr>
      
        <?php endfor ?>
    
    </table>

	</body>
</html>