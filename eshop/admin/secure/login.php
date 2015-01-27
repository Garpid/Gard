<?
session_start();
header("HTTP/1.0 401 Unauthorized");
require_once "secure.inc.php";
$title = 'Авторизация';
$user  = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
	$user = trim(strip_tags($_POST['user']));
	$pw = trim(strip_tags($_POST['pw']));
	$ref = trim(strip_tags($_GET['ref']));
		if(!$ref){
			$ref = '../';
		}
		if($user and $pw){
			if($result = userExists($user)){
				list($login, $password, $salt, $iteration) = explode(':', $result);
				if(getHash($pw, $salt, $iterationCount) == $password){
					$_SESSION['admin'] = true;
					header("Location: $ref");
					exit;
				} else{
					$title = 'Неправильный пароль!';
			}
		}} else {
			$title = 'Заполните все поля формы!';
	}
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Авторизация</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>
<body>
	<h1><?= $title?></h1>
	<form action="<?= $_SERVER['REQUEST_URI']?>" method="post">
		<div>
			<blockquote><label for="txtUser">Логин</label>
			<input id="txtUser" type="text" name="user" value="<?= $user?>" />
		</div>
		<div>
			<blockquote><label for="txtString">Пароль</label>
			<input id="txtString" type="password" name="pw" />
		</div>
		<div>
			<blockquote><button type="submit">Войти</button>
		</div>	
	</form>
</body>
</html>