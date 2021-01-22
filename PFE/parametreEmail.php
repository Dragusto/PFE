<?php
session_start();
?>
<!DOCTYPE html>
<html>
<?php
	$database = "piscine";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	
$id = $_SESSION['id'];
$sql = "SELECT * FROM membre WHERE id = '$id'";
$tab = mysqli_query($db_handle, $sql);
$row= mysqli_fetch_array($tab);
$nom = $row['nom'];
$prenom = $row['prenom'];
$email = $row['email'];
$job = $row['travail'];
$birth = $row['date de naissance'];
$city = $row['ville'];
$adresse = $row['adresse'];


/*********************************Mot De Passe*********************************/
$mdp = isset($_POST["mdp"])? $_POST["mdp"]:"";
$email1 = isset($_POST["email1"])? $_POST["email1"]:"";
$email2 = isset($_POST["email2"])? $_POST["email2"]:"";
if( $mdp == "" or $email1 == "" or $email2 == "" )
{
	Redirect("parametre.php?error_message2="."Mot de passe ou email vide", false);
}
else
{
	$sql = "SELECT mdp FROM utilisateur WHERE id = '$id'";
	$tab = mysqli_query($db_handle, $sql);
	$row= mysqli_fetch_array($tab);
	$MDP = $row['mdp'];

	// Comparaison du mdp envoyé via le formulaire avec la base
	$isPasswordCorrect = password_verify($mdp, $MDP);

	if(!$isPasswordCorrect)
	{
		Redirect("parametre.php?error_message2="."Le mot de passe d'origine est différent du mot de passe entré.", false);
	}
	else
	{
		if($email != $email1)
		{
			Redirect("parametre.php?error_message2="."Erreur confirmation email.", false);
		}
		else
		{
			$mdp_hache = password_hash($mdp1, PASSWORD_DEFAULT);
			$sql = "UPDATE utilisateur SET email= '$email2' WHERE id = '$id'";
			$sql2 = "UPDATE membre SET email= '$email2' WHERE id = '$id'";
		
			if(mysqli_query($db_handle, $sql)&&mysqli_query($db_handle,$sql2))
			{
				bon("parametre.php?message2="."Votre email a bien été changé", false);
			}
		}
	}	
}

?>
				<meta http-equiv="refresh" content="1;parametre.php"/>
			<?php
			
		    function bon($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }		
		    function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }
?>