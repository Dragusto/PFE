<?php
session_start();


$database = "piscine";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
		
$id = $_SESSION['id'];
$sql = "SELECT * FROM membre WHERE id = '$id'";
$tab = mysqli_query($db_handle, $sql);
$row= mysqli_fetch_array($tab);

$search = isset($_POST["recherche"])? $_POST["recherche"]:"";

	if (!$search)
	{
		Redirect("emploi.php?error_message10="."veuillez entrer un champ", false);
	}
	else
	{	

		$nb_space = substr_count($search," ");
		
		if($nb_space == '0')
		{

			$sql = "SELECT id FROM emploi WHERE travail = '$search' or nom = '$search'";

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
				<meta http-equiv="refresh" content="1;rechercheremploi.php"/>
				<?php
			}
			else
			{
				?>
				<meta http-equiv="refresh" content="1;emploi.php"/>
				<?php
				Redirect("emploi.php?error_message10="."Erreur dans le champ 1", false);

			}
			
		}
		else
		{
			echo'a';
			$sql1 = "SELECT id FROM emploi WHERE travail = '$search' or nom = '$search'";
		
			if(mysqli_query($db_handle, $sql1))
			{
				$tab = mysqli_query($db_handle, $sql1);
				$array_id_search = array();
				while($row = mysqli_fetch_assoc($tab))
				{
					$array_id_search[$row['id']] = $row['id'];
				}
				$_SESSION['search'] = $array_id_search;
				
				?>
				<meta http-equiv="refresh" content="1;rechercheremploi.php"/>
				<?php
			}
			else
			{
				?>
				<meta http-equiv="refresh" content="1;emploi.php"/>
				<?php
				Redirect("emploi.php?error_message10="."Erreur dans le champ", false);
			}
		}
	}
	    
		function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
		exit();
    }
?>