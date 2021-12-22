<?php 
include ("checkSession.php");
	require_once('tcpdf_min/tcpdf.php');
	ob_clean();

	define ("HOST", "localhost");
	define ("USER", "a0608785_proc");
	define ("PASS", "egiret16");
	define ("DB", "a0608785_proc"); // установление соединения с сервером
	 // подключение к базе данных:
	 $mysqli = mysqli_connect(HOST, USER, PASS, DB) or die ("Невозможно
	подключиться к серверу");

	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
// Устанавливаем информацию о документе
$pdf->SetAuthor('Имя автора');
$pdf->SetTitle('Название документа');
// Устанавливаем данные заголовка по умолчанию
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
// Устанавливаем верхний и нижний колонтитулы
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// Устанавливаем моноширинный шрифт по умолчанию
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// Устанавливаем отступы
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// Устанавливаем автоматические разрывы страниц
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
//указываем путь к файлу
$font = 'Roboto-Medium.ttf';
// преобразуем шрифт
$fontname = TCPDF_FONTS::addTTFfont($font, 'TrueTypeUnicode', '', 96);
$pdf->SetFont($fontname, '', 14, '', true);
// Добавляем страницу
$pdf->AddPage();

$deposits=$mysqli->query("SELECT id_deposit, data_create, id_programm_deposits, start_sum
	FROM deposits"); 


$count= 0;
while ($row=mysqli_fetch_array($deposits)) {
	$name_bank = $mysqli->query("SELECT name_bank, country, lvl_class FROM bank WHERE id_bank = (SELECT id_bank FROM programm_deposits WHERE id_programm_deposit =". $row['id_programm_deposits'].")");
	$bank = mysqli_fetch_array($name_bank);
	$stavka = $mysqli->query("SELECT godovoi FROM programm_deposits WHERE id_programm_deposit =". $row['id_programm_deposits']);
	$godovoi = mysqli_fetch_array($stavka);

	$count++;
	$rows = $rows. "<tr>";
	$rows = $rows. "<td>". $count ."</td>";
	$rows = $rows. "<td>". $bank['name_bank'] ."</td>";
	$rows = $rows. "<td>". $bank['country'] ."</td>";
	$rows = $rows. "<td>". $bank['lvl_class'] ."</td>";
	$rows = $rows. "<td>". $godovoi['godovoi'] ."</td>";
	$rows = $rows. "<td>". $row['start_sum'] ."</td>";
	$rows = $rows. "</tr>";
};

// Устанавливаем текст
$html = "
<h2> Операционные системы </h2>
	<table>
		<tr>
			<td>№ п/п</td> <td>Наименование банка</td> <td>страна</td> <td>класс надежности</td> <td>% годовых</td> <td>сумма вклада</td>
		</tr>
	
". $rows ."</table>";
// Выводим текст с помощью writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// Закрываем и выводим PDF документ
$pdf->Output('document.pdf', 'I');
?>

	
 ?>