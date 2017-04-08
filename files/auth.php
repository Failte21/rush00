<?php
	function auth($login, $passwd)
	{
		$content = file_get_contents("../private/passwd");
		$array = unserialize($content);
		foreach ($array as $element)
		{
			if ($element['login'] === $login && $element['passwd'] ===
				hash("whirlpool", $passwd))
				return (TRUE);
		}
		return (FALSE);
	}
?>
