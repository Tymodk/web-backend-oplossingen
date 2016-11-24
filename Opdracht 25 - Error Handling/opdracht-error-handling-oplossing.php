<?php
	session_start();
	$isValid = false; 

	try{
		if(isset($_POST['submit'])){

			if(isset($_POST['code'])){
				if($_POST['code'] == 8){
					$isValid = true;
				}
				else{
					$isValid = false;
					throw new Exception('VALIDATION-CODE-LENGTH');
				}
			}
			else{
				throw new Exception('SUBMIT-ERROR');
			}

		}
	}
	catch(Exception $e){
		$messageCode = $e->getMessage();
		$message = array();
		$createMessage = false;

		switch($messageCode){
			case 'SUBMIT-ERROR':
				$message['type'] = "error";
				$message['text'] = "Er werd met het formulier geknoeid";
				break;
			case 'VALIDATION-CODE-LENGTH':
				$message['type'] = "error";
				$message['text'] = "De kortingscode heeft niet de juiste lengte";
				$createMessage = true;
				break;
		
		}
		if($createMessage){createMessage($message);}
		logToFile($message);
		$MessageToShow = showMessage();


	}
	function createMessage($message){
		$_SESSION['message'] = $message;
	}
	function showMessage(){
		if(isset($_SESSION['message'])){
			$message = $_SESSION['message'];
			unset($_SESSION['message']);
			return $message;
		}
		else{
			return false;
		}

	}
	function logToFile($message){
		$date = date('d F Y, g:i:s A', time());
		$ip = $_SERVER['REMOTE_ADDR'];
		$fullErrorMsg = "[" . $date . "] - " . $ip . " - type:[" . $message['type'] . "] " . $message['text'] . "\n\r";
		file_put_contents('log.txt', $fullErrorMsg, FILE_APPEND);
	}
?>

<!DOCTYPE html>
<html>
	<head>

	</head>
	<body>
		<?php if($MessageToShow): ?>
			<p><?= $MessageToShow['text'] ?></p>
		<?php endif ?>
		<?php if(!$isValid): ?>
		<form action="opdracht-error-handling-oplossing.php" method="POST">
			<ul>					
				<p>Kortingscode</p>
				<input type="text" id="code" name="code">					
			</ul>
			<input type="submit" name="submit">
		</form>
	<?php else: ?>
	<p>Korting toegekend!</p>
<?php endif ?>





	</body>