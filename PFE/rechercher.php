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
		$job = $row['travail'];
		$array_id_search = $_SESSION['search'];
?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link href="css/recherchercss.css" rel="stylesheet" type="text/css" />
    </head>
	<header>
		<div class="titre">
	        <p><img class="testimg"src= "image/intemento" ></p>    
	    </div>
		<nav>
			<ul>
				<a href="sommaire.php">Accueil </a>
				<!-- <a href="reseau.php">Reseau </a> -->
				<a href="emploi.php">Emploi </a>
				<!-- <a href="messagerie.php">Messagerie </a>
				<a href="notification.php">Notification </a> -->
				<a href="vous.php">Profil </a>
			</ul>
		</nav>

		<div class="rechercher">
			<form id="formulaire" action="rechercherTraitement.php" method="post">
				<tr>
					<td><input onKeyPress="if(event.keyCode == 13) validerForm();" type="text" name="recherche" placeholder="rechercher profil"></td>
				</tr>   
			</form>
			<?php
            if(isset($_GET["error_message10"]))
            {
              $error_message10 = $_GET["error_message10"];
        ?>
        
        <p style = "color : red"> <?php echo $error_message10; ?></p>
          
        <?php } ?>
		</div>
		
		<div class="pr">
			<?php
		$chemin1 = "profil/$id.jpg";
		if (is_file($chemin1))
		{?>
		<p><img src = profil/<?php echo $id;?>></p>
		<?php } 
		else
		{?>
			<p><img src = "profil/0"></p>
		<?php } ?>
			<p><?php echo $nom;?> </p>
			<p><?php echo $prenom; ?></p>
			<p><?php if (!$job){}else{echo $job;}?></p>

		</div>

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
								$sql_search = "SELECT * FROM utilisateur WHERE id = '$id_search'";
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
								<?php if($row_search['entreprise']==1){}
								else
								{?><p> Prénom : <?php echo $prenom_search; ?> </p>
							<?php }
								?>
						</table>
					</p>
				</fieldset>
			</form>
		<?php } ?>
		
	<div id="footer">


    </div>
	
	</body>

<?php	function validerForm(){
    document.getElementById("rechercher").submit();
}?>
	
	
</html>