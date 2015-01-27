<pre>
<?
if(file_exists('c:\OpenServer\domains\php-2\path.log')){
		$filename=file('c:\OpenServer\domains\php-2\path.log');
			print_r($filename);
		}
?>
