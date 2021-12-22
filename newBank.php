<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Александр Иутин</title>
</head>
<body>
	<?php include ("checkSession.php"); ?>
	<H2>Регистрация Банка:</H2>
	<form action="save_newBank.php" metod="get">
	 Название: <input name="name" size="50" type="text">
	<br>ИНН: <input name="INN" size="20" type="text">
	<br>Страна: <input name="country" size="20" type="text">
	<br>класс надежности: <input name="lvl_class" size="30" type="text">
	<br>объем активов: <input name="active" size="30" type="text">
	<p><input name="add" type="submit" value="Добавить">
	<input name="b2" type="reset" value="Очистить"></p>
	</form>
	<p>
	<a href="table.php"> Вернуться к списку банков </a>
</body>
</html>