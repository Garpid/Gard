<?php
	// подключение библиотек
	require "secure/session.inc.php";
	require "../inc/lib.inc.php";
	require "../inc/db.inc.php";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$title = trim(strip_tags($_POST['title']));
		$author = trim(strip_tags($_POST['author']));
		$pubyear = trim(strip_tags($_POST['pubyear'])); 
		$price = trim(strip_tags($_POST['price']));
		}
	if(!addItemToCatalog($title, $author, $pubyear, $price)){
		echo 'Произошла ошибка при добавлении товара в каталог';
	} else {
		header("Location: add2cat.php");
		exit;
	}
	
?>