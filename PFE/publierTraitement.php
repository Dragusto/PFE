<?php
session_start();
?>

<!DOCTYPE html>
<html>

<?php

	$titre = isset($_POST["titre"])? $_POST["titre"]:"";
	$date_evenement = isset($_POST["date1"])? $_POST["date1"]:"";
	$datetime = date("Y-m-d H:i:s");
	$auteur = $_SESSION['auteur_publi'];

	$connection = false;
	$error = "";

	if($titre == ""){
		$error .= "Titre est vide. ";
	}

	if($date_evenement == ""){
		$error .= "Date est vide. ";
	}


	if($error == "")
	{
		echo "Formulaire valide <br/><br/>";
		$database = "piscine";
		$db_handle = mysqli_connect('localhost','root','');
		$db_found = mysqli_select_db($db_handle, $database);
		

		if($db_found)
		{
				// Insertion
				$sql = "INSERT INTO evenement(titre, date_evenement, temps, auteur) VALUES('$titre', '$date_evenement', '$datetime','$auteur')";
			
				if(mysqli_query($db_handle, $sql))
				{
					echo "Votre publication a bien été créée <br>";
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
		Redirect('sommaire.php?error_message='.'<br>Veuillez remplir tous les champs', false);
	}


		function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }


?>

	<div id="accueil">

		<form action="sommaire.php" method="post">

			<tr>
				<td colspan="2"> <input type="submit" value="Retourner à l'accueil"\></td>
			</tr>

		</form>

	</div>


	<div id="footer">


        

	</div>

</html>