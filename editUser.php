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
	 $rows=$mysqli->query("SELECT username, password, type
		FROM users WHERE id_user=".$_GET['id_user']);
	 while ($st = mysqli_fetch_array($rows)) {
	 $id=$_GET['id_user'];
	 $name = $st['username'];
	 $password = $st['password'];
	 $type = $st['type'];
	 }
	print "<form action='save_editUser.php' metod='get'>";
	print "Логин: <input name='name' size='50' type='text'
	value='".$name."'>";
	print "<br>Пароль: <input name='password' size='20' type='password'
	value=>";
	if ($_SESSION['type'] == 2) {
		print "<br>тип пользователя: <select name='type'>
		<option value='1'>Оператор</option>
		<option value='1'>Администратор</option>
		</select>";
	} else {
		print "<input type='hidden' name='type' value='".$type."'> <br>";
	}
	
	print "<input type='hidden' name='id_user' value='".$id."'> <br>";
	print "<input type='submit' name='' value='Сохранить'>";
	print "</form>";
	print "<p><a href=\"table.php\"> Вернуться к списку
	пользователей </a>";
	?>
</body>
</html>