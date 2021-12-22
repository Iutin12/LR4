<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Александр Иутин</title>
</head>
<body>
	<?php include ("checkSession.php"); ?>
	<H2>Регистрация на сайте:</H2>
	<form action="save_newProgram.php" metod="get">
	 Название: <input name="name_deposit" size="50" type="text">
	<br>% годовых: <input name="godovoi" size="20" type="text">
	<br>
	ID Банка:
	<?php 
	
 	ddefine ("HOST", "localhost");
	define ("USER", "a0608785_proc");
	define ("PASS", "egiret16");
	define ("DB", "a0608785_proc"); // установление соединения с сервером
	 // подключение к базе данных:
	 $mysqli = mysqli_connect(HOST, USER, PASS, DB) or die ("Невозможно
	подключиться к серверу");
	 $mysqli->query('SET NAMES UTF-8');
	 $rows=$mysqli->query("SELECT id_bank, name_bank FROM bank");
	echo "<select name='id_bank'>";
		while ($row = mysqli_fetch_array($rows)) {
		    echo "<option value='" . $row['id_bank'] ."'>" . $row['name_bank'] ."</option>";
		}
		echo "</select>";
		 ?>
	<p><input name="add" type="submit" value="Добавить">
	<input name="b2" type="reset" value="Очистить"></p>
	</form>
	<p>
	<a href="table.php"> Вернуться к списку программ </a>
</body>
</html>