<?php 
	session_start();
	if (!isset($_SESSION['type'])) {
		header("Location: index.php");
	}
 ?>
  <p>Вы зашли как
  	<?php if ($_SESSION['type'] == 1) {
  		echo "оператор ";
  	} else {
  		echo "администратор ";
  	} 
  	?>
  </p>
 <form action="<?php $_SERVER['PHP_SELF']?>" method="get">
		<input type="submit" name="exit" value="Выйти">
	</form>
	<?php 
		if (isset($_GET["exit"])) {
			unset($_SESSION['type']);
			session_destroy();
			header("Location: index.php");
		}
	 ?>