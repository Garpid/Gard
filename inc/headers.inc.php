<?
    ob_start();
	function foo(){
			if($_POST['name'] == ''){
			header("location: c:\OpenServer\domains\gard\inc\gbook.inc.php");
			exit;
			}
	}
			
$title = 'Супер-мега сайт';
$header = "Добро пожаловать, Гвардеец!";
$id = strtolower(strip_tags(trim($_GET['id'])));
// Инициализация заголовков страницы
switch($id){
	case 'contact': 
		$title = 'Контакты';
		$header = 'Обратная связь';
		break;
	case 'about': 
		$title = 'О нас';
		$header = 'О нашем сайте';
		break;
	case 'info': 
		$title = 'Информация';
		$header = 'Информация';
		break;
	case 'log': 
		$title = 'Журнал посещений';
		$header = 'Журнал посещений';
		break;
	case 'gbook': 
		$title = 'Гостевая книга';
		$header = 'Наша гостевая книга';
		break;		
}