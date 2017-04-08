<?php
	header('Location: /j04/ex04/index.html');
	function check($content)
	{
		if ($content[0])
		{
			foreach ($content as $elem)
			{
				foreach	($elem as $key => $value)
				{
					if ($key === 'login' && $value === $_POST['login'])
						return (FALSE);
				}
			}
		}
		return (TRUE);
	}

	$error = FALSE;
	if ($_POST["submit"] == "OK" && $_POST["login"] && $_POST["passwd"])
	{
		$array = array("login"=>$_POST["login"], "passwd"=>(hash("whirlpool",
			$_POST["passwd"])));
		if (!file_exists("../private"))
		{
			mkdir("../private");
			$content = array();
		}
		else
		{
			if (!file_exists("../private/passwd"))
				file_put_contents("../private/passwd", "");
			$content = file_get_contents("../private/passwd");
			$content = unserialize($content);
		}
		if (!check($content))
			echo "ERROR\n";
		else
		{
			$content[] = $array;
			$ser = serialize($content);
			file_put_contents("../private/passwd", $ser);
			echo("OK\n");
		}
	}
	else
		echo "ERROR\n";
?>
