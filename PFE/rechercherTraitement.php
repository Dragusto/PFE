<?php
session_start();


	$database = "piscine";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
		
$id = $_SESSION['id'];
$sql = "SELECT * FROM membre WHERE id = '$id'";
$tab = mysqli_query($db_handle, $sql);
$row= mysqli_fetch_array($tab);
$adresse = $row['adresse'];

$search = isset($_POST["recherche"])? $_POST["recherche"]:"";

	if (!$search)
	{
		Redirect("sommaire.php?error_message10="."veuillez entrer un champ", false);
	}
	else
	{	
		$nb_space = substr_count($search," ");
		
		if($nb_space == '0')
		{
			$sql = "SELECT id FROM membre WHERE nom = '$search' or prenom = '$search'";
			
			if(mysqli_query($db_handle, $sql))
			{
				$tab = mysqli_query($db_handle, $sql);
				$array_id_search = array();
				while($row = mysqli_fetch_assoc($tab))
				{
					$array_id_search[$row['id']] = $row['id'];
				}
				$_SESSION['search'] = $array_id_search;
				
				?>
				<meta http-equiv="refresh" content="1;rechercher.php"/>
				<?php
			}
			else
			{
				?>
				<meta http-equiv="refresh" content="1;rechercher.php"/>
				<?php
				Redirect("rechercher.php?error_message10="."ce membre n'existe pas", false);
			}
			
		}
		else
		{
			$chaine = explode(" ", $search);	
			$search1 = $chaine[0];
			$search2 = $chaine[1];
		
			$sql1 = "SELECT id FROM membre WHERE nom = '$search1' or prenom = '$search1'";
			$sql2 = "SELECT id FROM membre WHERE nom = '$search2' or prenom = '$search2'";
		
			if(mysqli_query($db_handle, $sql1) == mysqli_query($db_handle,$sql2))
			{
				$tab = mysqli_query($db_handle, $sql1);
				$array_id_search = array();
				while($row = mysqli_fetch_assoc($tab))
				{
					$array_id_search[$row['id']] = $row['id'];
				}
				$_SESSION['search'] = $array_id_search;
				
				?>
				<meta http-equiv="refresh" content="1;rechercher.php"/>
				<?php
			}
			else
			{
				?>
				<meta http-equiv="refresh" content="1;rechercher.php"/>
				<?php
				Redirect("rechercher.php?error_message10="."ce membre n'existe pas", false);
			}
		}
	}
	    
		function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
		exit();
    }
?>