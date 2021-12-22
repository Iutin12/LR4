<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=	, initial-scale=1.0">
	<title>Александр Иутин</title>
</head>
<body>
	<?php
	//f0592623_proc admin f0592623_proc
	include ("checkSession.php");
	define ("HOST", "localhost");
	define ("USER", "a0608785_proc");
	define ("PASS", "egiret16");
	define ("DB", "a0608785_proc"); // установление соединения с сервером
	 // подключение к базе данных:
	 $mysqli = mysqli_connect(HOST, USER, PASS, DB) or die ("Невозможно
	подключиться к серверу");
	?>
	<h2>Зарегистрированные банки:</h2>
	<table border="1">
	 <th> id </th><th> Название </th> <th> ИНН </th><th> страна </th><th> класс надежности </th> <th> Объем активов </th>
	 <th> Редактировать </th> <th> Уничтожить </th> </tr>
	<?php
	$result=$mysqli->query("SELECT id_bank, name_bank, INN, country, lvl_class, active
	FROM bank"); // запрос на выборку сведений о пользователях
	while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
	 echo "<tr>";
	 echo "<td >" . $row['id_bank'] . "</td>";
	 echo "<td >" . $row['name_bank'] . "</td>";
	 echo "<td >" . $row['INN'] . "</td>";
	 echo "<td>" . $row['country'] . "</td>";
	 echo "<td>" . $row['lvl_class'] . "</td>";
	 echo "<td>" . $row['active'] . "</td>";
	 echo "<td><a href='editBank.php?id_bank=" . $row['id_bank']
	. "' '>Редактировать</a></td>"; // запуск скрипта для редактирования
	if ($_SESSION['type'] == 2) {
		echo "<td><a href='deleteBank.php?id_bank=" . $row['id_bank']
	. "'>Удалить</a></td>";
	} else {
	echo "<td> </td>";
	}
	 echo "</tr>";
	}
	print "</table>";
	$num_rows = mysqli_num_rows($result); // число записей в таблице БД
	print("<P>Всего банков: $num_rows </p>");
	?>
	<p> <a href="newBank.php"> Добавить банк </a>
		<br>
	<h2>Программы депозитов</h2>
	<table border="1">
	<tr> 
	 <th> id </th> <th> Название </th> <th> % годовых </th> </tr>
	<?php
	$result=$mysqli->query("SELECT id_programm_deposit, name_deposit, godovoi
	FROM programm_deposits"); // запрос на выборку сведений о пользователях
	while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
	 echo "<tr>";
	 echo "<td >" . $row['id_programm_deposit'] . "</td>";
	 echo "<td >" . $row['name_deposit'] . "</td>";
	 echo "<td >" . $row['godovoi'] . "</td>";
	 echo "<td><a href='editProgram.php?id_programm_deposit=" . $row['id_programm_deposit']
	. "' '>Редактировать</a></td>"; // запуск скрипта для редактирования
	if ($_SESSION['type'] == 2) {
		echo "<td><a href='deleteProgram.php?id_programm_deposit=" . $row['id_programm_deposit']
	. "'>Удалить</a></td>";
	} else {
	echo "<td> </td>";
	}
	 echo "</tr>";
	}
	print "</table>";
	$num_rows = mysqli_num_rows($result); // число записей в таблице БД
	print("<P>Всего Программ: $num_rows </p>");
	?>
	<p> <a href="newProgram.php"> Добавить программу </a>
		<br>
	<h2>Депозиты</h2>

	<table border="1">
	<tr> 
	 <th> id </th><th> Дата создания вклада </th> <th> id программы депозита </th> <th> ID Банка </th> <th> стартовая сумма </th> </tr>
	<?php
	$result=$mysqli->query("SELECT id_deposit, data_create, id_programm_deposits, start_sum
	FROM deposits"); // запрос на выборку сведений о пользователях
	while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
	 echo "<tr>";
	 echo "<td >" . $row['id_deposit'] . "</td>";
	 echo "<td >" . $row['data_create'] . "</td>";
	 echo "<td >" . $row['id_programm_deposits'] . "</td>";
	 echo "<td >" . $row['start_sum'] . "</td>";
	 echo "<td><a href='editDeposit.php?id_deposit=" . $row['id_deposit']
	. "' '>Редактировать</a></td>"; // запуск скрипта для редактирования
	if ($_SESSION['type'] == 2) {
		echo "<td><a href='deleteDeposit.php?id_deposit=" . $row['id_deposit']
	. "'>Удалить</a></td>";
	} else {
	echo "<td> </td>";
	}
	 echo "</tr>";
	}
	print "</table>";
	$num_rows = mysqli_num_rows($result); // число записей в таблице БД
	print("<P>Всего вкладов: $num_rows </p>");
	?>
	<p> <a href="newDeposit.php"> Добавить вклад </a>
		<br>
	<?php
	if ($_SESSION['type'] == 2) {
		echo "<table border='1'>
			<tr> // Пользователи сайта. Только для администратора
			 <th> id </th><th> username </th> <th> password </th> <th> type </th> ";
		$result=$mysqli->query("SELECT id_user, username, password, type
		FROM users"); // запрос на выборку сведений о пользователях
		while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
		 echo "<tr>";
		 echo "<td >" . $row['id_user'] . "</td>";
		 echo "<td >" . $row['username'] . "</td>";
		 echo "<td >" . $row['password'] . "</td>";
		 echo "<td >" . $row['type'] . "</td>";
		 echo "<td><a href='editUser.php?id_user=" . $row['id_user']
		. "' '>Редактировать</a></td>";
		echo "<td><a href='deleteUser.php?id_user=" . $row['id_user']
		. "'>Удалить</a></td>";
		 echo "</tr>";
		}
		print "</table>";
		print "<a href='newUser.php'> Добавить пользователя </a>";
	} else {
		echo "<table border='1'>
			<tr> // Ваши данные
			 <th> username </th> <th> password </th> <th> type </th> ";
		$result=$mysqli->query("SELECT username, password, type
		FROM users WHERE id_user = ". $_SESSION["id_user"]);
		while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
		 echo "<tr>";
		 echo "<td >" . $row['username'] . "</td>";
		 echo "<td >" . $row['password'] . "</td>";
		 echo "<td >" . $row['type'] . "</td>";
		 echo "<td><a href='editUser.php?id_user=" . $_SESSION['id_user']
		. "' '>Редактировать</a></td>";
		 echo "</tr>";
		}
		print "</table>";
	}
	?>
	
		<br>
	<?php 
		if (!isset($_SESSION['type'])) {
			echo "<a href='gen_pdf.php'>Сгенерировать пдф файл</a> <br>
	<a href='gen_xls.php'>Сгенерировать xls файл</a>";
		}
	 ?>
		<a href="gen_pdf.php"> генерация пдф </a>
		<br>
		<a href="gen_xls.php"> генерация xls </a>
</body>
</html>