<?
define('FILE_NAME','.htpasswd');
//генерируем хеш пароля
function getHash($string, $salt, $iterationCount){
	for($i = 0; $i < $iterationCount; $i++){
		$string = sha1($string.$salt);
	}
	return $string;
}
//Новая запись в файле юзверей
function saveHash($user, $hash, $salt, $iteration){
	$str = "$user:$hash:$salt:$iteration\n";
		if(file_put_contents(FILE_NAME, $str, FILE_APPEND)){
		return true;
		} else {
		return false;
		}
}
//А есть ли Юзверь?
function userExists($login){
	if(!is_file(FILE_NAME))
		return false;
	$users = file(FILE_NAME);
	foreach($users as $user){
	if(strpos($user, $login) !== false)
		return $user;
	}
	return false;
}
//завершить сеанс
function logOut(){
	session_destroy();
	header("Location: secure/login.php");
	exit;
}
?>
