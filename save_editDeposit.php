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
	define ("DB", "a0608785_proc"); // установление соединения с сервером
	 // подключение к базе данных:
	 $mysqli = mysqli_connect(HOST, USER, PASS, DB) or die ("Невозможно
	подключиться к серверу");
	 $mysqli->query('SET NAMES UTF-8');
	 $zapros="UPDATE deposits SET data_create='".$_GET['data_create'].
	"', id_programm_deposits='".$_GET['id_programm_deposits']."', start_sum='"
	.$_GET['start_sum']."' WHERE id_deposit="
	.$_GET['id_deposit'];
	 $mysqli->query($zapros);
	 if (mysqli_affected_rows($mysqli)>0) {
	 echo 'Все сохранено. <a href="table.php"> Вернуться к списку
	вкладов </a>'; }
	 else { echo 'Ошибка сохранения. <a href="table.php">
	Вернуться к списку вкладов</a> '; }
	?>

</body>
</html>