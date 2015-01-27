<?php
	require "secure/session.inc.php";
	require "../inc/lib.inc.php";
	require "../inc/db.inc.php";
?>
<html>
<head>
	<title>Поступившие заказы</title>
	<link rel="stylesheet" type="text/css" href="/inc/style.css" />
</head>
<body>
<h1>Поступившие заказы:</h1>
<?php
$orders = getOrders();
foreach($orders as $order){
$dat = $order['date'];
?>
<hr>
<h2>Заказ номер:<?= $order['orderid']?> </h2>
<p><b>Заказчик</b>: <?=$order["name"]?> </p>
<p><b>Email</b>: <?=$order["email"]?> </p>
<p><b>Телефон</b>: <?=$order["phone"]?></p>
<p><b>Адрес доставки</b>: <?=$order["address"]?></p>
<p><b>Дата размещения заказа</b>: <?= date('d-y-M H:i:s',$dat)?></p>
<?}?>

<h3>Купленные товары:</h3>
<table border="1" cellpadding="5" cellspacing="0" width="90%">
<tr>
	<th>N п/п</th>
	<th>Название</th>
	<th>Автор</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>Количество</th>
</tr>
<? $goods = myBasket();
$i=1;
foreach($goods as $item){	
?>
<tr>
		<td><?= $i++?></td>
		<td><?= $item['title']?></td>
		<td><?= $item['author']?></td>
		<td><?= $item['pubyear']?></td>
		<td><?= $item['price']?></td>
		<td><?= $item['quantity']?></td>
<? 		
	$sum = $sum + $item['price'];
}
?>

</table>
<p>Всего товаров в заказе <?= $count?> на сумму:<?= $sum?> руб.</p>
<li><a href='/eshop/admin'>Назад</a></li>
</body>
</html>