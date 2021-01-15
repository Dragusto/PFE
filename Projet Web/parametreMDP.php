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



/*********************************Mot De Passe*********************************/
$mdp = isset($_POST["mdp"])? $_POST["mdp"]:"";
$mdp1 = isset($_POST["mdp1"])? $_POST["mdp1"]:"";
$mdp2 = isset($_POST["mdp2"])? $_POST["mdp2"]:"";
if( $mdp == "" or $mdp1 == "" or $mdp2 == "" )
{
		Redirect("parametre.php?error_message="."Mot de passe est vide.", false);
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
		Redirect("parametre.php?error_message="."Le mot de passe d'origine est différent du mot de passe entré.", false);
	}
	else
	{
		if($mdp1 != $mdp2)
		{
			Redirect("parametre.php?error_message="."Erreur confirmation mot de passe.", false);
		}
		else
		{
			$mdp_hache = password_hash($mdp1, PASSWORD_DEFAULT);
			$sql = "UPDATE `utilisateur` SET mdp= '$mdp_hache' WHERE id = '$id'";
		
			if(mysqli_query($db_handle, $sql))
			{
				bon("parametre.php?message="."Votre mdp a bien été changé", false);
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