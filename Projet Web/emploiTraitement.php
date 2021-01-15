<?php
session_start();
?>

<!DOCTYPE html>
<html>

<?php

	$travail = isset($_POST["travail"])? $_POST["travail"]:"";
	$lieu = isset($_POST["lieu"])? $_POST["lieu"]:"";
	$dateDebut = isset($_POST["dateDebut"])? $_POST["dateDebut"]:"";
	$contrat = isset($_POST["contrat"])? $_POST["contrat"]:"";
	$description = isset($_POST["description"])? $_POST["description"]:"";
	
	$datePubli = date("Y-m-d H:i:s");
	$auteur = $_SESSION['auteur_publi'];

	$error = "";

	if($travail == ""){
		$error .= "Travail est vide. ";
	}

	if($lieu == ""){
		$error .= "Lieu est vide. ";
	}

	if($dateDebut == ""){
		$error .= "Date est vide";
	}

	if($contrat == ""){
		$error .= "Contrat est vide";
	}

	if($description == ""){
		$error .= "Description est vide";
	}


	if($error == "")
	{
		echo "Formulaire valide <br/><br/>";
		$database = "piscine";
		$db_handle = mysqli_connect('localhost','root','root');
		$db_found = mysqli_select_db($db_handle, $database);
		

		if($db_found)
		{
				// Insertion
				$sql = "INSERT INTO emploi(travail, lieu, dateDebut, contrat, description, auteur, datePubli) VALUES('$travail', '$lieu', '$dateDebut','$contrat','$description', '$auteur', '$datePubli')";
			
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
		Redirect('emploi.php?error_message='.'<br>Veuillez remplir tous les champs', false);
	}


		function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }


?>

	<div id="emploi">

		<form action="emploi.php" method="post">

			<tr>
				<td colspan="2"> <input type="submit" value="Retourner à l'accueil"\></td>
			</tr>

		</form>

	</div>



	<div id="footer">

        <p>Droit d'auteur Giot Chabennet © 2018 Intemento</p> 

        <p> Dernière mise à jour le 2/05/2018 |

        <a href="mailto:Intemento@gmail.com">Intemento@gmail.com</a> 
        
        </p>

	</div>

</html>