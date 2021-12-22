<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=	, initial-scale=1.0">
	<title>Александр Иутин</title>
</head>
<body>
	<form action="<?php $_SERVER['PHP_SELF']?>" method="get">
		<h2>Авторизация</h2>
		username: <input type="text" name="user"> <br>
		password: <input type="password" name="password"> <br>
		<input type="submit" name="come" value="Войти">  <br>
		<input type="submit" name="reset" value="Очистить">  <br>
	</form>
	<?php
	define ("HOST", "localhost");
	define ("USER", "a0608785_proc");
	define ("PASS", "egiret16");
	define ("DB", "a0608785_proc"); // установление соединения с сервером
	 // подключение к базе данных:
	 $mysqli = mysqli_connect(HOST, USER, PASS, DB) or die ("Невозможно
	подключиться к серверу");
	if (isset($_GET["come"])) {
		$user=$mysqli->query("SELECT id_user, username, password, type
		FROM users"); 
		// Ввод
		$username = $_GET["user"];
		$password = $_GET["password"];
		// Для индитификации входа
		$idCome = false;
		// Проверка вводимых данных
		while ($data = mysqli_fetch_array($user)) {
		$usernameBD = $data['username'];
		$passwordBD = $data['password'];
		$typeBD = $data['type'];
		$idUserBD = $data['id_user'];
		
			if ($username === $usernameBD and md5($password) === $passwordBD) {
				$idCome = true;
				session_start();
				$_SESSION['type'] = $typeBD;
				$_SESSION['id_user'] = $idUserBD;
				break;
			} else {
				$idCome = false;
			}
		}

		if ($idCome) {
			header("Location: table.php");
		} else { 
			echo "Логин или пароль введен не верно";
			
		}
	}
	 ?>
</body>
</html>