<?php
session_start();
?>
<!DOCTYPE html>
<html>
<?php
	$database = "piscine";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	
$datetime = date("Y-m-d H:i:s");
	
$id = $_SESSION['id'];



$sql1 = "SELECT * FROM messagerie WHERE (id_send = '$id' and id_receive = '$id_receive') or (id_send = '$id_receive' and id_receive = '$id_id') GROUP BY date ";


$tab_sql1 = mysqli_query($db_handle, $sql1);
$row_sql1 = mysqli_fetch_array($tab_sql1);

?>
</html>