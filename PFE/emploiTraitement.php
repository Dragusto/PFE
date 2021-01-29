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

	$travail = isset($_POST["travail"])? $_POST["travail"]:"";
	$lieu = isset($_POST["lieu"])? $_POST["lieu"]:"";
	$dateDebut = isset($_POST["dateDebut"])? $_POST["dateDebut"]:"";
	$contrat = isset($_POST["contrat"])? $_POST["contrat"]:"";
	$description = isset($_POST["description"])? $_POST["description"]:"";
	$profil = isset($_POST["profil"])? $_POST["profil"]:"";
	$contact = isset($_POST["contact"])? $_POST["contact"]:"";
	$datePubli = date("Y-m-d");

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
	if($contact == ""){
		$error .= "Description est vide";
	}

switch ($profil) {
	case "profil":
        $profil = '';
        break;
    case "profil1":
        $profil = 'Infirmier';
        break;
    case "profil2":
        $profil = 'Exécutant';
        break;
    case "profil3":
        $profil = 'Gardien';
        break;
    case "profil4":
        $profil = 'Aide à domicile';
        break;
    case "profil5":
        $profil = 'Mécanicien';
        break;
	case "profil6":
        $profil = 'Homme d action';
        break;
    case "profil7":
        $profil = 'Acteur';
        break;
    case "profil8":
        $profil = 'Artiste';
        break;
    case "profil9":
        $profil = 'Directeur';
        break;
    case "profil10":
        $profil = 'Scientifique';
        break;
	case "profil11":
        $profil = 'Visionnaire';
        break;
    case "profil12":
        $profil = 'Penseur';
        break;
    case "profil13":
        $profil = 'Donateur';
        break;
    case "profil14":
        $profil = 'Protecteur';
        break;
    case "profil15":
        $profil = 'Charismatique';
	case "profil16":
        $profil = 'Idéaliste';
        break;
		}
	if($error == "")
	{
		echo "Formulaire valide <br/><br/>";

		

		if($db_found)
		{
				// Insertion
				$sql = "INSERT INTO `emploi`(`id`, `nom`, `travail`, `lieu`, `dateDebut`, `contrat`, `datePubli`, `description`, `profil`, `contact`) VALUES('$id', '$nom', '$travail', '$lieu', '$dateDebut','$contrat','$datePubli','$description', '$profil', '$contact')";
			
				if(mysqli_query($db_handle, $sql))
				{
					echo "Votre publication a bien été créée <br>";
					?><meta http-equiv="refresh" content="1;emploi.php"/><?php
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



	</div>

</html>