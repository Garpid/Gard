<?
require_once "secure/session.inc.php";
require_once "secure/secure.inc.php";
	if(isset($_GET['logout'])){
		logOut();
		exit;
	}
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Админка</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<link rel="stylesheet" type="text/css" href="/inc/style.css" />
</head>
<body>
	<h1>Администрирование магазина</h1>
	<h3>Доступные действия:</h3>
	<ul>
		<li><a href='add2cat.php'>Добавление товара в каталог</a></li>
		<li><a href='orders.php'>Просмотр готовых заказов</a></li>
		<li><a href='secure/create_user.php'>Добавить пользователя</a></li>
		<li><a href='index.php?logout'>Завершить сеанс</a></li>
		<li><a href='/eshop/catalog.php'>Вернуться в каталог</a></li>
		<li>Вернуться <a href="/index.php">домой</a></li>
	</ul>
</body>
</html>