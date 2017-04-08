<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>LOGIN</title>
</head>
<body>
  <?php include("includes/header.php");?>
  <form action="login.php" method="post">
		Indentifiant : <input type="text" name="login"><br>
		Mot de passe : <input type="password" name="passwd">
		<input type="submit" name="submit" value="OK"></br>
	</form>
	<a href="create.html">Inscription</a>
	<a href="modif.html">Modifier son mot de passe</a>
</body>
</html>
