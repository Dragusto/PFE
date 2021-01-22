<?php
session_start();
?>

<!DOCTYPE html>
<html>

<?php
	$database = "piscine";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

    
    $email = isset($_POST["email"])?$_POST["email"] : "";
    $mdp = isset($_POST["mdp"])?$_POST["mdp"] : "";
    $stat = "";

    $error1 = "";
    $error2 = "";
    $error3 = "";
	$error4 = "Combinaison email et mot de passe invalide";
    $errorun = 0;
    $errordeux = 0;
    $connec = false;
	
    if($email == "") {$error2 = $error2." adresse mail -"; $errorun++;}
    if($mdp == "") {$error2 = $error2." mot de passe "; $errorun++;}
    

    if($errorun > 0) {$error1 = "Il manque le champ : ";}
    if($errorun > 1) {$error1 = "Il manque les champs : ";}    
    if($errorun > 0)
	{
		Redirect('index.php?error_message='.$error1.$error2, false);
	}
	
	// vérification de la connection
	$sql = "SELECT mdp FROM utilisateur WHERE email = '$email'";
	$tab = mysqli_query($db_handle, $sql);
	$row= mysqli_fetch_array($tab);
	$MDP = $row['mdp'];
	
	// Comparaison du mdp envoyé via le formulaire avec la base
	$isPasswordCorrect = password_verify($mdp, $MDP);
	if (!$MDP)
	{	
		echo 'Mauvais identifiant ou mot de passe !';
	}
	else
	{
		
		if ($isPasswordCorrect) {

			//echo "vous etes connectes"
			$sql = "SELECT id FROM utilisateur WHERE email = '$email'";
			$tab = mysqli_query($db_handle, $sql);
			$row= mysqli_fetch_array($tab);
			$id = $row['id'];
			$_SESSION['id'] = $id;
			?>
				<meta http-equiv="refresh" content="1;sommaire.php"/>
			<?php

		}
		else {

			//echo 'votre mdp est '.$mdp;

			Redirect('index.php?error_message='.'<br>Erreur email ou mot de passe', false);

		}
	}


	    function Redirect($url, $permanent = false)
    {

        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
        
    }
?>