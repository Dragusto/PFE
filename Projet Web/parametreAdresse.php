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
$adresse = $row['adresse'];


/*********************************Mot De Passe*********************************/
$num = isset($_POST["num"])? $_POST["num"]:"";
$rue = isset($_POST["rue"])? $_POST["rue"]:"";
$city = isset($_POST["city"])? $_POST["city"]:"";
$post = isset($_POST["post"])? $_POST["post"]:"";
$mdp = isset($_POST["mdp"])? $_POST["mdp"]:"";
	
	$sql = "SELECT mdp FROM utilisateur WHERE id = '$id'";
	$tab = mysqli_query($db_handle, $sql);
	$row= mysqli_fetch_array($tab);
	$MDP = $row['mdp'];

	// Comparaison du mdp envoyé via le formulaire avec la base
	$isPasswordCorrect = password_verify($mdp, $MDP);

	if(!$isPasswordCorrect)
	{
		Redirect("parametre.php?error_message3="."Le mot de passe d'origine est différent du mot de passe entré.", false);
	}
	else
	{
		$adresse = $num;
		$adresse .= ' '.$rue;
		$adresse .= ' '.$city;
		$adresse .= ' '.$post;
		$sql = "UPDATE membre SET adresse = '$adresse' WHERE id = '$id'";
		
		if(mysqli_query($db_handle, $sql))
		{
			bon("parametre.php?message3="."Votre adresse a bien été changé", false);
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
</html>