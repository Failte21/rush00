<?php
	header('Location: /j04/ex04/index.html');
	session_start();
	if ($_SESSION['loggued_on_user'])
		$_SESSION['loggued_on_user'] = '';
?>
