<?php

session_start();
?>
<!DOCTYPE html>
<html>
<?php
	$id_evenement_search = $_SESSION['id_evenement_search'];

	$database = "piscine";
	$db_handle = mysqli_connect('localhost','root','');
	$db_found = mysqli_select_db($db_handle, $database);

	if($db_found)
	{
		$sql = "SELECT nb_like FROM evenement WHERE id_evenement = '$id_evenement_search'";
		$result = mysqli_query($db_handle, $sql);

		$data = mysqli_fetch_assoc($result);
		$nb_like = $data['nb_like'];
		$nb_like = $nb_like + 1;

		$sql = "UPDATE evenement SET nb_like = '$nb_like' WHERE id_evenement = '$id_evenement_search'";
			
			if(mysqli_query($db_handle, $sql))
			{
				
			}
			
			else
			{
				echo "ERROR: impossible d'executer la requete $sql. <br>" . mysqli_error($db_handle);
			}	
	}
		
?>
	<meta http-equiv="refresh" content="1;rechprofil.php"/>

</html>