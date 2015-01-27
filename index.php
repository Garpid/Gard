<? 
	include 'inc/cookie.inc.php';
	include 'inc/headers.inc.php';
	define('PATH_LOG','path.log');
	include 'inc/log.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
	<head>
		<title><?= $title?></title>
		<meta http-equiv="content-type"
			content="text/html;charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="inc/style.css" />
	</head>
	<body>
		<div id="header">
			<!-- Верхняя часть страницы -->
			<img src="/media/img/logo.png" alt="Наш логотип" class="logo"/>
			<img src="/media/img/logo_doa.png" alt="Наш логотип" class="logo_doa"/>
			<!-- Верхняя часть страницы -->
		</div>
		<div id="content">
			<!-- Заголовок -->
			<blockquote>
			<?
			if($visitcounter==1){
			echo "Спасибо, что зашли на огонек";
			}
			else{
			echo "вы зашли к нам $visitcounter раз".'<br>';
			echo "Последнее посещение: $lastvisit" ;
			}
			?>
			</blockquote>
			<h1><?= $header?></h1>
			<!-- Заголовок -->
			<!-- Область основного контента -->
			<?php
				include 'inc/routing.inc.php';
			?>	
			<!-- Область основного контента -->
		</div>
		<div>
			<!-- Навигация -->
			<ul id="menu">
	        <li><a href='index.php'>Домой</a></li>
	        <li>
	                <a href="#">Категории</a>
	                <ul>
	                        <li><a href='index.php?id=info'>Информация</a></li>
	                        <li><a href='test/index.php'>Тест</a></li>
	                        <li><a href='eshop/catalog.php'>Магазин</a></li>
	                        <li><a href='index.php?id=log'>Журнал посещений</a></li>
	                </ul>
	        </li>
	        <li><a href='index.php?id=about'>О нас</a></li>
	        <li><a href='index.php?id=contact'>Контакты</a></li>
</ul>
			<!-- Навигация -->
		</div>
		<div id="footer">
			<!-- Нижняя часть страницы -->
			&copy; Garpid, 2014 - <?= date('Y')?>
			<!-- Нижняя часть страницы -->
		</div>
	</body>
</html>