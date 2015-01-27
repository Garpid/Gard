<?
//Добавление
function addItemToCatalog($title,$author,$pubyear,$price){
global $link;
$sql = "INSERT INTO catalog (title, author, pubyear, price)
		VALUES (?,?,?,?)";
	if(!$stmt = mysqli_prepare($link,$sql))
		return false;
	mysqli_stmt_bind_param($stmt, "ssii", $title, $author, $pubyear, $price);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
		return true;
}
//выборка
function selectAllItems(){
global $link;
$sql = "SELECT id, title, author, pubyear, price
		FROM catalog";
	if(!$result = mysqli_query($link, $sql))
		return false;
	$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	return $items;
}
//Сохранение в куки
function saveBasket(){
	global $basket;
		$basket = base64_encode(serialize($basket));
		setcookie('basket', $basket, 0x7FFFFFFF);
}
//Загрузка в корзину
function basketInit(){
global $basket, $count;
if(!isset($_COOKIE['basket'])){
	$basket = array('orderid' => uniqid());
	saveBasket();
} else {
	$basket = unserialize(base64_decode($_COOKIE['basket']));
	$count = count($basket) - 1;
}}
//Сохранение корзины
function add2Basket($id){
global $basket;
$basket[$id] = 1;
saveBasket();
}
// корзина в массив
function myBasket(){
global $link, $basket;
$goods = array_keys($basket);
array_shift($goods);
$ids = implode(",",$goods);
$sql = "SELECT id, author, title, pubyear, price
		FROM catalog
		WHERE id IN($ids)";
if(!$result = mysqli_query($link , $sql))
	return false;	
$items = result2Array($result);
mysqli_free_result($result);
return $items;
}
//Отрисовка корзины
function result2Array($data){
global $basket;
$arr = array();
while($row = mysqli_fetch_assoc($data)){
	$row['quantity'] = $basket[$row['id']];
	$arr[] = $row;
	}
	return $arr;
}
//Удаление из корзины
function deleteItemFromBasket($id){
global $basket;
	if(isset($_GET['del'])){
	unset($basket[$id]);
	}
	saveBasket();
}
//пересохранение товара из корзины в БД
function saveOrder($datetime){
global $link, $basket;
$goods = myBasket();
$stmt = mysqli_stmt_init($link);
$sql = "INSERT INTO orders (title, author, pubyear, price, quantity, orderid, datetime)
		VALUES (?,?,?,?,?,?,?)";
	if(!mysqli_stmt_prepare($stmt, $sql))
		return false;
	foreach($goods as $item){
		mysqli_stmt_bind_param($stmt, 'ssiiisi', $item['title'], $item['author'], $item['pubyear'], $item['price'], $item['quantity'], $basket['orderid'], $datetime);
		mysqli_stmt_execute($stmt);
	}
	mysqli_stmt_close($stmt);
		if(isset($_COOKIE['basket'])){
	unset($_COOKIE['basket']);
	}
	return true;
}
//массив с ифно о всех заказах
function getOrders(){
global $link;
if(!is_file(ORDERS_LOG))
	return false;
$orders = file(ORDERS_LOG);
$allorders = array();
	foreach($orders as $order){
		list($name, $email, $phone, $address, $orderid, $date) = explode("|", $order);
		$orderinfo = array();
		$orderinfo['name'] = $name;
		$orderinfo['email'] = $email;
		$orderinfo['phone'] = $phone;
		$orderinfo['address'] = $address;
		$orderinfo['orderid'] = $orderid;
		$orderinfo['date'] = $date;
		$sql = "SELECT title, author, pubyear, price, quantity
		FROM orders
		WHERE orderid='$orderid' AND datetime = $date";
			if(!$result = mysqli_query($link, $sql))
				return false;
			$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
			mysqli_free_result($result);
			$orderinfo["goods"] = $items;
			$allorders[] = $orderinfo;
	}
	return $allorders;
}
?>
