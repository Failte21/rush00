<?php
	session_start();
	if ($_SESSION['loggued_on_user'])
	{
		if ($_POST['submit'] == 'OK')
		{
			if (!file_exists("../private/chat"))
			{
				$array = array(array('time'=>time(), 'login'=>$_SESSION['loggued_on_user'], 'msg'=>$_POST['msg']));
				$new = serialize($array);
				file_put_contents("../private/chat", $new);
			}
			else
			{
				$fd = fopen("../private/chat", "c+");
				flock($fd, LOCK_EX | LOCK_SH));
				$content = file_get_contents("../private/chat");
				$array = unserialize($content);
				$array[] = array('login'=>$_SESSION['loggued_on_user'], 'time'=>time(), 'msg'=>$_POST['msg']);
				$new = serialize($array);
				file_put_contents("../private/chat", $new);
				flock($fd, LOCK_UN);
			}
		}
	}
?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<form action="speak.php" method="post"/>
			<?php echo $_SESSION["loggued_on_user"].": "?><input type="text" name="msg">
			<input type="submit" name="submit" value="OK"><br>
		</form>
	</body>
	</html>
<?php
	}
	else
		echo "ERROR\n";
?>
