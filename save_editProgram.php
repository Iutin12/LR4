<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Александр Иутин</title>
</head>
<body>
	<?php
	 define ("HOST", "localhost");
	define ("USER", "a0608785_proc");
	define ("PASS", "egiret16");
	define ("DB", "a0608785_proc"); // установление соединения с сервером
	 // подключение к базе данных:
	 $mysqli = mysqli_connect(HOST, USER, PASS, DB) or die ("Невозможно
	подключиться к серверу");
	 $mysqli->query('SET NAMES UTF-8');
	 $zapros="UPDATE programm_deposits SET name_deposit='".$_GET['name_deposit'].
	"', godovoi='".$_GET['godovoi']."', id_bank='".$_GET['id_bank']."' WHERE id_programm_deposit="
	.$_GET['id_programm_deposit'];
	 $mysqli->query($zapros);
	 if (mysqli_affected_rows($mysqli)>0) {
	 echo 'Все сохранено. <a href="index.php"> Вернуться к списку
	программ </a>'; }
	 else { echo 'Ошибка сохранения. <a href="index.php">
	Вернуться к списку программ</a> '; }
	?>

</body>
</html>