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
	 $rows=$mysqli->query("SELECT data_create, id_programm_deposits,
	start_sum FROM deposits WHERE
	id_deposit=".$_GET['id_deposit']);
	 $programms=$mysqli->query("SELECT id_programm_deposit, name_deposit FROM programm_deposits");
	 while ($st = mysqli_fetch_array($rows)) {
	 $id=$_GET['id_deposit'];
	 $data_create = $st['data_create'];
	 $id_programm_deposits = $st['id_programm_deposits'];
	 $start_sum = $st['start_sum'];
	 }
	print "<form action='save_editDeposit.php' metod='get'>";
	print "Дата вклада: <input name='data_create' size='50' type='text'
	value='".$data_create."'>";
	print "<br>ID программы вкладов <select name='id_programm_deposits' >";
		while ($row = mysqli_fetch_array($programms)) {
			if ($id_programm_deposits == $row['id_programm_deposit']) {
				print "<option value='" . $row['id_programm_deposit'] ."' selected='selected'>" . $row['name_deposit'] ."</option>";
			}else {print "<option value='" . $row['id_programm_deposit'] ."'>" . $row['name_deposit'] ."</option>";}
		    
		}
		print "</select>";
	print "<br>стартовая сумма: <input name='start_sum' size='20' type='text'
	value='".$start_sum."'>";
	print "<input type='hidden' name='id_deposit' value='".$id."'> <br>";
	print "<input type='submit' name='' value='Сохранить'>";
	print "</form>";
	print "<p><a href=\"index.php\"> Вернуться к списку
	вкладов </a>";
	?>
</body>
</html>