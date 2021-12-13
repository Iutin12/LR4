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
	 $rows=$mysqli->query("SELECT  name_bank, INN, country, lvl_class, active FROM bank WHERE
	id_bank=".$_GET['id_bank']);
	 while ($st = mysqli_fetch_array($rows)) {
	 $id=$_GET['id_bank'];
	 $name = $st['name_bank'];
	 $INN = $st['INN'];
	 $country = $st['country'];
	 $lvl_class = $st['lvl_class'];
	 $active = $st['active'];
	 }
	print "<form action='save_editBank.php' metod='get'>";
	print "Название: <input name='name' size='50' type='text'
	value='".$name."'>";
	print "<br>ИНН: <input name='INN' size='20' type='text'
	value='".$INN."'>";
	print "<br>Страна: <input name='country' size='20' type='text'
	value='".$country."'>";
	print "<br>класс надежности: <input name='lvl_class' size='30' type='text'
	value='".$lvl_class."'>";
	print "<br>объем вложений: <input name='active' size='30' type='text'
	value='".$active."'>";
	print "<input type='hidden' name='id_bank' value='".$id."'> <br>";
	print "<input type='submit' name='' value='Сохранить'>";
	print "</form>";
	print "<p><a href=\"index.php\"> Вернуться к списку
	банков </a>";
	?>
</body>
</html>