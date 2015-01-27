<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/db.inc.php";
	$id =(int)$_GET['del'];
deleteItemFromBasket($id);
header("Location: basket.php");
?>