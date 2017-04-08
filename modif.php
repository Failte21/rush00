<?php
	header('Location: /j04/ex04/index.html');
	if ($_POST["submit"] === "OK" && $_POST["login"] && $_POST["oldpw"] &&
		$_POST["newpw"] && file_exists("../private/passwd"))
	{
		$content = file_get_contents("../private/passwd");
		$array = unserialize($content);
		$error = TRUE;
		$new_array = array();
		foreach ($array as $elem)
		{
			if ($elem['login'] === $_POST['login'] && $elem['passwd'] ===
				hash('whirlpool', $_POST['oldpw']))
			{
				$elem['passwd'] = hash('whirlpool', $_POST['newpw']);
				$error = FALSE;
			}
			$new_array[] = $elem;
		}
		if ($error)
			echo("ERROR\n");
		else
		{
			$new = serialize($new_array);
			file_put_contents("../private/passwd", $new);
			echo "OK\n";
		}
	}
	else
		echo("ERROR\n");
?>
