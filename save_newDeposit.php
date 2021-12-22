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
	 $sql_add = "INSERT INTO deposits SET data_create='" . $_GET['data_create']
	."', id_programm_deposits='".$_GET['id_programm_deposits']."', start_sum='"
	.$_GET['start_sum']."'";
	 $mysqli->query($sql_add); // Выполнение запроса
	 if (mysqli_affected_rows($mysqli)>0) // если нет ошибок при выполнении запроса
	 { print "<p>Спасибо, вы зарегистрировали вклад в базе данных.";
	 print "<p><a href=\"table.php\"> Вернуться к списку
	вкладов </a>"; }
	 else { print "Ошибка сохранения. <a href=\"table.php\">
	Вернуться к списку вкладов </a>"; }
	?>
</body>
</html>