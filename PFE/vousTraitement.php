<?php
session_start();
?>

<!DOCTYPE html>
<html>

<?php
$id = $_SESSION['id'];
$database = "piscine";
$db_handle = mysqli_connect('localhost','root','');
$db_found = mysqli_select_db($db_handle, $database);
$sql = "SELECT * FROM utilisateur WHERE id = '$id'";
$tab = mysqli_query($db_handle, $sql);
$row= mysqli_fetch_array($tab);
$nom = $row['nom'];

	$info = isset($_POST["info"])? $_POST["info"]:"";

	$error = "";

	if($info == ""){
		$error .= "Travail est vide. ";
	}

		
	if($error == "")
	{
		echo "Formulaire valide <br/><br/>";

		

		if($db_found)
		{
				// Insertion
				$sql = "UPDATE `membre` SET `info`='$info' WHERE id='$id'";
			
				if(mysqli_query($db_handle, $sql))
				{
					echo "Votre publication a bien été créée <br>";
					?><meta http-equiv="refresh" content="1;vous.php"/><?php
				}
			
				else
				{
					echo "ERROR: impossible d'executer la requete $sql. <br>" . mysqli_error($db_handle);
				}
		
		}

		else
		{
			echo "Database not found <br>";
		}
	
	}

	else
	{
		Redirect('vous.php?error_message='.'<br>Veuillez remplir le champ', false);
	}


		function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }


?>

	<div id="vous">

		<form action="emploi.php" method="post">

			<tr>
				<td colspan="2"> <input type="submit" value="Retourner à l'accueil"\></td>
			</tr>

		</form>

	</div>



	<div id="footer">



	</div>

</html>