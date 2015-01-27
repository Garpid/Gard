<!-- Основные настройки -->
<?  
define('DB_HOST','localhost');
define('DB_LOGIN','root');
define('DB_PASSWORD','');
define('DB_NAME','gbook');
$link = mysqli_connect('localhost','root','');
mysqli_select_db($link,'gbook');
?>

<!-- Основные настройки -->

<!-- Сохранение записи в БД -->
<?if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = trim(strip_tags($_POST['name']));
		$email = trim(strip_tags($_POST['email']));
		$msg = trim(strip_tags($_POST['msg'])); 
		}

$result = mysqli_query($link, "INSERT INTO msgs (name, email, msg) 
	VALUES ('$name','$email','$msg')");
?>
<!-- Сохранение записи в БД -->

<!-- Удаление записи из БД -->
<?
if(isset($_GET['del'])){
$del=(int)$_GET['del'];
$del1="DELETE FROM msgs WHERE id=$del";
$del2=mysqli_query($link,$del1) or die('<br />'.mysqli_error($link));
header('Location: '.$_SERVER['SCRIPT_NAME'].'?id=gbook');
}
?>
<!-- Удаление записи из БД -->
<meta http-equiv="content-type"
			content="text/html;charset=utf-8" />
<h3>Оставьте запись в нашей Гостевой книге</h3>
<form method="post" action="<?= $_SERVER['REQUEST_URI']?>">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />

<br />

<input type="submit" value="Отправить!" />

</form>
<!-- Вывод записей из БД -->
<?
$r1="SELECT id , name , email , msg , UNIX_TIMESTAMP(datetime) as dt
			FROM msgs ORDER BY id DESC";
$r2=mysqli_query($link, $r1);
$r3=mysqli_fetch_assoc($r2);
mysqli_close($link);
?>
<p> Всего записей в гостевой книге: <?= $r3['id']?> количество записей</p>
<?
While($r3 = mysqli_fetch_array($r2)){
print_r($r3);
?>
<p>
	<a href="<?=$r3['email']?>"><?=$r3['name']?></a> <?= date('d-m-Y',$r3['dt'])?> в <?=date('H:i:s',$r3['dt'])?> написал
	<br /><?=$r3['msg']?>
</p>
<p align="right">
	<a href="http://php-2/index.php?id=gbook&del=<?= $r3['id']?>" method="get">Удалить</a>
</p>
<?
}

print_r($_GET);
print_r($_POST);

?>
<!-- Вывод записей из БД -->


