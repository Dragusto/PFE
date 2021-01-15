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
$birth = $row['date_de_naissance'];



/*********************************Mot De Passe*********************************/
$day = isset($_POST["day"])? $_POST["day"]:"";
$month = isset($_POST["date"])? $_POST["date"]:"";
$year = isset($_POST["year"])? $_POST["year"]:"";
$mdp = isset($_POST["mdp"])? $_POST["mdp"]:"";
	
	$sql = "SELECT mdp FROM utilisateur WHERE id = '$id'";
	$tab = mysqli_query($db_handle, $sql);
	$row= mysqli_fetch_array($tab);
	$MDP = $row['mdp'];

	// Comparaison du mdp envoyé via le formulaire avec la base
	$isPasswordCorrect = password_verify($mdp, $MDP);

	if(!$isPasswordCorrect)
	{
		Redirect("parametre.php?error_message5="."Le mot de passe d'origine est différent du mot de passe entré.", false);
	}
	else{
		echo "a";
		switch ($month) {
            case "date1":
                $months = 'Janvier';
                break;
            case "date2":
                $months = 'Février';
                break;
            case "date3":
                $months = 'Mars';
                break;
            case "date4":
                $months = 'Avril';
                break;
            case "date5":
                $months = 'Mai';
                break;
			case "date6":
                $months = 'Juin';
                break;
            case "date7":
                $months = 'Juillet';
                break;
            case "date8":
                $months = 'Août';
                break;
            case "date9":
                $months = 'Septembre';
                break;
            case "date10":
                $months = 'Octobre';
			case "date11":
                $months = 'Novembre';
                break;
            case "date12":
                $months = 'Décembre';
                break;
		}
		echo "c";
		if(!$months)
		{
			Redirect("parametre.php?error_message5="."Erreur jour ou mois ou année.", false);
		}else
		{
			$birth = $day;
			$birth .= ' '.$months;
			$birth .= ' '.$year;
			$sql = "UPDATE membre SET date_de_naissance = '$birth' WHERE id = '$id'";
		
			if(mysqli_query($db_handle, $sql))
			{
				bon("parametre.php?message5="."Votre date de naissance a bien été ajouté", false);
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
</html>