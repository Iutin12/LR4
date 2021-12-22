<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Александр Иутин</title>
</head>
<body>
	<?php
	 // Подключение к базе данных:
	include ("checkSession.php");
	 define ("HOST", "localhost");
	define ("USER", "a0608785_proc");
	define ("PASS", "egiret16");
	define ("DB", "a0608785_proc"); // установление соединения с сервером
	 // подключение к базе данных:
	 $mysqli = mysqli_connect(HOST, USER, PASS, DB) or die ("Невозможно
	подключиться к серверу");
	 $mysqli->query('SET NAMES UTF-8'); // Тип кодировки
	 // Строка запроса на добавление записи в таблицу:
	 $sql_add = "INSERT INTO users SET username='".$_GET['name'].
	"', password='" .md5($_GET['password'])."', type='".$_GET['type']. "'";

	 $users=$mysqli->query("SELECT id_user, username, password, type FROM users");
	 $check = false;
	  while ($st = mysqli_fetch_array($users)) {
		 if ($st['username'] == $_GET['name']) {
		 	print "<p>Такой пользователь уже зарегестрирован.";
	 		print "<p><a href=\"Proc.php\"> Вернуться к списку пользователей </a>";
	 		$check = true;
		 }
	 }
	 if (!$check) {
	 	$mysqli->query($sql_add); // Выполнение запроса
	 if (mysqli_affected_rows($mysqli)>0) // если нет ошибок при выполнении запроса
	 { print "<p>Спасибо, вы зарегистрированы в базе данных.";
	 print "<p><a href=\"table.php\"> Вернуться к списку
	пользователей </a>"; }
	 else { print "Ошибка сохранения. <a href=\"table.php\">
	Вернуться к списку пользователей </a>"; }	 
	}	 
	?>
</body>
</html>