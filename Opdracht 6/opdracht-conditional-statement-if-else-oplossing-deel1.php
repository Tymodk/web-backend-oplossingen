<?php
	
    $jaar            =   1900;
    $isSchrik    =   NULL;

    if ( $jaar % 4 == 0 )
    {
        $isSchrik = "een";
    }
    if ( ($jaar % 100 == 0) && ($jaar % 400 != 0) )
    {
        $isSchrik = "geen";
    }
    
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Conditional statements</title>
	</head>
	<body>

        <h1>Cond statement: if Else </h1>

		<p><?php echo $jaar ?> is <?php echo $isSchrik ?> schrikkeljaar</p>
	</body>
</html>