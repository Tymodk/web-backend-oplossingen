<?php
  $regex = '';
  $searchString = '';
  $result = false;

  if(isset($_POST['submit']))
  {
    $regex =  $_POST[ 'regex' ]; //cant put '/' here because it'll be filled in form
    $searchString = $_POST['string' ];
    $replaceString  = '<span class=\'regex\'>#</span>';
    $result   = preg_replace( '/' .$regex . '/', $replaceString, $searchString );
  }
  $regexOplossingen[0] = 'Eerste opdracht: [a-du-zA-DU-Z] OF [^e-tE-T]';
  $regexOplossingen[1] = 'colou?r';
  $regexOplossingen[2] = '1\d{3}';
  $regexOplossingen[3] = '[0-9]{2}[\/\-\.][0-9]{2}[\/\-\.][0-9]{4}';




  
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Regex </title>
    <style>
    .regex
    {
      width: 5px;
      color:  red;
    }
  </style>
	</head>
	<body>
    <pre><?= var_dump($regexOplossingen) ?></pre>

	 <form action="opdracht-regular-expressions-oplossing.php" method="POST">
      
      <ul>
        <li>
          <p>Regular expression</p>
          <input type="text" name="regex" id="regex" value="<?= $regex ?>">
        </li>
        <li>
          <p>String</p>
          <textarea name="string" id="string"><?= $searchString ?></textarea>
        </li>
      </ul>
      <input type="submit" name="submit">
    </form>
    <?php if($result): ?>
      <h4><?=$result?></h4>
    <?php endif?>



	</body>
</html>