<!DOCTYPE html>
<html>

<?php
		$database = "piscine";
		$db_handle = mysqli_connect('localhost','root','');
		$db_found = mysqli_select_db($db_handle, $database);

	$nom = isset($_POST["nom"])? $_POST["nom"]:"";
	$prenom = isset($_POST["prenom"])? $_POST["prenom"]:"";
	$email = isset($_POST["email"])? $_POST["email"]:"";
	$mdp = isset($_POST["mdp"])? $_POST["mdp"]:"";
	$mdp1 = isset($_POST["mdp1"])? $_POST["mdp1"]:"";

	$connection = false;
	$error = "";

	if($nom == ""){
		$error .= "Nom est vide. ";
	}

	if($prenom == ""){
		$error .= "Numero de siren est vide. ";
	}

	if($email == ""){
		$error .= "Email est vide. ";
	}

	if($mdp == ""){
		$error .= "Mot de passe est vide. ";
	}

	if($mdp != $mdp1){
		$error .= "Les mots de passe sont differents. ";
	}


	if($error == "")
	{
		echo "Formulaire valide <br/><br/>";

		
		
		// Hachage du mot de passe
		$mdp_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

		if($db_found)
		{
				// Insertion
				$sql = "INSERT INTO utilisateur(email, mdp, nom, prenom, entreprise) VALUES('$email','$mdp_hache','$nom','$prenom', '1')";
			
				if(mysqli_query($db_handle, $sql))
				{
					echo "Votre compte a bien été créé";
				}
			
				else
				{
					echo "ERROR: impossible d'executer la requete $sql. <br>" . mysqli_error($db_handle);
				}
		
			$sql1 = "SELECT id FROM utilisateur WHERE email = '$email'";
			$tab = mysqli_query($db_handle, $sql1);
			$row= mysqli_fetch_array($tab);
			$id = $row['id'];
			$sql2 = "INSERT INTO membre(id, email, nom, prenom) VALUES('$id','$email','$nom','$prenom')";
			if(mysqli_query($db_handle, $sql2))
			{

				?>
				<meta http-equiv="refresh" content="1;indexpro.php"/>	
				<?php
			}

			else
			{
				Redirect('inscriptionpro.ph^p?error_message='.'<br>Erreur création du compte', false);
			}
		}

		else
		{
			echo "Database not found <br>";
		}
	
	}

	else
	{
		Redirect('inscriptionpro.php?error_message='.'<br>Veuillez remplir tous les champs', false);
	}



?>

	<div id="indexpro">

		<form action="indexpro.php" method="post">

			<tr>
				<td colspan="2"> <input type="submit" value="Me connecter"\></td>
			</tr>

		</form>

	</div>



	<div id="inscriptionpro">

		<form action="inscriptionpro.php" method="post">

			<tr>
				<td colspan="2"> <input type="submit" value="M'inscrire"\></td>
			</tr>

		</form>

	</div>



	<div id="footer">




	</div>

</html>