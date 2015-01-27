<?
header('Content-Type: text/html;charset=utf-8;');
define('DB_HOST','localhost');
define('DB_LOGIN','root');
define('DB_PASSWORD','');
define('DB_NAME','eshop');
define('ORDERS_LOG','orders.log');
$basket = array ();
$count = 0;
$link = mysqli_connect('localhost','root','','eshop') or die(mysqli_connect_error());
mysqli_select_db($link,'eshop') or die('<br />'.mysqli_error($link));
basketInit();
?>
