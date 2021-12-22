<?

header('Content-Type: application/vnd.ms-excel; format=attachment;');
header('Content-Disposition: attachment; filename= Лаба4.xls');
header('Expires: Mon, 18 Jul 1998 01:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
include ("checkSession.php");
define ("HOST", "localhost");
	define ("USER", "a0608785_proc");
	define ("PASS", "egiret16");
	define ("DB", "a0608785_proc"); // установление соединения с сервером
	 // подключение к базе данных:
	 $mysqli = mysqli_connect(HOST, USER, PASS, DB) or die ("Невозможно
	подключиться к серверу");

?>

<meta http-equiv="content-type" content="text/html; charset=utf-8">

<table>

<tr>

<th>№ п/п</th> 
<th>Наименование банка</th> 
<th>страна</th> 
<th>класс надежности</th> 
<th>% годовых</th> 
<th>сумма вклада</th>
</tr>
<?php 
$deposits=$mysqli->query("SELECT id_deposit, data_create, id_programm_deposits, start_sum
	FROM deposits"); 

$count= 0;
while ($row=mysqli_fetch_array($deposits)) {
	$name_bank = $mysqli->query("SELECT name_bank, country, lvl_class FROM bank WHERE id_bank = (SELECT id_bank FROM programm_deposits WHERE id_programm_deposit =". $row['id_programm_deposits'].")");
	$bank = mysqli_fetch_array($name_bank);
	$stavka = $mysqli->query("SELECT godovoi FROM programm_deposits WHERE id_programm_deposit =". $row['id_programm_deposits']);
	$godovoi = mysqli_fetch_array($stavka);

	
	$count++;
	

	echo "<tr>";
	echo "<td>". $count ."</td>";
	echo "<td>". $bank['name_bank'] ."</td>";
	echo "<td>". $bank['country'] ."</td>";
	echo "<td>". $bank['lvl_class'] ."</td>";
	echo "<td>". $godovoi['godovoi'] ."</td>";
	echo "<td>". $row['start_sum'] ."</td>";
	echo "</tr>";
};
 ?>


</table>