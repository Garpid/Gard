<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/db.inc.php";
?>
<html>
<head>
	<title>Каталог товаров</title>
	<link rel="stylesheet" type="text/css" href="/inc/style.css" />
</head>
<body>
<p>Товаров в <a href="basket.php">корзине</a>: <?= $count?></p>
<p>Вернуться <a href="/index.php">домой</a></p>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>Название</th>
	<th>Автор</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>В корзину</th>
</tr>
<?php
$goods = selectAllItems();
foreach($goods as $item){
?>
	<tr>
		<td><?= $item['title']?></td>
		<td><?= $item['author']?></td>
		<td><?= $item['pubyear']?></td>
		<td><?= $item['price']?></td>
		<td><a href="add2basket.php?id=<?= $item['id']?>">в корзину</a></td>
		<?}?>
</table>
			<img src="/media/img/logo.png" alt="Наш логотип" class="logo" />
			<br clear=all style='page-break-before:always'>
</body>
</html>