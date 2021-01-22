<?php
session_start();
?>	
<!DOCTYPE html>
<html>
<?php
	$database = "piscine";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	

session_destroy();
?>
	<meta http-equiv="refresh" content="1;index.php"/>
</html>