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
	 $rows=$mysqli->query("SELECT name_deposit, godovoi, id_bank FROM programm_deposits WHERE
	id_programm_deposit=".$_GET['id_programm_deposit']);
	  $banks=$mysqli->query("SELECT id_bank, name_bank FROM bank ");
	 while ($st = mysqli_fetch_array($rows)) {
	 $id_programm_deposit=$_GET['id_programm_deposit'];
	 $name_deposit = $st['name_deposit'];
	 $godovoi = $st['godovoi'];
	 $id_bank_cuurent = $st['id_bank'];
	 }
	print "<form action='save_editProgram.php' metod='get'>";
	print "Название: <input name='name_deposit' size='50' type='text'
	value='".$name_deposit."'>";
	print "<br>годовой %: <input name='godovoi' size='20' type='text'
	value='".$godovoi."'>";
	print "<br> Банк <select name='id_bank' value=".$id_bank_cuurent.">";
		while ($row = mysqli_fetch_array($banks)) {
			if ($id_bank_cuurent == $row['id_bank']) {
				print "<option value='" . $row['id_bank'] ."' selected='selected'>" . $row['name_bank'] ."</option>";
			} else {print "<option value='" . $row['id_bank'] ."'>" . $row['name_bank'] ."</option>";}
		    
		}
		print "</select>";
	print "<input type='hidden' name='id_programm_deposit' value='".$id_programm_deposit."'> <br>";
	print "<input type='submit' name='' value='Сохранить'>";
	print "</form>";
	print "<p><a href=\"table.php\"> Вернуться к списку
	программ </a>";
	?>
</body>
</html>