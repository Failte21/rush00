<?php
	if (file_exists("../private/chat"))
	{
		$content = file_get_contents("../private/chat");
		$array = unserialize($content);
		foreach($array as $value)
		{
			echo "[";
			echo date("H:i", $value['time']);
			echo "] ";
			echo "<b>";
			echo $value['login'];
			echo "</b>: ";
			echo $value['msg'];
			echo "<br />\n";
		}
	}
?>
