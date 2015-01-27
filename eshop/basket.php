<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/db.inc.php";
?>
<html>
<head>
	<title>Корзина пользователя</title>
	<link rel="stylesheet" type="text/css" href="/inc/style.css" />
</head>
<body>
	<h1>Ваша корзина</h1>
<?php
	if($count == 0){
echo "Корзина пуста, вернитесь в <a href='catalog.php'>каталог</a>"; die;
} else {
echo "Вернуться в <a href='catalog.php'>каталог</a>";
}
?>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>N п/п</th>
	<th>Название</th>
	<th>Автор</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>Количество</th>
	<th>Удалить</th>
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
		<td><a href="delete_from_basket.php?del=<?= $item['id']?>" method="get">Удалить</a></td>
<? 	
		
	$sum = $sum + $item['price'];
}
?>
</table>

<p>Всего товаров в корзине <?=$count?> на сумму:<?=$sum?> руб.</p>

<div align="center">
	<input type="button" value="Оформить заказ!"
                      onClick="location.href='orderform.php'" />
</div>

</body>
</html>







