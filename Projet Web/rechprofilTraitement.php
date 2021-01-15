<?php
session_start();
?>
<!DOCTYPE html>
<html>
<?php
	$database = "piscine";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	
	
	$ajouter = isset($_POST["ajouter"])? $_POST["ajouter"]:"";
	$suppr = isset($_POST["suppr"])? $_POST["suppr"]:"";

	$id = $_SESSION['id'];
	$id_search = $_SESSION['id_search'];
	if($ajouter)
	{	
		$sql = "INSERT INTO relation(id_1, id_2) VALUES('$id_search','$id') ";
	$id_connect = $_SESSION['id'];
	$id_search = $_SESSION['id_search'];
	if($ajouter)
	{	
		$sql = "INSERT INTO relation(id_1, id_2) VALUES('$id_search','$id_connect') ";
		mysqli_query($db_handle, $sql);
	}

	if($suppr)
	{
		$sql1 = "DELETE FROM relation WHERE id_1 = '$id_search' and id_2 = '$id'";
		$sql2 = "DELETE FROM relation WHERE id_2 = '$id_search' and id_1 = '$id'";
		
		if(mysqli_query($db_handle, $sql1))
		{}	
		else
		{
			mysqli_query($db_handle, $sql2);	
		}
	}
	?>
	<meta http-equiv="refresh" content="1;rechprofil.php"/>
				<?php
	
?>
</html>