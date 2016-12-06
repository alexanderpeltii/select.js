<?php
require_once('connect.php');
echo $action ;
$action = (isset($_POST['action']))?$_POST['action']:'';
if($action=='') die();
 echo $action();
 //print_r($action());
 
function getCategory(){
	global $pdo;
	$themes = (isset($_POST['themes']))?$_POST['themes']:'';
	//echo $themes;
	$q = "SELECT DISTINCT category FROM books WHERE themes IS NOT NULL AND themes='$themes'";
	$rez = $pdo->query($q);
	return json_encode( $rez->fetchAll(PDO::FETCH_COLUMN)); 
}

 function getBooks(){
 	global $pdo;
 	$category = (isset($_POST['category']))?$_POST['category']:'';
 //echo $category;
 	$q = "SELECT DISTINCT name FROM books WHERE category IS NOT NULL AND category='$category'";
	$rez = $pdo->query($q);
	return json_encode( $rez->fetchAll(PDO::FETCH_COLUMN)); 
 }
?>