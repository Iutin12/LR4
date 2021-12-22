<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Александр Иутин</title>
</head>
<body>
	<?php include ("checkSession.php"); ?>
	<H2>Регистрация вклада:</H2>
	<form action="save_newDeposit.php" metod="get">
	 Дата вклада: <input name="data_create" size="50" type="date">
	<br>
	ID программы вклада:
	<?php 
	
 	define ("HOST", "localhost");
	define ("USER", "a0608785_proc");
	define ("PASS", "egiret16");
	define ("DB", "a0608785_proc"); // установление соединения с сервером
	 // подключение к базе данных:
	 $mysqli = mysqli_connect(HOST, USER, PASS, DB) or die ("Невозможно
	подключиться к серверу");
	 $mysqli->query('SET NAMES UTF-8');
	 $rows=$mysqli->query("SELECT id_programm_deposit, name_deposit FROM programm_deposits");
	echo "<select name='id_programm_deposits'>";
		while ($row = mysqli_fetch_array($rows)) {
		    echo "<option value='" . $row['id_programm_deposit'] ."'>" . $row['name_deposit'] ."</option>";
		}
		echo "</select>";
		 ?>
	<br>стартовая сумма: <input name="start_sum" rows="4" cols="40">
	<p><input name="add" type="submit" value="Добавить">
	<input name="b2" type="reset" value="Очистить"></p>
	</form>
	<p>
	<a href="table.php"> Вернуться к списку вкладов </a>
</body>
</html>