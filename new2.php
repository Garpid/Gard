<?
$arr= [4 =>1, 5=> 2];

$keys = array_keys($arr);
print_r($keys);
$keys=implode('','',$keys)
$sql = "SELECT * FROM orders where id IN($keys)";
?>