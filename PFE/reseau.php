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

	$sql_rech = "SELECT id_1 FROM relation WHERE id_1 = '$id' or id_2 = '$id'";
	$tab_rech = mysqli_query($db_handle, $sql_rech);
	$array_id_search = array();
	while($row_rech = mysqli_fetch_assoc($tab_rech))
	{
		$array_id_search[$row_rech['id_1']] = $row_rech['id_1'];	
	}  

?>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link href="css/recherchercss.css" rel="stylesheet" type="text/css" />
    </head>
	<header>
        <div id="titre">
            <h1>Intemento</h1>     
        </div>
		<nav>
			<ul>
				<a href="sommaire.php">Accueil </a>
				<a href="reseau.php">Reseau </a>
				<a href="emploi.php">Emploi </a>
				<a href="messagerie.php">Messagerie </a>
				<a href="notification.php">Notification </a>
				<a href="vous.php">Profil </a>
			</ul>
		</nav>
	</header>


    <body>
	<?php
		foreach($array_id_search as $id_search)
		{?>
		<form enctype="multipart/form-data" action="rechprofil.php" method="post">
			<fieldset>
				<p>
					<table>
						<?php
						if($id_search != $id)
						{
							$sql_search = "SELECT * FROM membre WHERE id = '$id_search'";
							$tab_search = mysqli_query($db_handle, $sql_search);
							$row_search = mysqli_fetch_array($tab_search);
							$nom_search = $row_search['nom'];
							$prenom_search = $row_search['prenom'];
							$chemin1_search = "profil/$id_search.jpg";
							if (is_file($chemin1_search))
							{?>
								
								<a href = "rechprofil.php"> <img src = profil/<?php echo $id_search;?> > </a>
								<?php $_SESSION['id_search'] = $id_search;?>
								
							<?php } 
							else
							{?>							
								<a href = "rechprofil.php"> <img src = "profil/0"></a>
								<?php $_SESSION['id_search'] = $id_search;?>
							<?php } ?>
							<p> Nom : <?php echo $nom_search; ?> </p>
							<p> Prénom : <?php echo $prenom_search; ?> </p>
						<?php } ?>
					</table>
				</p>
			</fieldset>
		</form>
		<?php } ?>
		
		<div id="footer">

        <p>Droit d'auteur Intemento</p> 


		</div>
	
	</body>

	
	</div>

	</body>
<?php	function validerForm(){
    document.getElementById("rechercher").submit();
}?>

	
</html>