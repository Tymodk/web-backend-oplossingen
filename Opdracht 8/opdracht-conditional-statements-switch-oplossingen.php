<?php
	$dayNr = 5;
  $day = '';
  switch ($dayNr) {
     case 1:
       $day = 'maandag';
       break;

      case 2:
       $day = 'dinsdag';
       break;

      case 3:
       $day = 'wednesday';
       break;

      case 4:
       $day = 'donderdag'; 
       break;

      case 5:
       $day = 'vrijdag';
       break;

      case 6:
       $day = 'zaterdag'; 
       break;

      case 7:
       $day = 'zondag';
       break;

     default:
       $day = 'INVALID NR';
       break;
   } 


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Conditional statements</title>
	</head>
	<body>

        <h1>Switch case</h1>
         <p>De dag dat overeenkomt met nummer <?php echo $dayNr ?> is <?php echo $day ?></p>


	</body>
</html>