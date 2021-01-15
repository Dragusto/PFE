<!DOCTYPE html>
<html>

<?php

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
		$error .= "Prenom est vide. ";
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
		$database = "piscine";
		$db_handle = mysqli_connect('localhost','root','');
		$db_found = mysqli_select_db($db_handle, $database);
		
		
		// Hachage du mot de passe
		$mdp_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

		if($db_found)
		{
				// Insertion
				$sql = "INSERT INTO utilisateur(email, mdp, nom, prenom) VALUES('$email','$mdp_hache','$nom','$prenom')";
			
				if(mysqli_query($db_handle, $sql))
				{
					echo "Votre compte a bien été créé <br>";
				}
			
				else
				{
					echo "ERROR: impossible d'executer la requete $sql. <br>" . mysqli_error($db_handle);
				}
		
			$sql1 = "SELECT id FROM utilisateur WHERE email = '$email'";
			$tab = mysqli_query($db_handle, $sql1);
			$row= mysqli_fetch_array($tab);
			$id = $row['id'];
		
			if(mysqli_query($db_handle, "INSERT INTO membre(id, email, nom, prenom) VALUES('$id','$email','$nom','$prenom')"))
			{
				echo "Membre créé";			
			}

			else
			{
				Redirect('inscription.php?error_message='.'<br>Erreur création du compte', false);
			}
		}

		else
		{
			echo "Database not found <br>";
		}
	
	}

	else
	{
		Redirect('inscription.php?error_message='.'<br>Veuillez remplir tous les champs', false);
	}


		function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }


?>

	<div id="index">

		<form action="index.php" method="post">

			<tr>
				<td colspan="2"> <input type="submit" value="Me connecter"\></td>
			</tr>

		</form>

	</div>



	<div id="inscription">

		<form action="inscription.php" method="post">

			<tr>
				<td colspan="2"> <input type="submit" value="M'inscrire"\></td>
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