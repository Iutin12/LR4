<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Александр Иутин</title>
</head>
<body>
	<?php
	include ("checkSession.php");	 
	define ("HOST", "localhost");
	define ("USER", "a0608785_proc");
	define ("PASS", "egiret16");
	define ("DB", "a0608785_proc");// установление соединения с сервером
	 // подключение к базе данных:
	 $mysqli = mysqli_connect(HOST, USER, PASS, DB) or die ("Невозможно
	подключиться к серверу");
	$mysqli->query('SET NAMES UTF-8');
	 $zapros="UPDATE users SET username='".$_GET['name'].
	"', password='" .md5($_GET['password'])."', type='".$_GET['type'].
	"' WHERE id_user=" .$_GET['id_user'];

	$users=$mysqli->query("SELECT id_user, username, password, type FROM users");
	 $check = false;
	  while ($st = mysqli_fetch_array($users)) {
		 if ($st['username'] == $_GET['name']) {
		 	print "<p>Такой пользователь уже зарегестрирован.";
	 		print "<p><a href=\"table.php\"> Вернуться к списку пользователей </a>";
	 		$check = true;
		 }
	 }
	 if (!$check) {
	 $mysqli->query($zapros);
	 if (mysqli_affected_rows($mysqli)>0) {
	 echo 'Все сохранено. <a href="table.php"> Вернуться к списку
	пользователей </a>'; }
	 else { echo 'Ошибка сохранения. <a href="table.php">
	Вернуться к списку пользователей</a> '; }	 
	}
	 
	?>

</body>
</html>