<?header('Content-Type: text/html;charset=utf-8;');?>
<?php
	require "inc/lib.inc.php";
	require "inc/db.inc.php";
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = trim(strip_tags($_POST['name']));
		$email = trim(strip_tags($_POST['email']));
		$phone = trim(strip_tags($_POST['phone'])); 
		$address = trim(strip_tags($_POST['address']));
		}
		$orderid = $basket['orderid'];
		$datetime = time();
$order = $name."|".$email."|".$phone."|".$address."|".$orderid."|".$datetime."\n";
	file_put_contents('admin/orders.log', $order, FILE_APPEND);
saveOrder($datetime);
?>
<html>
<head>
	<title>Сохранение данных заказа</title>
</head>
<body>
	<p>Ваш заказ принят.</p>
	<p><a href="catalog.php">Вернуться в каталог товаров</a></p>
</body>
</html>