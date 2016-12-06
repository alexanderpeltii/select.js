<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
require_once('connect.php');
require_once('classSelect.php');

$rez = $pdo->query('SELECT DISTINCT themes FROM books WHERE themes IS NOT NULL');
//echo $rez->rowCount().'<br>';
/*$a = $rez->fetch();//исп при выборке 1 столбца
echo '<pre>'.print_r($a,thrue).'</pre>';*/


?>

<form name="booksForm">
	<?php
		$themes = new Select('themes');
		$themes->addItem('Выберети тему','');
   		while($row = $rez->fetch()){
   			$themes->addItem($row['themes'], $row['themes']);
   		}

		echo $themes;
	?>
</form>
<?php
?>
<script src="script.js"></script>
</body>
</html>