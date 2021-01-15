<?php
session_start();
?>
<!DOCTYPE html>
<html>
<?php
	$database = "piscine";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	
	

	$id_ = $_SESSION['id'];
	$id_suppr = $_SESSION['id_suppr'];
	
	$sql = "DELETE FROM utilisateur WHERE id = 'id_suppr'";
	$sql1 = "DELETE FROM membre WHERE id = 'id_suppr'";
	$sql2 = "DELETE FROM relation WHERE id_1 = 'id_suppr' or id_2 = 'id_suppr'";
	$sql3 = "DELETE FROM evenement WHERE auteur = 'id_suppr'";
	$sql4 = "DELETE FROM emploi WHERE auteur = 'id_suppr'";
	$sql5 = "DELETE FROM photo WHERE id = 'id_suppr'";
	unset($_SESSION['id_suppr'];
	unset($
	if (mysqli_query($db_handle, $sql))
	{
	
	}
	if (mysqli_query($db_handle, $sql1))
	{
	}
	if (mysqli_query($db_handle, $sql2))
	{
	}
	if (mysqli_query($db_handle, $sql3))
	{
	}
	if (mysqli_query($db_handle, $sql4))
	{
	}
	if (mysqli_query($db_handle, $sql5))
	{
	}
	
?>

<meta http-equiv="refresh" content="1;index.php"/>

</html>