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
	define ("HOST", "localhost");
	define ("USER", "a0608785_proc");
	define ("PASS", "egiret16");
	define ("DB", "a0608785_proc"); // установление соединения с сервером
	 // подключение к базе данных:
	 $mysqli = mysqli_connect(HOST, USER, PASS, DB) or die ("Невозможно
	подключиться к серверу");
	 $mysqli->query('SET NAMES UTF-8'); // Тип кодировки
	 // Строка запроса на добавление записи в таблицу:
	$sql_add = "INSERT INTO bank SET name_bank='" . $_GET['name']
	."', INN='".$_GET['INN']."', country='"
	.$_GET['country']."', lvl_class='".$_GET['lvl_class'].
	"', active='".$_GET['active']. "'";
	 $mysqli->query($sql_add); // Выполнение запроса
	 if (mysqli_affected_rows($mysqli)>0) // если нет ошибок при выполнении запроса
	 { print "<p>Спасибо, вы зарегистрированы в базе данных.";
	 print "<p><a href=\"index.php\"> Вернуться к списку
	пользователей </a>"; }
	 else { print "Ошибка сохранения.".$mysqli->query($sql_add). " <a href=\"index.php\">
	Вернуться к списку банков </a>"; }
	?>
</body>
</html>