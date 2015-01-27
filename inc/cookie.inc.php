<?$visitcounter = 0;



if(isset($_COOKIE['visitcounter'])){
$visitcounter = $_COOKIE['visitcounter'];
$visitcounter++;
}
$lastvisit=0;
if(isset($_COOKIE['lastvisit'])){
	$lastvisit=date("d-m-Y", $_COOKIE['lastvisit']); 
	}
	
	
	setcookie('visitcounter',$visitcounter, 0x7FFFFFFF);
	setcookie('lastvisit',time($lastvisit), 0x7FFFFFFF);


?>
